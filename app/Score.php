<?php

namespace Scholr;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'grades';

    protected $fillable = ['student_id', 'classe_id', 'subject_id', 'total', 'term', 'session', 'remark', 'slug'];
}
