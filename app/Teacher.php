<?php namespace Scholr;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Scholr\Question;

class Teacher extends Model implements SluggableInterface{

    use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'firstname',
        'save_to'    => 'slug',
    );

	protected $fillable = ['firstname', 'lastname', 'staffId', 'email', 
    'phone', 'dob', 'gender', 'address', 'state',
    'nationality', 'image', 'slug'];

  protected $columns = ['firstname', 'lastname', 'staffId', 'email', 'phone', 
    'dob', 'gender', 'address', 'state','nationality', 'type', 
    'image', 'slug', 'created_at', 'updated_at', 'end_date'];

  public function scopeExclude($query, $value = [])   
  {
    return $query->select( array_diff( $this->columns,(array) $value) );
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

    public function user()
    {
      return $this->hasMany('Scholr\User');
    }


    public static function totalAdded($teacher_id, $classe_id, $subject_id)
    {
      return Question::where(['teacher_id'=>$teacher_id, 'classe_id'=>$classe_id, 'subject_id'=>$subject_id])->get()->count();
    }


    public function assignedSubjects($teacher_id, $classe_id)
    {
      $classes = SubjectAssigned::where(['teacher_id'=>$teacher_id, 'classe_id'=>$classe_id])->get(['classe_id']);

      return $classes;
    }

    public function assignedClass($teacher_id, $classe_id)
    {
      $subjects = SubjectAssigned::where(['teacher_id'=>$teacher_id, 'classe_id'=>$classe_id])->get(['suubject_id']);

      return $subjects;
    }
}
