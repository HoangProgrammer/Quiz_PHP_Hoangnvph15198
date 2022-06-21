<div class="modal modal-signin position-static d-block  py-5" tabindex="-1" role="dialog" id="modalSignin">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Đăng Ký</h2>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body p-5 pt-0">
        <form class="" action="<?= URL ?>luu-dang-ky" method="post">
          <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control rounded-4" id="floatingInput">
            <label for="floatingInput">Họ Tên</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control rounded-4" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control rounded-4" id="Password" placeholder="Password">
            <label for="floatingPassword">Mật Khẩu</label>
            <span class="err"></span>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="repass" class="form-control rounded-4" id="repass" placeholder="Password">
            <label for="floatingPassword">Nhập lại Mật Khẩu</label>
            <span class="repass"></span>
          </div>
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit">Đăng Ký</button>

          <?php
          if (isset($_SESSION['error'])) {
            echo "<div class='alert alert-danger'>
            " . $_SESSION['error'] . "
            </div>";
            unset($_SESSION['error']);
          }

          if (isset($_SESSION['errorPass'])) {
            echo "<div class='alert alert-danger'>
            " . $_SESSION['errorPass'] . "
            </div>";
            unset($_SESSION['errorPass']);
          }
          if (isset($_SESSION['email'])) {
            echo "<div class='alert alert-danger'>
            " . $_SESSION['email'] . "
            </div>";
            unset($_SESSION['email']);
          }

          if (isset($_SESSION['success'])) {
            echo "<div class='alert alert-success'>
            " . $_SESSION['success'] . "
            </div>";
            unset($_SESSION['success']);
          }
          ?>

          <div class="form-floating mb-3">
            bạn đã có tài khoản ? <a href="<?= URL ?>login"> đăng nhập</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $('#Password').keyup(function() {

      if ($(this).val().length <=6) {
        $('.err').text('mật khẩu yếu').css('color', 'red')
      } else if ($(this).val().length <=9) {
        $('.err').text('mật khẩu  trung bình').css('color', '#dbba07')
      } else {
        $('.err').text('mật khẩu mạnh').css('color', 'green')
      }
    })
    $('#repass').keyup(function() {
      if ($(this).val() != $('#Password').val()) {
        $('.repass').text('Mật khẩu không khớp vui lòng kiểm tra lại').css('color','red')
      }else{
        $('.repass').text('');
      }
    })

  })
</script>