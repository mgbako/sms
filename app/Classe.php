<?php namespace Scholr;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model {

	protected $fillable = ['name'];
	

	public function teachers()
	{
		return $this->belongsToMany('Scholr\Teacher');
	}

	public function students()
	{
		return $this->belongsToMany('Scholr\Student');
	}

	public function subjects()
	{
		return $this->belongsToMany('Scholr\Subject');
	}

	public function grades()
	{
		return $this->hasMnay('Scholr\Grade');
	}
}
