
<?php
$email=(isset($_COOKIE['email'])) ? $_COOKIE['email'] :"";
$password=(isset($_COOKIE['password'])) ? $_COOKIE['password'] :"";
$checked='';
if(!empty($email) && !empty($password)){
 $checked='checked';
}
?>


<div class="modal modal-signin position-static d-block  py-5" tabindex="-1" role="dialog" id="modalSignin">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Đăng nhập</h2>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body p-5 pt-0">
        <form  method="post" action="<?=URL?>save-login">
          <div class="form-floating mb-3">
            <input type="email" name="email" value="<?=$email?>" class="form-control rounded-4" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="password" value="<?=$password?>" class="form-control rounded-4" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Mật Khẩu</label>
          </div>
          <div class="form-floating mb-3">
            <input type="checkbox" name="remember" <?= $checked?>  />
            <span for="floatingPassword">nhớ</span>
          </div>
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary"  type="submit">Đăng nhập</button>
          <div class="form-floating mb-3">
           bạn chưa có tài khoản ? <a href="<?=URL?>dang-ky"> đăng ký</a>
          </div>
          <?=$msg=(isset($_SESSION['error']))?"<div class='alert alert-danger'>".$_SESSION['error']."</div>":"";  
         unset($_SESSION['error']);
         ?>
          <?=$msg=(isset($_SESSION['error_login']))?"<div class='alert alert-danger'>".$_SESSION['error_login']."</div>":"";  
                 unset($_SESSION['error_login']);
        ?>
        

        </form>
      </div>
    </div>
  </div>
</div>



