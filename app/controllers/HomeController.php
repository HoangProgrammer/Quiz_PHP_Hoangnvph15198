<?php
namespace App\Controllers;
use App\models\Subject;
use App\models\Quiz;
class HomeController extends BaseController {

        public function index(){
            // $data=new Subject();
           $model=Subject::all();
            return view('user.home',
            [
                "data"=> $model

            ]
            );
        }



    
}

?>