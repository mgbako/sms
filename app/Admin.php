<?php

namespace Scholr;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Admin extends Model implements SluggableInterface
{
    
    use SluggableTrait;

    protected $sluggable = [
      'build_from' => 'firstname',
      'save_to' => 'slug'
    ];

    protected $fillable = ['firstname', 'lastname', 'staffId', 
    'email', 'phone', 'dob', 'gender', 'address', 'state',
    'nationality', 'type', 'image', 'slug'];

    public function account()
    {
      return $ths->hasOne('Schoolr\User');
    }
}
