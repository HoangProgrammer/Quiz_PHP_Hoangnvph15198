<?php
namespace App\Controllers;

class DashboardController extends BaseController{

      public function index(){

 
      $this->view('dashboardpage',

      [
          "pages"=>"dashboard",
          "namePage"=>"Dashboard"
      ]
      
    );

      }
}

?>