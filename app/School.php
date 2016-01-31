<?php

namespace Scholr;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
   protected $fillable = ['name','logo','term','session', 
   'id_format', 'institution', 'number'];
}
