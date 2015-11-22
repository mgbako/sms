<?php namespace Scholr\Http\Controllers\Admin;

use Scholr\Http\Requests;
use Scholr\Http\Requests\TeacherRequest;
use Scholr\Http\Controllers\Controller;
use Scholr\Teacher;
use Scholr\Classe;
use Scholr\Subject;

use Illuminate\Http\Request;

class TeachersController extends Controller {
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
		$teachers = Teacher::all();
		return view('admin.teachers.index', compact('teachers', 'count'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		$classes = Classe::lists('name', 'id');
		$subjects = Subject::lists('name', 'id');

		return view('admin.teachers.create', compact('subjects', 'classes'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(TeacherRequest $request)
	{	
		
		$requests = $request->all();
		$image = $request->file('image');
		$filename = time()."-".$image->getClientOriginalName();
		$path = public_path('img/teachers/'.$filename);
		\Image::make($image->getRealPath())->resize(150, 100)->save($path);
		$requests['image'] = 'img/teachers/'.$filename;
		$teacher = new Teacher($requests);
		$teacher->image = 'img/teachers/'.$filename;
		$teacher->save();
		flash('New Teacher: '.$teacher->firstname.' was created successfully!');
		return redirect('teachers');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$teacher = Teacher::find($id);
		return view('admin.teachers.show', compact('teacher'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$teacher = Teacher::findOrFail($id);
		$class = $teacher->classes()->lists('name');

		return view('admin.teachers.edit', compact('teacher', 'class', 'types'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$teacher = Teacher::findOrFail($id);

		if ($teacher) {
			if ($request->hasFile('image')) {
				$image = $request->file('image');
				$filename = time()."-".$image->getClientOriginalName();
				$path = public_path('img/teachers/'.$filename);
				\Image::make($image->getRealPath())->resize(150, 100)->save($path);
				$student->image = 'img/teachers/'.$filename;
			}
			$teacher->firstname = $request['firstname'];
			$teacher->lastname = $request['lastname'];
			$teacher->phone = $request['phone'];
			$teacher->dob = $request['dob'];
			$teacher->gender = $request['gender'];
			$teacher->address = $request['address'];
			$teacher->state = $request['state'];
			$teacher->nationality = $request['nationality'];
			$teacher->update();
			flash($teacher->firstname.' '.$teacher->lastname.' was updated successfully!');
			return redirect('teachers');
		}

	}

	public function delete($id)
	{
		$teacher = Teacher::find($id);

		return view('admin.teachers.delete', compact('teacher'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
		$teacher = Teacher::find($id);

		if($request->get('agree')==1)
		{
			$teacher->delete();
			flash($teacher->firstname.' '.$teacher->lastname.' was deleted successfully!');
			return redirect('teachers');
		}

		return redirect('teachers');
	}

}
