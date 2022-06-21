<?php
namespace App\Models;
use  Illuminate\Database\Eloquent\Model;

class Answer extends Model{
    protected $table = 'answers';
    protected $fillable=['img','content','is_correct','question_id'];

    public $timestamps=false;
}
?>