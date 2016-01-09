<?php

namespace Scholr\Http\Controllers;

use Illuminate\Http\Request;
use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use Scholr\Student;
use Scholr\Classe;
use Scholr\Grade;
use Scholr\SubjectAssigned;
use Scholr\Subject;

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



    public function classes($classId, $subjectId)
    {   
        $school = \DB::table('schools')->first();
        $student = new Student;
        $class = new Classe;
        $subject = new Subject;
        if ($this->user->type == 'admin' || $this->user->type == 'teacher') {

            $grades = Grade::where(['Subject_id'=>$subjectId, 'classe_id'=>$classId])->get();
            $totalGrades = Grade::where(['Subject_id'=>$subjectId, 'classe_id'=>$classId])->sum('total');
            $total = Grade::where(['Subject_id'=>$subjectId, 'classe_id'=>$classId])->count();
            $average = round(Grade::where(['Subject_id'=>$subjectId, 'classe_id'=>$classId])->avg('total'));

            if($average <= 40)
            {
                $remark = "Poor";
            }
            else if($average <= 60)
            {
                $remark = "Goood";
            }
            else if($average <= 80)
            {
                $remark = "Very Goood";
            }
            else{
                $remark = "Excellent";
            }

            if ($this->user->type == 'teacher') {
                $teacher = \DB::table('teachers')->where('staffId', $this->user->loginId)->first();
                $assigned = SubjectAssigned::where('teacher_id', $teacher->id)->groupBy('classe_id')->get();
                return view('results.classes', compact('assigned', 'grades', 'student', 'class', 'subject', 'subjectId', 'totalGrades', 'school', 'average', 'remark'));
            }
            return view('results.classes', compact('grades'));
        }else {
            flash('You are not allowed Access to that Area');
            return redirect()->back();
        }
    }

    public function student($classId, $student)
    {   
        if ($student) {

            return $grades = Grade::where(['student_id'=>$student, 'classe_id'=>$classId])->get();
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
