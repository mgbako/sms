<?php namespace Scholr\Http\Controllers\Admin;

use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Scholr\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\Auth;
use Scholr\Teacher;
use Scholr\Subject;
use Scholr\Classe;
use Scholr\Question;
use Scholr\Answer;

class QuestionsController extends Controller {


	protected $class;
	protected $subject;

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$term = 'First Term';

		if($_GET['class'])
		{
			$this->class = $_GET['class'];
			$this->subject = $_GET['subject'];

			\Session::put('class', $_GET['class']);
			\Session::put('subject', $_GET['subject']);
		}

		$classe_id = Classe::where('name', $this->class)->first()->id;
		$subject_id = Subject::where('name', $this->subject)->first()->id;

		$count = 1;
		$questions = Question::all();
		return view('admin.questions.index', compact('questions', 'count', 'subject_id', 'classe_id', 'term'));
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(QuestionRequest $request)
	{	
		$class = Classe::findOrfail($request['class_id']);
		$subject = Subject::findOrfail($request['subject_id']);
		$teacher = teacher::findOrfail(Auth::user()->teacher->id);
		$question = new Question($request->all());
		$teacher->questions()->save($question);

		$myanswer = $request['answer'];
		$myanswer = $request[$myanswer];
		$answer = new Answer();
		$answer->answer = $myanswer;
		$question->answer()->save($answer);
		flash('New Question was Successfully Added to '.$subject->name.' exam for '.
				$class->name);
		return redirect()->back();
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
