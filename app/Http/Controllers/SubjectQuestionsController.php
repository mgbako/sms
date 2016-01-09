<?php

namespace Scholr\Http\Controllers;

use Illuminate\Http\Request;

use Scholr\Http\Requests;
use Scholr\Http\Requests\SubjectquestionstatusRequest;
use Scholr\Http\Controllers\Controller;
use Scholr\Classe;
use Scholr\Subject;
use Scholr\Question;
use Scholr\Subjectquestionstatus;
use DB;

class SubjectQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $count = 1;
        $classList = Classe::orderBy('name', 'asc')->lists('name', 'id');
        $subjectList = Subject::orderBy('name', 'asc')->lists('name', 'id');
        $time = [""=>"Choose", 15=>15, 30=>30, 45=>45, 60=>60, 75=>75, 90=>90, 105=>105, 120=>120];

        $subjectquestionstatus = Subjectquestionstatus::all();

        return view('status.subjectQuestion.index', compact('count', 'subjectList', 'classList', 'time', 'subjectquestionstatus'));
    }

    public function submit($classeId, $subjectId)
    {   
  
        $subjectquestionstatus = Subjectquestionstatus::where('classe_id', $classeId)
                                ->where('subject_id', $subjectId)->first();
        if ($subjectquestionstatus) {
            $affacted = DB::update('update subjectquestionstatus set progress = 1 where classe_id = ? and subject_id = ?', [$classeId, $subjectId]);
            if ($affacted) {
                flash('Time for Exam Submited for Approval');
                return redirect('subjectQuestions');
            }else {
                flash('Error Submiting time for Exams please contact the IT department');
                return redirect('subjectQuestions');
            }
        }else {
            flash('Exam status was not changed please try again later');
            return redirect('subjectQuestion');
        }
        
    }

    public function approve($classeId, $subjectId)
    {   
  
        $subjectquestionstatus = Subjectquestionstatus::where('classe_id', $classeId)
                                ->where('subject_id', $subjectId)->first();
        if ($subjectquestionstatus) {
            $affacted = DB::update('update subjectquestionstatus set progress = 2 where classe_id = ? and subject_id = ?', [$classeId, $subjectId]);
           if($affacted) {
            flash('Time for Exam Approved');
            return redirect('subjectAnalysis');
           }else {
            flash('Error Approving time for Exam please contact the IT department');
            return redirect('subjectAnalysis');
           }
        }else {
            flash('Exam status was not changed please try again later');
            return redirect('subjectAnalysis');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(SubjectquestionstatusRequest $request)
    {

        $Subjectquestionstatus = Subjectquestionstatus::where('classe_id', $request['classe_id'])
        ->where('subject_id', $request['subject_id'])->get()->count();
        if($Subjectquestionstatus == 1)
        {   flash('Time Already Assigned to Subject');
            return redirect('subjectQuestions');
        }

        Subjectquestionstatus::create($request->all() );
        flash('Time Assigned to Subject');
        return redirect('subjectQuestions');
    }

    /**
     * activate exams and makes them ready to be writen.
     *
     * @return Response
     */
    public function activate()
    {
        $subjectquestionstatus = Subjectquestionstatus::where('progress',2)
                               ->where('write', 0)->get();
        $count = 1;
        return view('status.subjectQuestion.activate', compact('subjectquestionstatus', 'count'));
    }


    /**
     * prepares exams to be written
     *@return Response
     */
    public function write($classId, $subjectId)
    {
        $subjectquestionstatus = Subjectquestionstatus::where('classe_id', $classId)
                                ->where('subject_id', $subjectId)->first();
        if ($subjectquestionstatus) {
        $affacted = DB::update('update subjectquestionstatus set write = 1 where classe_id = ? and subject_id = ?', [$classId, $subjectId]);
            if ($affacted) {
                flash('Exam ready to be written');
                return redirect()->back();
            }else {
                flash('Error making Exams ready to be Written Please contact the IT department');
                return redirect()->back();
            }
        }else {
            flash('Exam status was not changed please try again later');
            return redirect()->back();
        }
    }

    /**
     * Show the form for Deleting the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($classeId, $subjectId)
    {
        $subjectquestionstatus = Subjectquestionstatus::where('classe_id', $classeId)
                                ->where('subject_id', $subjectId)->first();
        return view('status.subjectQuestion.delete', compact('subjectquestionstatus', 'classeId', 'subjectId'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $classeId, $subjectId
     * @return Response
     */
    public function destroy(Request $request, $classeId)
    {
        $subjectquestionstatus = Subjectquestionstatus::where('classe_id', $classeId)
                                 ->where('subject_id', $request->get('subjectId'));

        if($request->get('agree')==1)
        {
            $subjectquestionstatus->delete();

            flash('Assigned Class Subject Deleted');
            return redirect('subjectQuestions');
        }
        flash('exam status not deleted');
        return redirect('subjectQuestions');
    }
}
