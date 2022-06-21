<?php

namespace App\Controllers;

use App\models\User;

class LoginController extends BaseController
{
   public function index()
   {

      unset($_SESSION['user']);
      $this->view(
         'loginpage',
         [
            "pages" => "login"
         ]
      );
   }


   public function submitLogin()
   {

      if (empty($_POST['email']) || empty($_POST['password'])) {
         $_SESSION['error'] = "không được để trống";
         $this->header('login');
      } else {
         $user = User::where("email", "=", $_POST['email'])->where("password", "=", $_POST['password'])->get();

         if (isset($_POST['remember'])) {
            setcookie('email', $_POST['email'], time() + 86400 * 30);
            setcookie('password', $_POST['password'], time() + 86400 * 30);
         }

         if ($user == true) {
            foreach ($user as $val) {
               $role =  $val->role_id;
               $id_user = $val->id;
            };

            $_SESSION['user'] = $id_user;
            $_SESSION['user_role'] = $role;


            if ($role == 1) {
               // $_SESSION['teacher'] =   ["id" => $id_user,   "role" => $role];   
               // unset($_SESSION['student']);
               $this->header('mon-hoc');
            } else {

               // $_SESSION['student'] =[ "id" => $id_user, "role" => $role ];   
               // unset($_SESSION['teacher']);

               $this->header('homepage');
            }
         } else {
            $_SESSION['error_login'] = "email hoặc mật khẩu không chính xác";
            $this->header('login');
         }
      }
   }


   public function signup()
   {

      $this->view(
         'loginpage',
         [
            "pages" => "signup"
         ]
      );
   }


   public function submitSignup()
   {
      $model = new User();
      $err = false;
      $check = User::where('email', '=', $_POST["email"])->first();
      //   var_dump( $_POST);die;
      if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
         $_SESSION['error'] = "không được để trống";
         $err = true;
      } else if ($_POST['repass'] != $_POST['password']) {
         $_SESSION['errorPass'] = "mật khẩu không khớp";
         $err = true;
      } else if ($check == true) {
         $_SESSION['email'] = "email đã tồn tại";
         $err = true;
      }

      if ($err == true) {
         $this->header("dang-ky");
      } else {

         $model->fill($_POST);
         $model->save();

         $_SESSION['success'] = "bạn đã đăng ký thành công";
         $this->header("dang-ky");
      }
   }
}
