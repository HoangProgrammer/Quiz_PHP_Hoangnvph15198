<?php
namespace App\Models;

use  Illuminate\Database\Eloquent\Model;
class Subject extends Model{
    protected $table = 'subjects';

    protected $fillable = ['name','description','author_id'];

    public $timestamps=false;

    public function Quizs(){
        
      return  $this->hasMany(Quiz::class,'subject_id','id');
    
        }

}
?>