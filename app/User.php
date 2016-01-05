<?php

namespace Scholr;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Scholr\Score;


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

    public function profile()
    {
        return $this->hasOne('Scholr\Profile');
    }

    public function Taken($student_id, $classe_id, $subject_id)
    {
        return  Score::where('student_id', $student_id)
                    ->where('classe_id', $classe_id)
                    ->where('subject_id', $subject_id)
                    ->get()->count();
    }

    public function hasQuestion($classe_id, $subject_id)
    {
        return  Question::where(['classe_id' =>  $classe_id, 'subject_id' => $subject_id])->get()->count();
    }

    public function subjectName($id)
    {
        return Subject::whereId($id)->first()->name;
    }

}
