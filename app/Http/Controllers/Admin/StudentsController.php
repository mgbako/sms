<?php namespace Scholr\Http\Controllers\Admin;

use Scholr\Http\Requests;
use Scholr\Http\Requests\StudentRequest;
use Scholr\Http\Controllers\Controller;
use Scholr\Student;
use Scholr\Classe;
use Scholr\Subject;
use DB;
use Illuminate\Http\Request;

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
