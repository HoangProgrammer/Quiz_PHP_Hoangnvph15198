<?php
namespace App\Models;
use  Illuminate\Database\Eloquent\Model;

class Quiz extends Model{
    protected $table = 'quizs';

    protected $fillable=['name','start_time','end_time','subject_id','minutes'];
    public $timestamps=false;


  function subject(){
      return $this->belongsTo(Subject::class,'subject_id','id');
  }
}
?>