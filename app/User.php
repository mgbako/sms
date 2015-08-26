<?php

namespace Scholr;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, SluggableInterface
{
    use Authenticatable, CanResetPassword;
    
    use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'email',
        'save_to'    => 'slug',
    );

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =  ['email', 'password', 'loginId', 'username', 
                'type','slug'
        ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function student() {
        return $this->belongsTo('Scholr\Student');
    }

    public function teacher() {
        return $this->belongsTo('Scholr\Teacher');
    }

    public function admin() {
        return $this->belongsTo('Scholr\Admin');
    }

    public function photos() {
        return $this->morphMany('Scholr\Photo', 'imageable');
    }
}
