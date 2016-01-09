<?php namespace Scholr;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model {

	protected $fillable = ['name'];

	public function questions()
	{

	  return $this->hasMany('Scholr\Question');
	}

	public function teachers()
	{
		return $this->belongsToMany('Scholr\Teacher');
	}

	public function students()
	{
		return $this->belongsToMany('Scholr\Student');
	}

	public function classes()
	{
		return $this->belongsToMany('Scholr\Classe');
	}

	public function photos() {

	  return $this->morphMany('Scholr\Photo', 'imageable');
	}

	public function name($id)
    {
        return Subject::whereId($id)->first()->name;
    }

}