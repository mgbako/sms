<?php namespace Scholrs\Http\Controllers;

use Illuminate\Http\Request;

use Scholrs\Http\Requests;
use Scholrs\Http\Controllers\Controller;
use Scholrs\Question;
use Scholrs\Student;
use Auth;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();
        $user_id = $user->userId;
        //dd($user_id);
        $type = Auth::user()->type;
        $id = 'STD201501';
        $student = Student::where('studentId', $user_id)->first();
        
        dd($student->class);

        return view('exams.index', compact('student'));
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
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
