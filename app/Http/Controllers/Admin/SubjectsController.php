<?php namespace Scholr\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;

use Scholr\Http\Requests\SubjectRequest;
use Scholr\Subject;


class SubjectsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		$count = 1;
		$subjects = Subject::orderBy('name', 'asc')->get();
		return view('admin.subjects.index', compact('subjects', 'count'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.subjects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(SubjectRequest $request)
	{
		$input = $request->all();

		 Subject::create($input);


		 $subjects = Subject::all();
		 return redirect('subjects');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subject = Subject::findOrFail($id);

		return view('admin.subjects.edit', compact('subject'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$subject = Subject::findOrFail($id);

		$this->validate($request, ['name'=>'required|min:3']);

		$subject->update($request->all());

		return redirect('subjects');
	}

	/**
	 * Show the form for deleting the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$subject = Subject::find($id);

		return view('admin.subjects.delete', compact('subject'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
		$subject = Subject::find($id);

		if($request->get('agree')==1)
		{
			$subject->delete();

			return redirect()
				->route('admin.subjects.index')
				->with('message', '<p class="alert alert-danger">Subject Deleted</p>');
		}

		return redirect('subjects');
	}

}
