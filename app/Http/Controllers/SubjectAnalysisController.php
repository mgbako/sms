<?php

namespace Scholr\Http\Controllers;

use Illuminate\Http\Request;
use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;
use Scholr\SubjectQuestionstatus;

class SubjectAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $count = 1;
        $subjectAnalysis = SubjectQuestionstatus::whereProgress(1)->get();

         //$subjectAssigned = SubjectAssigned::where('classe_id', $request->classe_id)->where('subject_id', $request->subject_id)->first('teacher_id');

        return view('status.subjectAnalysis.index', compact('count', 'subjectAnalysis'));
    }

    public function missingMethod($parameters = array())
    {
        return redirect('/');
    }
}
