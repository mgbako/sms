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
        $term = 'First Term';

        $subjects = Classe::find($classe_id)->subjects()->get();

        $count = 1;
        
        return view('exams.index', compact('classe_id', 'subjects'));
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
    public function store(ExamRequest $request, $classe_id, $subject_id)
    {
        $user = Auth::user();
        return Student::where('studentId', $user->userId)->first();
        $result;
        $selected;
        $count = 0;
        foreach($request->all() as $index => $answer)
        {
            $results = Answer::where('question_id', $index)->lists('answer');
            foreach ($results as $result)
            {
                if ($result == $answer)
                {
                    $count ++;
                }
            }
        }

        return $request->all();

        return $classe_id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($classe_id, $subject_id)
    {   
        $term = 'First Term';
        $count = 1;
        $user = Auth::user();
        $time = Subjectquestionstatus::where('classe_id', $classe_id)
                ->where('subject_id', $subject_id)
                ->where('write_now', 1)->first();
       
        
        $questions = Question::where('classe_id', $time->classe_id)
                    ->where('subject_id', $time->subject_id)
                    ->orderBy(\DB::raw('RAND()'))->get();
        return view('exams.show', compact('user', 'questions', 'count', 'subject_id', 'classe_id', 'term', 'totals', 'time'));
    }

}
