<?php namespace Scholr;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	protected $fillable = ['subject_id', 'teacher_id',
   'class_id', 'term', 'question', 'option1',
   'option2', 'option3', 'option4'];

	public function subject() {
	  return $this->belongsTo('Scholr\Subject');
	}

	public function teacher() {
	  return $this->belongsTo('Scholr\Teacher');
	}

	public function student()
	{
	  return $this->belongsTo('Scholr\Student');
	}

	public function answer()
	{
	  return $this->hasOne('Scholr\Answer');
	}

}