<?php

namespace Scholr\Http\Controllers;

use Illuminate\Http\Request;

use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Scholr\Student;
use Scholr\Grade;
use Scholr\Classe;
use Scholr\Subject;
use Scholr\School;
use PDF;
use Auth;
use DB;

class PrintController extends Controller
{   
    private $user;

     public function __construct(Guard $auth)
    {   
        $this->middleware('staff', ['except'=>['getMyresult', 'getMydetails']]);
        $this->user = $auth->user();
    }


    public function getMyresult($slug)
    {
        if ($this->user->type == 'student') {
            $count = 1;
            $student = Student::where('id', $this->user->student_id)->first();
            if ($student->slug == $slug) {
                $grades = Grade::where('student_id', $student->id)->get();
                $school = School::first();
                $data = [];
                flash('Find out how you have been performing in Exams below');
                $pdf = PDF::loadView('pdf.result', compact('term', 'student', 'grades', 'count', 'school'));
                return $pdf->stream('myresult.pdf');
            }else {
               flash('There is no record for this Student on the Database');
                return redirect()->back(); 
            }
            
        }else {
            flash('You are not allowed Access to that Area');
            return redirect()->back();
        }
    }

    
    public function getAllresults()
    {   
        if ($this->user->type == 'admin') {
            $grades = Grade::all();

            $pdf = PDF::loadView('pdf.allresults', compact('grades'));
            return $pdf->stream('Allresult.pdf');
        }else {
            flash('You are not allowed Access to that Area');
            return redirect()->back();
        }
    }


    public function getMydetails($slug)
    {
        if (Auth::user()->type == 'student') {
                $student = DB::table('users')->where('slug', $slug)->first();
                $records = DB::table('students')->where('id', $student->student_id)->first();

            $pdf = PDF::loadView('pdf.studentdetails', compact('student', 'records')); 
            //dd($pdf->stream('mydetails.pdf')); 
            return $pdf->stream('mydetails.pdf');
            }else {
                flash('Ops you do not have access to that area!');
                return redirect()->back();
            }
    }

     public function getClassresults($class)
    {   
        if ($this->user->type == 'admin' || $this->user->type == 'teacher') {
            $class_name = Classe::whereId($class)->first()->name;
            $grades = Grade::whereClasse_id($class)->get();
            $pdf = PDF::loadView('pdf.classresults', compact('grades', 'class_name'));
            return $pdf->stream('classresults.pdf');
        }else {
            flash('You are not allowed Access to that Area');
            return redirect()->back();
        }
    }

    public function getSubjectsresults($subject)
    {   
        if ($this->user->type == 'admin') {
            $subject_name = Subject::whereId($subject)->first()->name;
            $grades = Grade::whereSubject_id($subject)->get();
            $pdf = PDF::loadView('pdf.subjectsresults', compact('grades', 'subject_name'));
            return $pdf->stream('results-by-subject.pdf');
        }else {
            flash('You are not allowed Access to that Area');
            return redirect()->back();
        }
    }


    public function getGithub (){

     return PDF::loadFile('http://www.github.com')->stream('github.pdf'); 
    }

    public function missingMethod($parameters = array())
    {
        return redirect('/');
    }
}
