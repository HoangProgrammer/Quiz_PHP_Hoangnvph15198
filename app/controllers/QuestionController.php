<?php

namespace App\Controllers;

use App\models\Question;
use App\models\Answer;

class QuestionController extends BaseController
{


    public function create($id_quiz)
    {
        $model = Question::where('quiz_id', '=', $id_quiz)->orderBy('id', 'asc')->get();
        $_GET['id_quiz'] = $id_quiz;
        return view(
            "admin.createQuestion",

            [
                "data" => $model,
            
            ]
        );
    }


    public function create_form($id_quiz)
    {
        // $questionSingle = Question::orderBy('id', 'desc')->limit(1)->first();


        $Question = new Question();
        $Answer= new Answer();
        if (isset($_POST['btn_question'])) {
            // var_dump($_POST['answers']);die();
            if (empty($_POST['name'])) {
                $_SESSION['error'] = "không được để trống các trường";
                $this->header('mon-hoc/questions/tao-moi/' . $id_quiz);
            } else {
               $files = $_FILES["img_question"]['name'];
                $files_tmp = $_FILES["img_question"]['tmp_name'];
                move_uploaded_file($files_tmp, './public/img/' . $files);
            $data=[
                "name"=>$_POST['name'],
                "img"=>$files,
                "quiz_id"=>$id_quiz
            ];
                $Question->create( $data);
                $select=  $Question::orderBy('id','desc')->first();
                $id_question=$select->id;

                foreach ($_POST['answers'] as $key_ans => $val) {   
                    foreach ($_POST['is_correct'] as $key_correct => $value) {
                        if($key_ans==$key_correct){
                              $Answer->create(
                     [
                         "content"=>$val,
                         "is_correct"=> $value,
                         "question_id"=>$id_question
                     ]
                     );
                        }
      
                    }
                    
                }            

                $_SESSION['successFully'] = "Thêm thành công ";
                $this->header('mon-hoc/questions/tao-moi/' . $id_quiz);
            }

            // $model->insert($data);
       
        }
    }


    public function update($id_qs,$id_quiz)
    {
        $model = Question::where('id', "=", $id_qs)->first();
        $Answer=Answer::where('question_id','=',$id_qs)->get();
        $_GET['id_quiz']=$id_quiz;
        $_GET['id_qs']=$id_qs;
        return view(
            'admin.updateQuestion',
            [
                "model" => $model,
                "Answer" => $Answer,
              
            ]
        );
    }

    public function update_form($id_qs,$id_quiz)
    {
   
            $model = Question::where('id', '=', $id_qs)->first();
            
                $file = $_FILES['img_question']['name'];
                $file_tmp = $_FILES['img_question']['tmp_name'];
                move_uploaded_file($file_tmp, './public/img/' . $file);
 
                $data = [
                    "name" => $_POST['name'],
                    "img" => $file,
                ];

                $model->update($data);             
                // $Answer = Answer::where(['question_id', '=',$id_qs])->first();             
                foreach ($_POST['answer'] as $key => $id_an) {   
                foreach ($_POST['content'] as $key_content => $val) {   
                    foreach ($_POST['is_correct'] as $key_correct => $value) {
                      
                        if($key==$key_content && $key==$key_correct){
                            // echo "</br>";

                            // var_dump('answer: ', $key);
                            // echo "</br>";
                            // var_dump('content :', $key_content);
                            // echo "</br>";
    
                            // var_dump('caau hoi:', $key_correct);
                            Answer::where('id',$id_an)->update(
                                [
                                    "content"=>$val,
                                    "is_correct"=>$value,
                                ]
                            );

                          

                        }
                    }
      
                    }
                    
                }    
            


 $this->header('mon-hoc/quizs/chi-tiet-quizs/' . $id_quiz);
            

           
        
    }



    public function delete($id_qs,$id_quiz)
    {
        // $Answer = new Answer();
        // $Answer->where('question_id',$id_qs)->delete();
        Question::destroy($id_qs);
        $this->header('mon-hoc/quizs/chi-tiet-quizs/' . $id_quiz);
    }



    public function detail()
    {

        $this->header('mon-hoc/chi-tiet?id=' . $_GET["id_subject"]);
    }
}
