<?php
namespace App\Models;
use  Illuminate\Database\Eloquent\Model;

class StudentQuiz extends Model{
    protected $table = 'student_quiz';

    protected $fillable=['student_id','quiz_id','score','start_time','end_time'];

    public $timestamps=false;
}
?>