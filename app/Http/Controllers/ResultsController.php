<?php

namespace Scholr\Http\Controllers;

use Illuminate\Http\Request;
use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use Scholr\Student;
use Scholr\Grade;

class ResultsController extends Controller
{   
    /**
     * holds value of the current logined in user
     */
    private $user;


    public function __construct(Guard $auth)
    {   
        $this->middleware('staff');
        $this->user = $auth->user();

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
            $student = Student::where('id', $this->user->student_id)->first();
            if ($student->slug == $slug) {
                $grades = Grade::whereStudent_id($student->id);
                flash('Find out how you have been performing in Exams below');
                return view('results.myresult', compact('student'));
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

            $grades = Grade::whereSubject_id($subject);
            return view('results.subjects', compact('grades'));
        }else {
            flash('You are not allowed Access to that Area');
            return redirect()->back();
        }
    }



     public function classes($class)
    {   
        if ($this->user->type == 'admin' || $this->user->type == 'teacher') {

            $grades = Grade::whereSubject_id($subject);
            if ($this->user->type == 'teacher') {
                $teacher = DB::table('teachers')->where('staffId', $this->user->loginId)->first();
                $assigned = SubjectAssigned::where('teacher_id', $teacher->id)->groupBy('classe_id')->get();
                return view('results.classes', compact('assigned', 'grades'));
            }
            return view('results.classes', compact('grades'));
        }else {
            flash('You are not allowed Access to that Area');
            return redirect()->back();
        }
    }

    public function student($student)
    {   
        if ($this->user->type == 'admin' || $this->user->type == 'teacher') {

            $grades = Grade::whereSubject_id($subject);
            if ($this->user->type == 'teacher') {
                $teacher = DB::table('teachers')->where('staffId', $this->user->loginId)->first();
                $assigned = SubjectAssigned::where('teacher_id', $teacher->id)->groupBy('classe_id')->get();
                return view('results.students', compact('assigned', 'grades'));
            }
            return view('results.students', compact('grades'));
        }else {
            flash('You are not allowed Access to that Area');
            return redirect()->back();
        }
    }

}
