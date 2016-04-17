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

	public static function getRemarkBaseOnScore($score)
	{
		if ($score >= 0 && $score <= 39) {
			return 'F';
		}
		elseif ($score >= 40 && $score <= 49) {
			return 'E';
		}
		elseif ($score >= 50 && $score <= 59) {
			return 'D';
		}
		elseif ($score >= 60 && $score <= 69) {
			return 'C';
		}
		elseif ($score >= 70 && $score <= 79) {
			return 'B';
		}
		elseif ($score >= 80 && $score <= 100) {
			return 'A';
		}
		else {
			return 'No Remark';
		}
	}
}


