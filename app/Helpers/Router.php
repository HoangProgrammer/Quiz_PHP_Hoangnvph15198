<?php





namespace App\Helpers;


use \Phroute\Phroute\RouteCollector;
use App\Controllers\SubjectController;
use App\Controllers\DashboardController;
use App\Controllers\QuizController;
use App\Controllers\QuestionController;
use App\Controllers\AnswerController;
use App\Controllers\UserController;
use App\Controllers\LoginController;
use App\Controllers\HomeController;
use App\Models\Quiz;
use App\Models\Subject;



// class Customer{

// } 
// class Invoice {
//    public function __construct(public Customer $customer) { 

//    }
//     public function process(float $amount): void{ 
//       if($amount >0){ 
//         throw new \Exception('Invalid invoice amount'); 
//       } 
//       if(empty($this->customer->getBillingInfo())){
//          throw new MissingBillingInfoException(); 
//         } 
//         echo "Processing {q.text}amp;apos;.$amount.' invoice '; sleep(1); echo 'OK'.PHP_EOL; 

//       //  $invoice = new Invoice(new Customer()); $invoice->process(25); có kết quả trả về là

//       }
//     }
class Router
{

  public static function run($url)
  {

    $router = new RouteCollector();

    // mon-hoc/tao-moi
    // mon-hoc/luu-tao-moi
    // mon-hoc/xoa
    // mon-hoc/cap-nhat
    // mon-hoc/luu-cap-nhat



    try {

      $router->filter('user', function () {
        if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
          header('location:' . URL . 'login');
        }
      });


      $router->get("/", [HomeController::class, 'index'], ["before" => "user"]);

      $router->get("dang-ky", [loginController::class, 'signup']);
      $router->post("luu-dang-ky", [loginController::class, 'submitSignup']);
      $router->get("login", [loginController::class, 'index']);
      $router->post("save-login", [loginController::class, 'submitLogin']);



      $router->group(["before" => "user"], function ($route) {
        $route->get("dashboard", [DashboardController::class, 'index']);
        $route->get("mon-hoc", [SubjectController::class, 'index']);
        $route->get("homepage", [HomeController::class, 'index']);
        $route->get("hoc-vien", [UserController::class, 'index']);
        $route->get("hoc-vien/detail/{id_student}", [UserController::class, 'Detail']);
      });


      // subject
      $router->group(['prefix' => "mon-hoc", "before" => "user"], function ($route) {

        $route->get("tao-moi", [SubjectController::class, 'create']);
        $route->post("luu-tao-moi", [SubjectController::class, 'create_form']);
        $route->get("cap-nhat/{id}", [SubjectController::class, 'update']);
        $route->post("luu-cap-nhat/{id}", [SubjectController::class, 'update_form']);
        $route->get("xoa/{id}", [SubjectController::class, 'delete']);
        $route->get("chi-tiet/{id_sub}", [SubjectController::class, 'detail']);
      });

      // quiz

      $router->group(['prefix' => "mon-hoc/quizs", "before" => "user"], function ($route) {
        $route->get("tao-moi/{id}", [QuizController::class, 'create']);
        $route->post("luu-tao-moi", [QuizController::class, 'create_form']);
        $route->get("cap-nhat/{id_quiz}/sub/{id_sub}", [QuizController::class, 'update']);
        $route->post("luu-cap-nhat/{id}/sub/{id_sub}", [QuizController::class, 'update_form']);
        $route->get("xoa/{id}/sub/{id_sub}", [QuizController::class, 'delete']);
        $route->get("chi-tiet-quizs/{id_quiz}", [QuizController::class, 'detail']);
      });

      // questions
      $router->group(['prefix' => "mon-hoc/questions", "before" => "user"], function ($route) {
        $route->get("tao-moi/{id_quiz}", [QuestionController::class, 'create']);
        $route->post("luu-tao-moi/{id_quiz}", [QuestionController::class, 'create_form']);
        $route->get("cap-nhat/{id_qs}/quiz/{id_quiz}", [QuestionController::class, 'update']);
        $route->post("luu-cap-nhat/{id_qs}/quiz/{id_quiz}", [QuestionController::class, 'update_form']);
        $route->get("xoa/{id_qs}/quiz/{id_quiz}", [QuestionController::class, 'delete']);
      });

      $router->get('test', function () {
        $subjects = Subject::with('Quizs')->get();
        // var_dump($subjects);
        foreach ($subjects as $sub) {
          var_dump($sub);

          foreach ($sub as $val) {
            // var_dump($val->quizs->name);
            // var_dump($val->Quiz->name);

          }
          echo "</br>";
          // var_dump($sub->name );
          var_dump($sub->name);

          echo "</br>";
        }
      });

      // home
      $router->group(['prefix' => "chu-de", "before" => "user"], function ($route) {
        $route->get("chi-tiet-chu-de/{id_sub}", [QuizController::class, 'SeeQuiz']);
        $route->get("chi-tiet-chu-de/chi-tiet-quiz/{id_quiz}/sub/{id_sub}", [QuizController::class, 'detailQuiz']);
        $route->post("chi-tiet-chu-de/chi-tiet-quiz/lam-quiz/{id_quiz}/sub/{id_sub}", [QuizController::class, 'TakeTest']);
        $route->get("chi-tiet-chu-de/chi-tiet-quiz/lam-quiz/{id_quiz}/sub/{id_sub}/cau-hoi/{cau_hoi}", [QuizController::class, 'TakeTest']);
        $route->post("chon-dap-an", [QuizController::class, 'choseAnswer']);
        $route->post("nop-bai/{id_quiz}/sub/{id_sub}", [QuizController::class, 'finishTest']);
        $route->get("xem-ket-qua/{id_quiz}/sub/{id_sub}", [QuizController::class, 'examResults']);
        $route->get("chi-tiet-ket-qua/{id_quiz}", [QuizController::class, 'detailResult']);
        $route->post("lay-du-lieu", [QuizController::class, 'dataResult']);
        $route->get("thiet-lap/{id_quiz}/sub/{id_sub}/author/{id_user}", [QuizController::class, 'SettingQuiz']);
        $route->post("luu-thiet-lap/{id_quiz}/subject/{id_sub}", [QuizController::class, 'updateSetting']);
      });

      $router->get('test-layout', function () {
        return view('layouts.main');
      });




      $dispatcher = new \Phroute\Phroute\Dispatcher($router->getData());
      $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
    } catch (\Exception $e) {

      echo    $e->getMessage();

      // header('location:errFile/404.php');
    }
  }
}
