<?php

namespace Scholr\Http\Controllers;

use Illuminate\Http\Request;

use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;
use Scholr\Subjectquestionstatus;
use Scholr\Teacher;
use Scholr\SubjectAssigned;
use Scholr\School;

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
        $school = School::first();
        if($school){
            $totalQuestion = School::first()->number;
        }
        
        $count = 1;

        return view('status.subjectProgess.index', compact('subjectProgess', 'totalQuestion', 'count'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, $classId, $subjectId)
    {
        $subjectProgess = SubjectAssigned::where(['teacher_id'=>$id, 'classe_id'=>$classId, 'subject_id'=>$subjectId])->first();

        $subjectProgess->delete();

        return redirect('subjectAssigned');
        flash($subjectAssigned->firstname.' '.$student->lastname.' was deleted successfully!');

    }

}
