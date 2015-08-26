<?php namespace Scholr\Http\Controllers\Admin;

use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Scholr\Subject;
use Scholr\Classe;
use Scholr\Question;
use Scholr\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\Auth;
use Scholr\Teacher;

class QuestionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$count = 1;
		$questions = Question::all();

		return view('admin.questions.index', compact('questions', 'count'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$subjectList = Subject::lists('name','id');
		$classList = Classe::lists('name');
		$teacher_id = 1;

		return view('admin.questions.create', compact('subjectList', 'teacher_id', 'classList'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(QuestionRequest $request)
	{
		dd(Auth::user()->teacher_id);

		$question = new Question($request->all() );
		Auth::user()->teacher->questions->save($question);

		/*$input = $request->all();

		Question::create($input);*/

		return redirect()
			->back()
			->with('message', '<span class="alert alert-success">Question Created</span>');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$count = 1;
		$question = Question::find($id);

		return view('admin.questions.show', compact('question', 'count'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subjectList = Subject::lists('name','id');
		$classList = Classe::lists('name');
		$teacher_id = 1;

		$question = Question::find($id);
		return view('admin.questions.edit', compact('question', 'subjectList', 'teacher_id', 'classList'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, QuestionRequest $request)
	{
		$question = Question::find($id);
		$question->update($request->all());

		return redirect()
			->route('admin.questions.index')
			->with('message', '<p class="alert alert-success">Question Updated</p>');
	}

	/**
	 * Show the form for deleting the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$question = Question::find($id);

		return view('admin.questions.delete', compact('question'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
		$question = Question::find($id);

		if($request->get('agree')==1)
		{
			$question->delete();

			return redirect()
				->route('admin.questions.index')
				->with('message', '<p class="alert alert-success">Question Deleted</p>');
		}

		return redirect('questions');

	}

}
