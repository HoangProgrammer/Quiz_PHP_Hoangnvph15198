<?php
session_start();

require_once('./global.php');
require_once ('./vendor/autoload.php');
require_once ('./commons/helpers.php');

$url = isset($_GET['url']) ? $_GET['url'] : "/";

\App\Helpers\Router::run($url);


// use App\Controllers\HomeController;
// use App\Controllers\LoginController;
// use App\Controllers\SubjectController;
// use App\Controllers\DashboardController;
// use App\Controllers\QuizController;
// use App\Controllers\QuestionController;
// use App\Controllers\AnswerController;
// use App\Controllers\UserController;

// $ctr_dash = new DashboardController();
// $ctr_login = new LoginController();
// $ctr_sub = new SubjectController();
// $ctr_quiz = new QuizController();
// $ctr_question = new QuestionController();
// $ctr_answer = new AnswerController();
// $ctr_home = new HomeController();
// $ctr_user = new UserController();


// if (!isset($_SESSION['user'])) {
//     switch ($url) {
//         case 'login':
//             $ctr_login->index();
//             break;
//         case 'login_submit':
//             $ctr_login->submitLogin();
//             break;
//         case 'dang-ky':

//             $ctr_login->signup();
//             break;
//         case 'luu-dang-ky':

//             $ctr_login->submitSignup();
//             break;
//         default:

//             $ctr_login->index();
//             break;
//     }
// } else {

//     switch ($url) {
//         case 'dashboard':
//             $ctr_dash->index();
//             break;
//         case 'mon-hoc':
//             $ctr_sub->index();
//             break;
//         case 'mon-hoc/tao-moi':
//             $ctr_sub->create();
//             break;
//         case 'mon-hoc/luu-tao-moi':

//             $ctr_sub->create_form();
//             break;
//         case 'mon-hoc/xoa':

//             $ctr_sub->delete();
//             break;

//         case 'mon-hoc/cap-nhat':

//             $ctr_sub->update();
//             break;
//         case 'mon-hoc/luu-cap-nhat':

//             $ctr_sub->update_form();
//             break;

//         case 'mon-hoc/chi-tiet':
//             $ctr_sub->detail();
//             break;



//             //  QUIZ
//         case 'mon-hoc/quizs':
//             break;

//         case 'mon-hoc/chi-tiet-quizs':
//             $ctr_quiz->detail();
//             break;
//         case 'mon-hoc/quizs/tao-moi':
//             $ctr_quiz->create();
//             break;
//         case 'mon-hoc/quizs/luu-tao-moi':

//             $ctr_quiz->create_form();
//             break;
//         case 'mon-hoc/quizs/cap-nhat':
//             $ctr_quiz->update();
//             break;

//         case 'mon-hoc/quizs/luu-cap-nhat':

//             $ctr_quiz->update_form();
//             break;

//         case 'mon-hoc/quizs/xoa':

//             $ctr_quiz->delete();
//             break;



//             // Câu Hỏi
//         case 'mon-hoc/questions/tao-moi':
//             $ctr_question->create();
//             break;
//         case 'mon-hoc/questions/luu-tao-moi':
//             $ctr_question->create_form();
//             break;
//         case 'mon-hoc/questions/cap-nhat':
//             $ctr_question->update();
//             break;
//         case 'mon-hoc/questions/luu-cap-nhat':
//             $ctr_question->update_form();
//             break;
//         case 'mon-hoc/questions/xoa':
//             $ctr_question->delete();
//             break;


//             // đáp án
//         case 'mon-hoc/answers/luu-tao-moi':
//             $ctr_answer->create_form();
//             break;
//         case 'mon-hoc/answers/cap-nhat':
//             $ctr_answer->update();
//             break;
//         case 'mon-hoc/answers/luu-cap-nhat':
//             $ctr_answer->update_form();
//             break;

//         case 'hoc-vien':
//             $ctr_user->index();
//             break;
     
            
//         case 'homepage':
//             $ctr_home->index();
//             break;
//         case 'xem-chu-de':
//             $ctr_quiz->SeeQuiz();
//             break;
//         case 'chi-tiet-quiz':
//             $ctr_quiz->detailQuiz();
//             break; 
//         case 'lam-quiz':
//             $ctr_quiz->TakeTest();
//             break;
//         case 'lay-du-lieu':
//             $ctr_quiz->dataResult();
//             break;
//         case 'chon-dap-an':
//             $ctr_quiz->choseAnswer();
//             break;
//         case 'nop-bai':
//             $ctr_quiz->finishTest();
//             break;
//         case 'xem-ket-qua':
//             $ctr_quiz->examResults();
//             break;
//         case 'chi-tiet-ket-qua':
//             $ctr_quiz->detailResult();
//             break;
//         case 'thiet-lap':
//             $ctr_quiz->update();
//             break;
//         case 'luu-thiet-lap':
//             $ctr_quiz->updateSetting();
//             break;
//         case 'login':
//             $ctr_login->index();
//             break;
//         default:

//             $ctr_dash->index();
//             break;
//     }
// }
