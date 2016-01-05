<?php

namespace Scholr\Http\Controllers;

use Illuminate\Http\Request;

use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;
use Scholr\Student;
use Scholr\Answer;
use Scholr\Result;
use Scholr\School;
use Scholr\Grade;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = \Auth::user();
        $student_id = Student::where('studentId', $user->loginId)->first();

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
                    $count++;
                }
            }
        }


        $classe_id  = $request->input('classe_id');
        $subject_id = $request->input('subject_id');

        $request->session()->put('classe_id', $classe_id);
        $request->session()->put('subject_id', $subject_id);

        $term = School::first()->term;

        $taken = $user->taken($student_id, $classe_id, $subject_id);
    
        
        if($taken == 0)
        {
            Grade::create(
                    [
                        'student_id' => $student_id->id,
                        'classe_id' => $classe_id,
                        'subject_id' => $subject_id,
                        'term' => $term,
                        'total' => $count
                    ]
            );
        }

        return redirect()
                    ->route("scores.show", [$student_id, $classe_id, $subject_id]);


        return redirect()
                    ->route("results.show", $student_id->id);

        return redirect()
                ->route("classes.exams.index", [$classe_id])
                ->with('message', '<p class="alert alert-danger">You have Already Taken This Exam</p>');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($student_id, $classe_id, $subject_id)
    {
        $user = \Auth::user();
        $student_id = Student::where('studentId', $user->loginId)->first();
        $term = School::first()->term;
        $score = Grade::where([
                        'student_id' => $student_id->id,
                        'classe_id' => $classe_id,
                        'subject_id' => $subject_id,
                        'term' => $term
                    ])->first();

        //dd($score);
        return view('scores.show', compact('user', 'score'));
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
