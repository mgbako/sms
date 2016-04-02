<?php

namespace Scholr;

use Illuminate\Database\Eloquent\Model;

class Subjectquestionstatus extends Model
{
	protected $fillable = ['classe_id', 'subject_id', 'time', 'write', 'progress'];
    protected $table = 'subjectquestionstatus';

    public $timestamps = false;

    public static function canwrite($classId, $subjectId, $write)
    {
    	$subjectquestionstatus = SubjectQuestionstatus::where('classe_id', $classId)
                                ->where('subject_id', $subjectId)
                                ->where('write', $write);

        return $subjectquestionstatus;
    }
}
