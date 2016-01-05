<?php

namespace Scholr\Http\Controllers;

use Illuminate\Http\Request;
use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;
use Scholr\Subjectquestionstatus;

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
        $subjectAnalysis = Subjectquestionstatus::whereProgress(1)->get();

        return view('status.subjectAnalysis.index', compact('count', 'subjectAnalysis'));
    }


}
