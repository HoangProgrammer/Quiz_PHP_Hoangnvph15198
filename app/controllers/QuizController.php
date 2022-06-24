<?php

namespace App\Controllers;

use App\models\Quiz;
use App\models\Question;
use App\models\Answer;
use App\models\StudentQuiz;
use App\models\StudentQuizDetail;
use App\Models\Subject;
use App\Models\User;
use  Illuminate\Database\Eloquent\Model;

class QuizController extends BaseController
{


    public function create($id)
    {
        $_GET['id'] = $id;
        return view("admin.createQuiz");
    }


    public function create_form()
    {
        $model = new Quiz();

        if (empty($_POST['name']) || empty($_POST['start_time']) || empty($_POST['end_time']) || empty($_POST['minutes'])) {
            $_SESSION['error'] = "không được để trống các trường";
            $this->header('mon-hoc/quizs/tao-moi/' . $_POST["subject_id"]);
        } else {

            $model->fill($_POST)->save();

            $this->header('mon-hoc/chi-tiet/' . $_POST["subject_id"]);
        }
    }


    public function update($id_quiz, $id_sub)
    {
        // var_dump($id_user);die;

        $_GET['id_subject'] = $id_sub;
        $_GET['id_quiz'] = $id_quiz;
        $model = Quiz::where('id', "=", $id_quiz)->first();
        $_GET['id_sub'] = $id_sub;
        return view(
            'admin.updateQuiz',
            [
                "model" => $model,

            ]
        );
    }


    public function update_form($id, $id_sub)
    {

        if (empty($_POST['name'])) {
            $_SESSION['error'] = " không được để trống các trường ";
            $this->header('mon-hoc/quizs/cap-nhat/' . $id . '/sub/' . $id_sub);
        } else {
            if (empty($_POST['start_time']) || empty($_POST['end_time'])) {
                Quiz::find($id)->update([
                    'name' => $_POST['name'],
                    'start_time' => $_POST['startDefault'],
                    'end_time' => $_POST['startDefault'],
                    'minutes' => $_POST['minutes'],
                    'status' => $_POST['status'],
                ]);
            } else {
                Quiz::find($id)->update([
                    'name' => $_POST['name'],
                    'start_time' => $_POST['start_time'],
                    'end_time' => $_POST['end_time'],
                    'minutes' => $_POST['minutes'],
                    'status' => $_POST['status'],
                ]);
            }
            $this->header('mon-hoc/chi-tiet/' . $id_sub);
        }
    }

    public function delete($id, $id_sub)
    {
        // $question = Question::where('quiz_id', '=', $id)->first();
        // if (!empty($question)) {
        //     Answer::where("question_id", "=", $question->id)->delete();
        //     Question::where("quiz_id", "=", $id)->delete();
        // }
        Quiz::destroy($id);
        $this->header('mon-hoc/chi-tiet/' . $id_sub);
    }



    public function detail($id_quiz)
    {
        $answers = new Answer();
        $models = Question::where('quiz_id', '=', $id_quiz)->get();
        $data = $answers->all();

        $_GET['id_quiz'] = $id_quiz;
        return view(
            'admin.question',
            [
                'data' => $models,
                'answer' => $data,

            ]
        );
    }


    public function SeeQuiz($id_sub)
    {
        $_GET['id_sub'] = $id_sub;
        $model = Quiz::where('subject_id', '=', $id_sub)->get();
        $subject = Subject::where('id', '=', $id_sub)->first();
        return view(
            'user.quiz',
            [
                "pages" => "quiz",
                "quiz" => $model,
                "subject" => $subject

            ]
        );
    }

    public function detailQuiz($id_quiz, $id_sub)
    {
        $_GET['id'] = $id_quiz;
        $_GET['id_subject'] = $id_sub;
        $model = Quiz::where('id', '=', $_GET['id'])->first();
        $quizStudent = StudentQuiz::where('quiz_id', '=', $_GET['id'])
            ->where('student_id', '=', $_SESSION['user'])
            ->first();
        $user = User::where('id', '=', $_SESSION['user'])->first();
        $subject = Subject::where('id', '=', $_GET['id_subject'])->first();

        return view(
            'user.detailQuiz',
            [
                // "pages" => "detailQuiz",
                "quiz" => $model,
                "quizStudent" => $quizStudent,
                "subject" => $subject,
                "user" => $user


            ]
        );
    }



