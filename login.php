<?php
	include("db.php");
	include("function.php");
	include("common-details.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="<?=$co_name;?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Login || <?=$co_name;?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Poppins:wght@500&display=swap" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" href="<?=$co_favicon;?>">
    <!-- Apple Touch Icon-->
    <link rel="apple-touch-icon" href="<?=$co_favicon;?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=$co_favicon;?>">
    <link rel="apple-touch-icon" sizes="167x167" href="<?=$co_favicon;?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=$co_favicon;?>">
    <!-- CSS Libraries-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/lineicons.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Stylesheet-->
    <link rel="stylesheet" href="style.css">
    <!-- Web App Manifest-->
    <link rel="manifest" href="manifest.json">
	<link rel="stylesheet" href="plugin/toast/toast.style.min.css">
	<style>
		.submit-btn	
			{
				background-color:#ED0A0A !important;
				border-color:#ED0A0A !important;
				color:white !important;
			}
	</style>
  </head>
  <body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
      <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only">Loading...</div>
      </div>
    </div>
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center" style="background:white;background-image:url('img/pattern1.png'),url('img/pattern2.png');background-position:left top, right bottom;background-repeat: no-repeat, no-repeat;background-size:contain,contain;">
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5"><img class="big-logo" src="<?=$co_favicon_big;?>" style="max-height:120px;" alt="">
            <!-- Register Form-->
            <div class="register-form mt-5 px-4">
              <form action="#" id="login-form" method="post">
                <div class="form-group text-start mb-4"><span>Mobile No</span>
                  <label for="username"><i class="lni lni-user"></i></label>
                  <input class="form-control" id="mobile" name="mobile" type="text" placeholder="9999999999">
                </div>
                <div class="form-group text-start mb-4"><span>Password</span>
                  <label for="password"><i class="lni lni-lock"></i></label>
                  <input class="form-control" id="password" name="password" type="password" placeholder="Password">
                </div>
                <button class="btn btn-warning btn-lg w-100 submit-btn" id="submit-btn" onclick="member.login()" type="button">Log In</button>
              </form>
            </div>
            <!-- Login Meta-->
            <div class="login-meta-data"><a class="forgot-password d-block mt-3 mb-1" href="forget-password.php">Forgot Password?</a>
              <p class="mb-0">Didn't have an account?<a class="ms-1" href="register.php">Register Now</a></p>
            </div>
            <!-- View As Guest-->
          </div>
        </div>
      </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.passwordstrength.js"></script>
    <script src="js/dark-mode-switch.js"></script>
    <script src="js/active.js"></script>
    <script src="js/pwa.js"></script>
	<script src="js/custome.js"></script>
    <script src="plugin/toast/toast.script.js"></script>
  </body>
</html>