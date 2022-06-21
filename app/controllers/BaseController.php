<?php

namespace App\Controllers;

class BaseController {
   const VIEW = './app/views/layout/';
   // const HEAD = 'http://localhost:81/PHP2/hoangnvph15198_asm/';



   public  function view($PathViews,$data=[]){

      require_once (self::VIEW.$PathViews.".php");
   }

   public function header($Path){
      
      header("location:".URL.$Path);

   }

}

?>