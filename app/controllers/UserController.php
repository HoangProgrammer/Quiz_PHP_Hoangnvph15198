<?php

namespace App\Controllers;

use App\models\User;
use App\models\Question;
use App\models\StudentQuiz;
use App\models\Quiz;
use App\Models\StudentQuizDetail;
use App\models\Subject;

class UserController extends BaseController
{

    function index()
    {
        $data = User::all();
        return view(
            'admin.customers',
            [
                // 'pages' => "customers",
                // 'namePage' => "Danh Sách Học Viên",
                'data' => $data
            ]
        );
    }

  function Detail($id_student){
    

    $StudentQuiz=new StudentQuiz(); 
  $data=  StudentQuiz::join('users','users.id','=','student_quiz.student_id')
                ->join('quizs','quizs.id','=','student_quiz.quiz_id')
                ->join('subjects','subjects.id','=','quizs.subject_id')
                ->select('subjects.name as nameSubject','users.name as username ','quizs.name as nameQuizs','student_quiz.score as score','student_quiz.*')
                ->where('student_quiz.student_id',$id_student)
                ->get();
 
                return view(
                    'admin.detailScore',
                    [
                        'customers' =>$data
                    ]
                );
  }


}
