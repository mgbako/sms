<?php namespace Scholr;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model {

	protected $fillable = ['student_id', 'classe_id', 'subject_id', 'total', 'term', 'session', 'remark', 'slug'];

	public function student()
	{
	  return $this->belongsTo('Scholr\Student');
	}

	public function subject()
	{
	  return $this->belongsTo('Scholr\Subject');
	}

	public function classes()
	{
		return $this->belongsToMnay('Scholr\Classe');
	}
}


