<?php
class View { public function __construct(
     protected string $view, protected array $params = [] ) {

     } 
     public static function make(string $view, array $params = []): static { 
         return new static($view, $params); 
        } }
        
         class Controller {
              public function __construct(){ 
                  $fname = $_SESSION['user']['firstname']; 
                  $lname = $_SESSION['user']['lastname']; 
                  $params = [ 'fname' => 'Zura', 'lname' => 'Zura' ];
                   return View::make('LogoutView',[$fname,$lname]); 
                } } 
                // keyword để truy xuất mảng params có kiểu là
//  keyword để truy xuất mảng params có kiểu là
?>