<?php

namespace Scholr;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['answer'];

    public function question()
    {
      return $this->belongsTo('Scholr\Question');
    }
}
