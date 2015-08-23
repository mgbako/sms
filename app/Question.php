<?php namespace Scholrs;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	protected $fillable = ['subject_id', 'teacher_id',
   'class', 'term', 'question', 'answer', 'option1',
   'option2', 'option3'];


	public function subject() {
	  return $this->belongsTo('Scholrs\Subject');
	}

	public function teacher() {
	  return $this->belongsTo('Scholrs\Teacher');
	}

	public function student()
	{
	  return $this->belongsTo('Scholrs\Student');
	}

	public function answer()
	{
	  return $this->hasOne('Scholrs\Answer');
	}

}