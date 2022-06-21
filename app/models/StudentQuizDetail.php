<?php
namespace App\Models;
use  Illuminate\Database\Eloquent\Model;

class StudentQuizDetail extends Model{
    protected $table = 'student_quiz_detail';
    protected $fillable=['student_quiz_id','answer_id','question_id'];

    public $timestamps=false;
}
?>