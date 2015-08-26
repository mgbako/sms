<?php namespace Scholr;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model {

	//

}


public function student()
{
  return $this->belongsTo('Scholr\Student');
}

public function subject()
{
  return $this->belongsTo('Scholr\Subject');
}