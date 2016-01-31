<?php

namespace Scholr\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Scholr\School;
use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Scholr\Question;
use Scholr\Answer;
use Scholr\Teacher;
use Scholr\SubjectAssigned;
use Scholr\Http\Requests\QuestionRequest;

class QuestionsController extends Controller
{   

    public function __contruct()
    {
        $this->middleware('staff');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($classe_id, $subject_id)
    {   
        $user = Auth::user();
        $school = DB::table('schools')->first();
        $totalquestion = $school->number;
        $count = 1;
        $subject_id = $subject_id->id;

        $valid = false;

        $questionCount = (int)Question::where('classe_id', $classe_id)
                               ->where('subject_id', $subject_id)
                               ->where('teacher_id', $user->teacher_id)
                               ->get()->count();

        $questions = Question::where('classe_id', $classe_id)
                               ->where('subject_id', $subject_id)
                               ->orderBy('created_at', 'desc')
                               ->take($school->number)
                               ->get();
                               
        $teacher = DB::table('teachers')->where('staffId', $user->loginId)->first();
        $assigned = SubjectAssigned::where('teacher_id', $teacher->id)->groupBy('classe_id')->get();
        return view('admin.questions.index', compact('questions', 'count', 'subject_id', 'classe_id', 'school', 'assigned', 'questionCount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(QuestionRequest $request, $id, $subjectId)
    {   
        $user = Auth::user();
        $questions = Question::where('classe_id', $id)
                               ->where('subject_id', $subjectId)
                               ->where('teacher_id', $user->teacher_id)
                               ->get()->count();

        $school = School::first();
        if($questions >= $school->number)
        {
            flash('Maximum Question Added');
            return redirect()
            ->route("classes.subjects.questions.index", [$id, $subjectId]);
        }

        $question = new Question($request->all() );
        $teacher = Teacher::where('staffId', Auth::user()->loginId)->first();
        
        $teacher->questions()->save($question);

        $myanswer = $request['answer'];
        $myanswer = $request[$myanswer];
        $answer = new Answer();
        $answer->answer = $myanswer;
        $question->answer()->save($answer);

       flash('New question was Added Successfully');
        return redirect()
        ->route("classes.subjects.questions.index", [$id, $subjectId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($classe_id, $subject_id, $questionId)
    {
        $count = 1;
        $question = Question::find($questionId);

        $user = \Auth::user();
        $teacher = \DB::table('teachers')->where('staffId', $user->loginId)->first();
        $assigned = SubjectAssigned::where('teacher_id', $teacher->id)->groupBy('classe_id')->get();

        return view('admin.questions.show', compact('question', 'classe_id', 'subject_id', 'assigned'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, $subjectId, $questionId)
    {
        $school = DB::table('schools')->first();
        $totalquestion = $school->number;

        $user = \Auth::user();
        $question = Question::findOrFail($questionId);
        
        $teacher = \DB::table('teachers')->where('staffId', $user->loginId)->first();
        $totalAdded = Question::where(['teacher_id'=>$teacher->id, 'classe_id'=>$id, 'subject_id'=>$subjectId->id])->get()->count();

        $totalPer = ceil( ($totalAdded * 100) / $totalquestion);

        $assigned = SubjectAssigned::where('teacher_id', $teacher->id)->groupBy('classe_id')->get();
        return view('admin.questions.edit', compact('question', 'id', 'subjectId', 'assigned', 'totalquestion', 'totalAdded', 'totalPer') );
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id, $subjectId
     * @return Response
     */
    public function edits($id, $subjectId)
    {



        $school = DB::table('schools')->first();
        $totalquestion = $school->number;

        $user = \Auth::user();
                
        $teacher = \DB::table('teachers')->where('staffId', $user->loginId)->first();

        $questions = Question::where(['teacher_id'=>$teacher->id, 'classe_id'=>$id, 'subject_id'=>$subjectId])->paginate(1);


        $totalAdded = Question::where(['teacher_id'=>$teacher->id, 'classe_id'=>$id, 'subject_id'=>$subjectId])->get()->count();

        $totalPer = ceil( ($totalAdded * 100) / $totalquestion);

        $assigned = SubjectAssigned::where('teacher_id', $teacher->id)->groupBy('classe_id')->get();
        return view('admin.questions.edits', compact('questions', 'id', 'subjectId', 'assigned', 'totalquestion', 'totalAdded', 'totalPer') );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(QuestionRequest $request, $id, $subjectId, $questionId)
    {      
        $question = Question::findOrFail($questionId);
        
        $answer = Answer::where('question_id', $question->id);
        $myanswer = $request['answer'];
        $myanswer = $request[$myanswer];
       
        $question->update($request->all());
        $answer->update([
            'question_id' => $questionId,
            'answer' => $myanswer
        ]);
        flash('New question was Updated Successfully');
        return redirect()
                ->route("classes.subjects.questions.index", [$id, $subjectId]);
    }

     /**
     * Show the form for Deleting the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id, $subjectId, $questionId)
    {
        $user = \Auth::user();
        $question = Question::find($questionId);

        $teacher = \DB::table('teachers')->where('staffId', $user->loginId)->first();
        $assigned = SubjectAssigned::where('teacher_id', $teacher->id)->groupBy('classe_id')->get();

        return view('admin.questions.delete', compact('question', 'id', 'subjectId', 'questionId', 'assigned'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id, $subjectId, $questionId)
    {
        $question = Question::find($questionId);

        if($request->get('agree')==1)
        {
            $question->delete();

            flash('New question was Deleted Successfully');
            return redirect()
                ->route("classes.subjects.questions.index", [$id, $subjectId]);
        }

        return redirect()
                ->route("classes.subjects.questions.index", [$id, $subjectId]);

    }
}
