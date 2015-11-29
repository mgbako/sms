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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
