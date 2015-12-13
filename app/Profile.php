<?php

namespace Scholr;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Profile extends Model implements SluggableInterface
{	
	use SluggableTrait;

  protected $sluggable = array(
        'build_from' => 'lastname',
        'save_to'    => 'slug',
    );

    protected $fillable = ['firstname', 'lastname', 'phone', 'dob', 
    'gender', 'address', 'state', 'nationality', 'bio', 'image', 'slug'

    ];

    public function user()
    {
    	return $this->belongsTo('Scholr\User');
    }
}
