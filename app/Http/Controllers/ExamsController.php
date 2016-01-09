<?php namespace Scholr\Http\Controllers;

use Illuminate\Http\Request;

use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;
use Scholr\Question;
use Scholr\ANswer;
use Scholr\Student;
use Scholr\classe;
use Scholr\Subject;
use Scholr\Http\Requests\ExamRequest;
use Auth;
use Scholr\SubjectAssigned;
use Scholr\Teacher;
use Scholr\Subjectquestionstatus;
use Scholr\School;


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
        $term = School::first()->term;

        //return $user->hasQuestion(1, 2);

        /**
         * Checking if exam as been taken
         */


        if($user->type != 'student')
        {
            if($user->type == 'teacher')
            {
                $teacherId = Teacher::where('staffId', $user->loginId)->first()->id;
            }
            else{
                $teacherId = Admin::where('staffId', $user->loginId)->first()->id;
            }

            $subjectAssigneds = SubjectAssigned::whereTeacherId($teacherId)
                                                ->whereClasseId($classe_id)
                                                ->get();
        }

        $subjects = Classe::find($classe_id)->subjects()->get();

        $count = 1;
        
        return view('exams.index', compact('classe_id', 'subjects', 'subjectAssigneds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ExamRequest $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function hall($classe_id, $subject_id)
    {
        $user = Auth::user();

        $time = Subjectquestionstatus::where('classe_id', $classe_id)
                                    ->where('subject_id', $subject_id)
                                    ->first();
        $term = 'First Term';

        $count = 1;
        $questions = Question::where('classe_id', $classe_id)
                               ->where('subject_id', $subject_id)
                               ->orderBy(\DB::raw('RAND()'))
                               ->get();

        $totals = Question::where('classe_id', $classe_id)
                               ->where('subject_id', $subject_id)
                               ->get();


        return view('exams.examHall', compact('questions', 'count', 'subject_id', 'classe_id', 'term', 'totals', 'user', 'time'));
    }
}
