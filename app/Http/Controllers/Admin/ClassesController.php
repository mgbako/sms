<?php namespace Scholr\Http\Controllers\Admin;

use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Scholr\Http\Requests\ClassesRequest;
use Scholr\Classe;
use Scholr\Subject;

class ClassesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$count = 1;
		$classes = Classe::orderBy('name', 'asc')->get();
		$subjectList = Subject::orderBy('name', 'asc')->lists('name', 'id');
		return view('admin.classes.index', compact('classes', 'count','subjectList'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{ 
		$subjects = Subject::lists('name', 'id');
		return view('admin.classes.create', compact('subjects'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ClassesRequest $request)
	{

		$class = Classe::create($request->all());
		$class->subjects()->attach($request->input('subject'));
		flash('New Class: '.$class->name.' was created successfully!');
		return redirect('classes');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$class = Classe::find($id);
		return view('admin.classes.edit', compact('class'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$class = Classe::findOrFail($id);

		$this->validate($request, ['name'=>'required|min:3']);

		$class->update($request->all());

		return redirect()
			->route('admin.classes.index')
			->with('message', '<p class="alert alert-success">Class Updated</p>');
	}

	/**
	 * Show the form for deleting the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$class = Classe::find($id);

		return view('admin.classes.delete', compact('class'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
		$class = Classe::find($id);

		if($request->get('agree')==1)
		{
			$class->delete();

			return redirect()
				->route('admin.classes.index')
				->with('message', '<p class="alert alert-danger">Class Deleted</p>');
		}

		return redirect('classes');
	}

}
