<?php

namespace Scholr\Http\Controllers;

use Illuminate\Http\Request;
use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use Scholr\Student;
use Scholr\Grade;
use Scholr\Classe;
use Scholr\Subject;
use Scholr\School;
use Scholr\SubjectAssigned;
use DB;

class ResultsController extends Controller
{   
    /**
     * holds value of the current logined in user
     */
    private $user;

    private $term;

    public function __construct(Guard $auth)
    {   
        $this->middleware('staff', ['except'=>['myresult']]);
        $this->user = $auth->user();
        $school = School::first();
        if($school)
        {
            $this->term = $school->term;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if ($this->user->type == 'admin') {
            $grades = Grade::all();
            return view('results.all', compact('grades'));
        }else {
            flash('You are not allowed Access to that Area');
            return redirect()->back();
        }
    }


    /**
     * show results obtained by a student
     */
    public function myresult($slug)
    {  

        if ($this->user->type == 'student') {
            $count = 1;
            $student = Student::where('id', $this->user->student_id)->first();
            //dd($student);
            if ($student->slug == $slug) {
                $grades = Grade::where('student_id', $student->id)
                ->where('approve', 1)->get();

                /*dd($grades);*/
                $sum = $grades->sum('total');
                $avg = $grades->avg('total');
                //dd($sum);
                $term = $this->term;
                flash('Find out how you have been performing in Exams below');
                return view('results.myresult', compact('student', 'grades', 'count', 'term', 'sum', 'avg'));
            }else {
               flash('There is no record for this Student on the Database');
                return redirect()->back(); 
            }
            
        }else {
            flash('You are not allowed Access to that Area');
            return redirect()->back();
        }
        
    }

     public function subjects($subject)
    {   
        if ($this->user->type == 'admin') {
            $subject_name = Subject::whereId($subject->id)->first();
            $grades = Grade::whereSubject_id($subject->id)->get();
            return view('results.subjects', compact('grades', 'subject_name'));
        }else {
            flash('You are not allowed Access to that Area');
            return redirect()->back();
        }
    }



     public function classes($class)
    {   
        if ($this->user->type == 'admin' || $this->user->type == 'teacher') {
            $class_name = Classe::whereId($class)->first();
            $grades = Grade::whereClasse_id($class)->get();
            if ($this->user->type == 'teacher') {
                $teacher = DB::table('teachers')->where('staffId', $this->user->loginId)->first();
                $assigned = SubjectAssigned::where('teacher_id', $teacher->id)->groupBy('classe_id')->get();
                return view('results.classes', compact('assigned', 'grades', 'class_name'));
            }
            return view('results.classes', compact('grades', 'class_name'));
        }else {
            flash('You are not allowed Access to that Area');
            return redirect()->back();
        }
    }

    public function student($slug)
    {   
        if ($this->user->type == 'admin' || $this->user->type == 'teacher') {
            $count = 1;  
            $student = Student::whereId($slug)->first();
            $grades = Grade::whereStudent_id($student->id)->get();
            $sum = $grades->sum('total');
            $avg = $grades->avg('total');
            if ($this->user->type == 'teacher') {
                $teacher = DB::table('teachers')->where('staffId', $this->user->loginId)->first();
                $assigned = SubjectAssigned::where('teacher_id', $teacher->id)->groupBy('classe_id')->get();
                return view('results.students', compact('assigned', 'grades', 'student', 'count', 'sum', 'avg'));
            }
            return view('results.students', compact('grades', 'student', 'count', 'sum', 'avg'));
        }else {
            flash('You are not allowed Access to that Area');
            return redirect()->back();
        }
    }

    /**
        Approving result
    */
    public function approve($classeId, $subjectId, $studentId)
    {   
  
        $grade = Grade::where('classe_id', $classeId)
                        ->where('subject_id', $subjectId)
                        ->where('student_id', $studentId)
                        ->where('approve', 0)->get();

        if ($grade) {
            $affacted = DB::update('update grades set approve = 1 where classe_id = ? and subject_id = ? and student_id = ?', [$classeId, $subjectId, $studentId]);
           if($affacted) {
            flash('Result as been Approved');
            return redirect('/results/all');
           }else {
            flash('Error Approving result please contact the IT department');
            return redirect('/results/all');
           }
        }else {
            flash('Result was not Approved please try again');
            return redirect('/results/all');
        }
        
    }

    /**
        Disapproving result
    */
    public function disapprove($classeId, $subjectId, $studentId)
    {   
  
        $grade = Grade::where('classe_id', $classeId)
                        ->where('subject_id', $subjectId)
                        ->where('student_id', $studentId)
                        ->where('approve', 1)->get();
        if ($grade) {
            $affacted = DB::update('update grades set approve = 0 where classe_id = ? and subject_id = ? and student_id = ?', [$classeId, $subjectId, $studentId]);
           if($affacted) {
            flash('Result as been disapproved');
            return redirect('/results/all');
           }else {
            flash('Error Disapproving result please contact the IT department');
            return redirect('/results/all');
           }
        }else {
            flash('Result was not disapproved please try again');
            return redirect('/results/all');
        }
        
    }

    public function missingMethod($parameters = array())
    {
        return redirect('/');
    }
}
