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
	
		$class = Classe::lists('name', 'id');
		$subjects = Subject::lists('name', 'id');
		return view('admin.teachers.create', compact('subjects', 'class'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(TeacherRequest $request)
	{	
		
		$teacher = Teacher::create($request->all());
		$teacher->classes()->attach($request->input('class'));
		$teacher->subjects()->attach($request->input('subjects'));
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

		return view('admin.teachers.edit', compact('teacher', 'class'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, TeacherRequest $request)
	{
		$teacher = Teacher::findOrFail($id);

		$teacher->update($request->all());

		return redirect('teachers');
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
			return redirect('teachers');
		}

		return redirect('teachers');
	}

}
