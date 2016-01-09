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
        $this->term = School::first()->term;

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
            if ($student->slug == $slug) {
                $grades = Grade::where('student_id', $student->id)->get();
                $term = $this->term;
                flash('Find out how you have been performing in Exams below');
                return view('results.myresult', compact('student', 'grades', 'count', 'term'));
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
            $subject_name = Subject::whereId($subject->id)->first()->name;
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
            $class_name = Classe::whereId($class)->first()->name;
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
            if ($this->user->type == 'teacher') {
                $teacher = DB::table('teachers')->where('staffId', $this->user->loginId)->first();
                $assigned = SubjectAssigned::where('teacher_id', $teacher->id)->groupBy('classe_id')->get();
                return view('results.students', compact('assigned', 'grades', 'student', 'count'));
            }
            return view('results.students', compact('grades', 'student', 'count'));
        }else {
            flash('You are not allowed Access to that Area');
            return redirect()->back();
        }
    }

}
