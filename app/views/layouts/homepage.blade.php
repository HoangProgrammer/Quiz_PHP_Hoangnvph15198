<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{URL}}public/inc/TimeCircles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="{{URL}}public/css/style.css">
  <style>
    .All {

      position: relative;
      height: auto !important;
      min-height: calc(100% - 1px);
      margin: 0 auto;

    }

    .footer {

      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
      font-size: 0.9em;
      height: 70px;
      margin: 0 auto;
      padding: 20px 0 0;
      text-align: left;
      color: white;

    }
  </style>

 
</head>

<body>
  <div class=" All">
    <header class="p-3 mb-3 border-bottom bg-dark">
      <div class="container-fluid">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center mb-2 mb-lg-5 text-dark text-decoration-none">
            <a class="text" href="{{URL }}homepage">
             <img style="width:100px ;height:100px" src="<?=URL?>/public/img/gif/babyquiz.gif" alt="">
            </a>
          </a>

          <ul class="nav col-10 col-lg-10 me-lg-auto mb-2 justify-content-center mb-md-0">
            <span class="animation">
              <p style="--i:1">A</p>
              <p style="--i:2">S</p>
              <p style="--i:3">S</p>
              <p style="--i:4">I</p>
              <p style="--i:5">G</p>
              <p style="--i:6">N</p>
              <p style="--i:7">M</p>
              <p style="--i:8">E</p>
              <p style="--i:9">N</p>
              <p style="--i:10">-</p>
              <p style="--i:11">P</p>
              <p style="--i:12">H</p>
              <p style="--i:13">P</p>
              <p style="--i:14">-</p>
              <p style="--i:15">2</p>
            </span>
          </ul>


          <div class="dropdown text-end  justify-content-end">
            <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              @if( $_SESSION['user_role']==1)
              <li><a class="dropdown-item" href="{{URL}}mon-hoc">Quản Trị</a></li>
              @endif
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="{{ URL }}login">Đăng Xuất</a></li>
            </ul>
          </div>
        </div>
      </div>
    </header>




    <div class="container-fluid">
         @yield('content')
   
    </div>






  </div>

  <footer class=" footer ">
    <p class="text-center text-dark ">© 2022 Hoangnvph15198, Inc</p>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
  <script src="{{URL}}public/inc/TimeCircles.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@yield('page-script')
</body>

</html>