    public function TakeTest($id_quiz, $id_sub, $cau_hoi = 1)
    {
        $_GET['id'] = $id_quiz;
        $_GET['id_subject'] = $id_sub;
        $_GET['cau-hoi'] = $cau_hoi;

        $StudentQuiz = new StudentQuiz();
        if (isset($_POST['start_time'])) {

            $checkStudent = StudentQuiz::where('quiz_id', '=', $_GET['id'])
                ->where('student_id', '=', $_SESSION['user'])
                ->first();

            if ($checkStudent == false) {

                StudentQuiz::create([
                    'student_id' => $_SESSION['user'],
                    'quiz_id' => $_GET['id'],
                    'start_time' => $_POST['start_time']
                ]);
            }
        }

        $quiz = Quiz::where('id', '=', $_GET['id'])->first();


        $quizStudent = StudentQuiz::where('quiz_id', '=', $_GET['id'])
            ->where('student_id', '=', $_SESSION['user'])
            ->first();


        $list_question = Question::where('quiz_id', '=', $_GET['id'])->get();

        $pages = (isset($_GET['cau-hoi'])) ? $_GET['cau-hoi'] : 1;
        $skip = 1;
        $start = ($pages - 1) * $skip;
        $rowLength = count($list_question);
        $total = $rowLength / $skip;
        $question = Question::join('quizs', 'quizs.id', '=', 'questions.quiz_id')
            ->where('quizs.id', '=', $_GET['id'])
            ->select('questions.name as name', 'questions.img as img ', 'questions.id as id')
            ->offset($start)
            ->limit($skip)
            ->get();


        $answers = Answer::all();


        $choseAnswer = StudentQuizDetail::join('student_quiz', 'student_quiz_detail.student_quiz_id', '=', 'student_quiz.id')
            ->where('student_quiz.student_id', '=', $_SESSION['user'])
            ->get();

        return view(
            'user.TakeTest',
            [
                "pages" => "TakeTest",
                "Question" => $question,
                "answers" => $answers,
                "choseAnswer" => $choseAnswer,
                "total" => $total,
                "page" => $pages,
                "quiz" => $quiz,
                "quizStudent" => $quizStudent,
            ]
        );
    }



    public function choseAnswer()
    {
        $StudentQuizDetail = new StudentQuizDetail();
        $StudentQuiz = StudentQuiz::where('quiz_id', '=', $_POST['id_quiz'])
            ->where('student_id', '=', $_SESSION['user'])
            // ->orderBy('id')
            ->first();

        $check = StudentQuizDetail::join('student_quiz', 'student_quiz.id', '=', 'student_quiz_detail.student_quiz_id')
            ->where('student_quiz_detail.question_id', '=', $_POST['id_question'])
            ->where('student_quiz.student_id', '=', $_SESSION['user'])
            ->first();


        if ($check == true) {
            echo "true";

            $StudentQuizDetail::where('question_id', $_POST['id_question'])
                ->where('student_quiz_id', $StudentQuiz->id)
                ->update(['answer_id' => $_POST['id_answer']]);
        } else {
            echo "false";
            StudentQuizDetail::create(
                [
                    "student_quiz_id" => $StudentQuiz->id,
                    "answer_id" => $_POST['id_answer'],
                    "question_id" => $_POST['id_question']
                ]
            );
        }
    }


    public function finishTest($id_quiz, $id_sub)
    {

        $quiz_id = $id_quiz;
        $_GET['id_subject'] = $id_sub;
        $end_time = date('Y-m-d H:i:s');

        $answer = StudentQuizDetail::join('student_quiz', 'student_quiz.id', '=', 'student_quiz_detail.student_quiz_id')
            ->where('student_quiz.student_id', $_SESSION['user'])
            ->where('student_quiz.quiz_id', $quiz_id)->get();

        // rawQuery("SELECT *FROM student_quiz_detail as dt join  student_quiz as st 
        //  on st.id=dt.student_quiz_id WHERE st.student_id=" . $_SESSION['user'] . " AND st.quiz_id= $quiz_id ")->get();
        $score = 0;

        foreach ($answer as $value) {
            $select_answer = Answer::where('id', '=', $value->answer_id)->first();
            if ($select_answer->is_correct == 1) {
                $score += 1;
            }
        }
        $model = StudentQuiz::where('quiz_id', $quiz_id)
            ->where('student_id', $_SESSION['user'])->first();

        $model->update(
            [

                'score' => $score,
                'end_time' => $end_time
            ]
        );
        return view(
            'user.finishTest',
            [
                'quiz_id' => $quiz_id
            ]
        );
    }



