<?php

namespace App\Controllers;
use App\models\Answer;

class AnswerController extends BaseController
{


    public function create_form()
    {
        $model = new Answer();

        if (isset($_POST['btn_Answer'])) {
            if (empty($_POST['content'])) {
                $_SESSION['error'] = "không được để trống các trường";
                $this->header('mon-hoc/Answer/tao-moi?id=' . $_GET["id_subject"]);
                
            } else {
            $files=$_FILES["img_answer"]['name'];
            $files_tmp=$_FILES["img_answer"]['tmp_name'];
      

            move_uploaded_file($files_tmp,'./public/img/'.$files);
                $data = [
                    "content" => $_POST["content"],
                    "img" =>  $files,
                    "is_correct" => $_POST["is_correct"],
                    "question_id" => $_POST['id_question'],
                ];
            }

            $model->insert($data);
            $_SESSION['success'] = "Thêm Thành Công";
            $this->header('mon-hoc/questions/tao-moi?id_quiz=' . $_GET["id_quiz"]); 
        }

       
    }


    public function update()
    {
        $model = Answer::where(['id', "=", $_GET["id"]])->first();
        $this->view(
            'dashboardpage',
            [
                "model" => $model,
                "pages" => "updateAnswer",
                "namePage" => "Cập Nhật Đáp Án"
            ]
        );
    }

    public function update_form()
    {
      
        if(isset($_GET['id_anh'])){
            $model = Answer::where(['id', '=', $_GET['id_anh']])->first();
            $data = [
                "img" => '',
            ];
   
            $model->update($data);
            $_SESSION['success'] = "cập nhật thành công";
            $this->header('mon-hoc/questions/cap-nhat?id='.$_GET["id_anh"].'&id_quiz='.$_GET['id_quiz']);      
        }else{
            $model = Answer::where(['id', '=', $_GET['id']])->first();
            if (empty($_FILES['img_answer']['name'])) {
                $data = [
                    "content" => $_POST['content'],
                    "is_correct" => $_POST['is_correct'],
                ];

                $model->update($data);
                
            } else {    
                $file = $_FILES['img_answer']['name'];
                $file_tmp = $_FILES['img_answer']['tmp_name'];
                move_uploaded_file($file_tmp, './public/img/' . $file);
                $data = [
                    "content" => $_POST['is_correct'],
                    "is_correct" => $_POST['is_correct'],
                    "img" => $file,
                ];
                $model->update($data);
            }

            $this->header('mon-hoc/chi-tiet-quizs?id_quiz=' . $_GET["id_quiz"]);
}
    }


    public function delete()
    {
        Answer::destroy($_GET['id']);
        $this->header('mon-hoc/chi-tiet?id=' . $_GET["id_subject"]);
    }



    public function detail()
    {

        $this->header('mon-hoc/chi-tiet?id=' . $_GET["id_subject"]);
    }
}
