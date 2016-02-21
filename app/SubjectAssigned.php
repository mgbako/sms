<?php

namespace Scholr;

use Illuminate\Database\Eloquent\Model;

class SubjectAssigned extends Model
{
    protected $fillable = ['classe_id', 'subject_id', 'teacher_id'];
    protected $table = 'subjectAssigneds';


	public static function get_subjects($class_id, $teacher_id)
	{
		return Self::where(['classe_id'=>$class_id, 'teacher_id'=>$teacher_id])->get();

	}
}
