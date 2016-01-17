<?php namespace Scholr;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Student extends Model implements SluggableInterface
{

  use SluggableTrait;

  protected $sluggable = array(
        'build_from' => 'firstname',
        'save_to'    => 'slug',
    );

	protected $fillable = ['firstname', 'lastname', 'studentId', 'phone', 
  'email', 'dob', 'gender', 'address', 'state','nationality', 'class', 
  'end_date', 'image', 'slug'];

  protected $columns = ['firstname', 'lastname', 'studentId', 'phone', 
  'email', 'dob', 'gender', 'address', 'state','nationality', 'class', 
    'image', 'created_at', 'updated_at', 'end_date', 'slug'];

  public function scopeExclude($query, $value = [])
  {
    return $query->select(array_diff($this->columns, (array) $value) );
  }

    public function account() {
      return $this->hasOne('Scholr\User');
    }

    public function questions()
    {
      return $this->hasMany('Scholr\Question');
    }

    public function classes()
    {
      return $this->belongsToMany('Scholr\Classe')->withTimestamps();
    }

    public function subjects()
    {
      return $this->belongsToMany('Scholr\Subject')->withTimestamps();
    }

    public function getSubjectListAttribute()
    {
      return $this->subjects->lists('id');
    } 

    public function grades()
    {
      return $this->hasMany('Scholr\Grade');
    }

}
