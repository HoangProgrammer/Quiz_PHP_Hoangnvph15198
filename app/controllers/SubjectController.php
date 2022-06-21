<?php

namespace App\Controllers;

use App\models\Subject;
use App\models\Question;
use App\models\Answer;
use App\models\Quiz;

class SubjectController extends BaseController
{

//    public  function Test(){
//        $name="hoang";
//        $age="1";
//        return view('subject.index',[
//            'name'=>$name,
//            'age'=>$age
//        ]);
//    }

    public function index()
    {
        // $subject = Subject::all();
        $subject = Subject::join('users', 'subjects.author_id', '=', 'users.id')
            ->select('subjects.*', 'users.name as user_name')
            ->get();

       return view(
            'admin.subject',
            [
                "subject" => $subject,
            ]
        );
    }



    public function create()
    {
        return view(
            'admin.createSubject',
        
        );
    }


    public function create_form()
    {
        if (empty($_POST['name']) || empty($_POST['description'])) {

            $_SESSION['error'] = "không được để trống các trường";
            $this->header('mon-hoc/tao-moi');
        } else {
            $model = new Subject();
            $model->fill($_POST);
            $model->save();
            $this->header('mon-hoc');
        }
    }



    public function delete($id)
    {

        Subject::destroy($id);
        $this->header('mon-hoc');
    }


    public function update($id)
    {
        $_GET['id']=$id;
        $subject = Subject::where('id', "=", $id)->first();
        return view(
            'admin.updateSubject',
            [
                "subject" => $subject,
            ]
        );
    }



    public function update_form($id)
    {
        if (empty($_POST['name']) || empty($_POST['description'])) {

            $_SESSION['error'] = "không được để trống các trường";
            $this->header('mon-hoc/cap-nhat/' . $id);
        } else {

             Subject::find($id)
            ->fill($_POST)
            ->save();

            $this->header('mon-hoc');
        }
    }


    public function detail($id_sub)
    {
        $subject = Subject::where('id', "=", $id_sub)->get();
        $Quiz = Quiz::where('subject_id', "=", $id_sub)->get();
        return view(
            'admin.detailSubject',
            [
                "subject" => $subject,
                "Quiz" => $Quiz,
            ]
        );
    }
}
