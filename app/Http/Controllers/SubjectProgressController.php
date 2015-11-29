<?php

namespace Scholr\Http\Controllers;

use Illuminate\Http\Request;

use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;
use Scholr\Subjectquestionstatus;
use Scholr\Teacher;
use Scholr\SubjectAssigned;

class SubjectProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $subjectProgess = SubjectAssigned::all();

        return view('status.subjectProgess.index', compact('subjectProgess'));
    }
}
