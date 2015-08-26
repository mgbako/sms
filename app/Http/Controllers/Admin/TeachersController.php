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
		$types = [
			'Administrator'=>'Administrator',
			'Teacher'=>'Teacher',
			'Users'=>'Users',
		];

		$classes = Classe::lists('name', 'id');
		$subjects = Subject::lists('name', 'id');

		return view('admin.teachers.create', compact('types', 'subjects', 'classes'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(TeacherRequest $request)
	{

		
		$input = $request->all();
		$teacher = Teacher::create($input);

		$teacher->classes()->attach($request->input('classe'));
		$teacher->subjects()->attach($request->input('subject'));

		return redirect()
			->route('admin.teachers.index');
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
		$types = [
			'Administrator'=>'Administrator',
			'Teacher'=>'Teacher',
			'Users'=>'Users',
		];
		
		$teacher = Teacher::findOrFail($id);

		return view('admin.teachers.edit', compact('teacher', 'types'));
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

		$this->validate($request, Teacher::updateRules());

		$teacher->update($request->all());

		return redirect()
				->route('admin.teachers.index')
				->with('message', '<p class="alert alert-success text-center">teacher Updated</p>');
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

			return redirect()
				->route('admin.teachers.index')
				->with('message', '<p class="alert alert-danger text-center">teacher Deleted</p>');
		}

		return redirect('teachers');
	}

}
