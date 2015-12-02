<?php

namespace Scholr;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['firstname', 'lastname', 'phone', 'dob', 
    'gender', 'address', 'state', 'nationality', 'class', 'image',

    ];

    public function user()
    {
    	return $this->belongsTo('Scholr\User');
    }
}
