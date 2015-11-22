<?php namespace Scholr\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;

use Scholr\Http\Requests\SubjectRequest;
use Scholr\Subject;
use Scholr\Classe;

class SubjectsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		$count = 1;
		$subjects = Subject::all();
		return view('admin.subjects.index', compact('subjects', 'count'));
	}

	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(SubjectRequest $request)
	{
		 $subject = Subject::create($request->all());
		 flash('New subject: '.$subject->name.' was created successfully!');
		 return redirect('subjects');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{ 
		$subject = $id;

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
		$subject = $id;

		$this->validate($request, ['name'=>'required|min:3']);

		$subject->update($request->all());
		 flash($subject->name.' was updated successfully!');
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
		$subject = $id;

		if($request->get('agree')==1)
		{
			$subject->delete();
			flash($subject->name.' was deleted successfully!');
			return redirect('subjects');
		}
			
		return redirect('subjects');
	}

}
