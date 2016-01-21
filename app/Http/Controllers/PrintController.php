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

class PrintController extends Controller
{   
    private $user;

    private $term;

     public function __construct(Guard $auth)
    {   
        $this->middleware('staff', ['except'=>['getMyresult']]);
        $this->user = $auth->user();
        $this->term = School::first()->term;

    }


    public function getMyresult($slug)
    {
        if ($this->user->type == 'student') {
            $count = 1;
            $student = Student::where('id', $this->user->student_id)->first();
            if ($student->slug == $slug) {
                $grades = Grade::where('student_id', $student->id)->get();
                $term = $this->term;
                $data = [];
                $data['term'] = $term;
                flash('Find out how you have been performing in Exams below');
                $pdf = PDF::loadView('pdf.result', compact('term'));
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

     public function getGithub (){

     return PDF::loadFile('http://www.github.com')->stream('github.pdf'); 
    }
}