    public function examResults($id_quiz, $id_sub)
    {

        $StudentQuiz = new StudentQuiz();

        $_GET['id_subject'] = $id_sub;
        $subject = Subject::where('id', '=', $_GET['id_subject'])->first();

        // $quiz_id = $id_quiz;

        $StudentQuiz = StudentQuiz::join('student_quiz_detail', 'student_quiz_detail.student_quiz_id', '=', 'student_quiz.id')
            ->join('quizs', 'quizs.id', '=', 'student_quiz.quiz_id')
            ->where('student_quiz.student_id', '=', $_SESSION['user'])
            ->where('student_quiz.quiz_id', '=', $id_quiz)
            ->select('student_quiz.score as score', 'student_quiz.start_time as time', 'student_quiz.quiz_id as quiz_id', StudentQuizDetail::raw('count(student_quiz_detail.id) as sum'))
            ->first();
        // var_dump($StudentQuiz);die;
        $user = User::where('id', '=', $_SESSION['user'])->first();

        return view(
            'user.examResults',
            [
                'result' => $StudentQuiz,
                'user' =>  $user,
                "subject" => $subject
            ]
        );
    }



    public function detailResult($id_quiz)
    {
        $_GET['id_quiz'] = $id_quiz;

        $user = User::where('id', '=', $_SESSION['user'])->first();

        return view(

            'user.detailResult',
            [
                // 'pages' => 'detailResult',
                'user' => $user,

            ]
        );
    }


    function dataResult()
    {
        // var_dump($id_quiz);
        // $_POST['id_quiz'] = $id_quiz;
        $question = Question::where('quiz_id', '=', $_POST['id_quiz'])->get();
        $answersDetail = StudentQuizDetail::join('student_quiz', 'student_quiz.id', '=', 'student_quiz_detail.student_quiz_id')
            ->where('student_quiz.student_id', '=', $_SESSION['user'])
            ->get();

        //     rawQuery("SELECT *FROM student_quiz as st
        //    join student_quiz_detail as dt on st.id=dt.student_quiz_id
        //     WHERE st.student_id=" . $_SESSION['user'] . "")->get();
        $msg = '';
        $i = 0;
        foreach ($question as $val) :
            foreach ($answersDetail as $v) :
                if ($v->question_id == $val->id) :
                    $i += 1;
                    $msg .= "<tr>

            <td>$i</td>
            <td>$val->id</td>
            <td>$val->name</td>
            <td>1</td>";
                    $msg .= "</tr>";
                endif;
            endforeach;
        endforeach;

        echo $msg;
    }



    function SettingQuiz($id_sub,$id_quiz,$id_user){
   $_GET['id_subject'] = $id_sub;
   $_GET['id_quiz'] = $id_quiz;
   $model = Quiz::where('id', "=", $id_quiz)->first();
   $_GET['id_sub'] = $id_sub;
//    var_dump($model);
   return view(
       'user.setting',
       [
           "model" => $model,

       ]
   );


    }



    public function updateSetting($id_quiz, $id_sub)
    {
       
        if (empty($_POST['start_time']) || empty($_POST['end_time'])) {
            Quiz::find($id_quiz)->update([             
                'start_time' => $_POST['startDefault'],
                'end_time' => $_POST['startDefault'],
                'minutes' => $_POST['minutes'],
                'status' => $_POST['status'],
            ]);
        } else {
            Quiz::find($id_quiz)->update([
                'start_time' => $_POST['start_time'],
                'end_time' => $_POST['end_time'],
                'minutes' => $_POST['minutes'],
                'status' => $_POST['status'],
            ]);
        }

        // Quiz::find($id_quiz)->fill($_POST)->save();
        
        $this->header('chu-de/chi-tiet-chu-de/chi-tiet-quiz/' . $id_quiz . '/sub/' . $id_sub);
    }
}
