<?php
namespace App\Models;
use  Illuminate\Database\Eloquent\Model;

class Question extends Model{
    protected $table = 'questions';


    protected $fillable=['name','img','quiz_id'];


    public $timestamps=false;


}
?>