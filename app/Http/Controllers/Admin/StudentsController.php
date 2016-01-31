<?php namespace Scholr\Http\Controllers\Admin;

use Scholr\Http\Requests;
use Scholr\Http\Requests\StudentRequest;
use Scholr\Http\Controllers\Controller;
use Scholr\Student;
use Scholr\Classe;
use Scholr\Subject;
use DB;
use Auth;
use Illuminate\Http\Request;
use League\Csv\Reader;
use League\Csv\Writer;

class StudentsController extends Controller {
	public function __construct()
	{
		$this->middleware('staff');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$count = 1;
		$students = Student::all();
		return view('admin.students.index', compact('students', 'count'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$classList = Classe::lists('name', 'id');

		$subjects = Subject::lists('name', 'id');
		return view('admin.students.create', compact('classList', 'subjects'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StudentRequest $request)
	{	
		$school = DB::table('schools')->first();
		if (!$school) {
            flash("You have to setup school before any other thing");
            return redirect('schools');
    }
		$requests = $request->all();
		$image = $request->file('image');
		$filename = time()."-".$image->getClientOriginalName();
		$path = public_path('img/students/'.$filename);
		\Image::make($image->getRealPath())->resize(150, 100)->save($path);
		$requests['image'] = 'img/students/'.$filename;
		$student = new Student($requests);
		$student->image = 'img/students/'.$filename;
		$student->save();
		$student->subjects()->attach($request->input('subject_list'));
		flash('New Student: '.$student->firstname.' '.$student->lastname.' was created successfully!');
		return redirect('students');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$student = Student::find($id);
		return view('admin.students.show', compact('student'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$classList = Classe::lists('name', 'name');
		$subjects = Subject::lists('name', 'id');

		$student = Student::findOrFail($id);
		$str = [];
		foreach($student->subjects as $st){
			$str[] = $st->pivot->subject_id;
		}
		return view('admin.students.edit', compact('student', 'classList', 'subjects',  'str'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$student = Student::findOrFail($id);

		if ($student) {
			if ($request->hasFile('image')) {
				$image = $request->file('image');
				$filename = time()."-".$image->getClientOriginalName();
				$path = public_path('img/students/'.$filename);
				\Image::make($image->getRealPath())->resize(150, 100)->save($path);
				$student->image = 'img/students/'.$filename;
			}
			$student->firstname = $request['firstname'];
			$student->lastname = $request['lastname'];
			$student->phone = $request['phone'];
			$student->dob = $request['dob'];
			$student->gender = $request['gender'];
			$student->address = $request['address'];
			$student->state = $request['state'];
			$student->nationality = $request['nationality'];
			$student->class = $request['class'];
			$student->update();
			flash($student->firstname.' '.$student->lastname.' was updated successfully!');
			return redirect('students');
		}

	}

	public function download()
	{
		if(Auth::user()->type != 'admin')
		{
			flash('You are banned from this area');
			return redirect()->back();
		}else{
			$students = Student::where('id', '>', 0)->exclude(['type', 'image', 
				'created_at', 'updated_at', 'end_date', 'slug'])->get()->toArray();
			$csv = Writer::createFromFileObject(new \SplTempFileObject());

			//we insert the CSV header
			$csv->insertOne(['firstname', 'lastname', 'studentId', 'phone', 
  				'email', 'dob', 'gender', 'address', 'state','nationality', 
  				'class']);

			$csv->insertAll($students);
		  header('Content-Disposition: attachment');
		  header("Cache-control: private");
		  header("Content-type: application/force-download");
		  header("Content-transfer-encoding: binary\n");

		  $csv->output('students-data.csv');
		  exit;
		}
	}

	public function upload()
	{
		return view('admin.students.upload');
	}

	public function csvupload(Request $request)
	{	
		if($request->hasFile('file'))
		{	
			$file = $request->file('file');
			$filename = $file->getClientOriginalName();
			$path = public_path('csvfiles/students/'.$filename);
			if(!file_exists($path))
			{	

				$file->move(public_path('csvfiles/students'), $filename);
				$csv = Reader::createFromPath($path);
				foreach ($csv->setOffset(1)->fetchAll() as $key => $row) {
					DB::table('students')->insert(
						array(
							'firstname' => $row[0],
							'lastname' => $row[1],
							'studentId' => $row[2],
							'phone' => $row[3],
							'email' => $row[4],
							'dob' => $row[5],
							'gender' => $row[6],
							'address' => $row[7],
							'state' => $row[8],
							'nationality' =>$row[9],
							'class' =>$row[10],
							'slug' => $row[11]
						)
					);
				}
				flash('Records added successfully');
				return redirect('students');
			}else{
				flash('file already exits');
				return redirect()->back();
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
		$student = Student::find($id);

		if($request->get('agree')==1)
		{
			$student->delete();

			return redirect('students');
			flash($student->firstname.' '.$student->lastname.' was deleted successfully!');

		}

		return redirect('students');
	}

}
