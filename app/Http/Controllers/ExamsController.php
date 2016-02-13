<?php namespace Scholr\Http\Controllers;

use Illuminate\Http\Request;

use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;
use Scholr\Question;
use Scholr\ANswer;
use Scholr\Student;
use Scholr\Classe;
use Scholr\Subject;
use Scholr\Http\Requests\ExamRequest;
use Auth;
use DB;
use Scholr\SubjectAssigned;
use Scholr\Teacher;
use Scholr\SubjectQuestionstatus;
use Scholr\School;
use Scholr\Grade;


class ExamsController extends Controller
{
    public $class;
    public $subject;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($classe_id)
    {   
        $user = Auth::user();
        if($user->type == 'student')
        {
          
            $term = School::first()->term;
            $subjects = Classe::find($classe_id)->subjects()->get();
            $records = DB::table('students')->where('id', $user->student_id)->first();
            $count = 1;
            return view('exams.index', compact('user', 'classe_id', 'subjects', 'subjectAssigneds', 'records'));
        }  
        flash('you are not allowed access to this area');
        return redirect()->back();
    }

    public function hall($classe_id, $subject_id)
    {
        $user = Auth::user();

        if($user->type == 'student')
        {
            $records = DB::table('students')->where('id', $user->student_id)->first();
            $time = Subjectquestionstatus::where('classe_id', $classe_id)
                                        ->where('subject_id', $subject_id)
                                        ->first();
            $term = School::first()->term;
            $count = 1;
            $questions = Question::where('classe_id', $classe_id)
                                   ->where('subject_id', $subject_id)
                                   ->orderBy(\DB::raw('RAND()'))
                                   ->get();

            $totals = Question::where('classe_id', $classe_id)
                                   ->where('subject_id', $subject_id)
                                   ->get();

            return view('exams.examHall', compact('questions', 'count', 'subject_id', 'classe_id', 'term', 'totals', 'user', 'time', 'records'));
        }
    }
    public function missingMethod($parameters = array())
    {
        return redirect('/');
    }
}
