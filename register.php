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
    <title>Register || <?=$co_name;?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Poppins:wght@500&display=swap" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" href="img/icons/icon-72x72.png">
    <!-- Apple Touch Icon-->
    <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png">
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
    <div class="login-wrapper align-items-center justify-content-center text-center" style="background:white;background-image:url('img/pattern1.png'),url('img/pattern2.png');background-position:left top, right bottom;background-repeat: no-repeat, no-repeat;background-size:contain,contain;">
      <!-- Background Shape-->
	  <h1 style="text-align: left;padding: 35px;font-size: 36px;letter-spacing:1px;">Create Account</h1>	
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
			<!-- Register Form-->
            <div class="register-form mt-5 px-4">
              <form method="post" id="register-form" enctype="multipart/form-data">
                <div class="form-group text-start mb-4"><span>Full Name</span>
                  <label for="username"><i class="lni lni-user"></i></label>
                  <input class="form-control required" id="name" name="name" type="text" placeholder="Designing World">
                </div>
                
				<div class="form-group text-start mb-4"><span>Mobile No</span>
                  <label for="email"><i class="lni lni-envelope"></i></label>
                  <input class="form-control required" id="mobile" name="mobile" type="text" placeholder="9999999999">
                </div>
				
				<div class="form-group text-start mb-4"><span>Email</span>
                  <label for="email"><i class="lni lni-envelope"></i></label>
                  <input class="form-control required" id="email" name="email" type="email" placeholder="help@example.com">
                </div>
				
                <div class="form-group text-start mb-4"><span>Password</span>
                  <label for="password"><i class="lni lni-lock"></i></label>
                  <input class="input-psswd form-control required" id="password" name="password" type="password" placeholder="Password">
                </div>
				<div class="form-group text-start mb-4"><span>Confirm Password</span>
                  <label for="re-password"><i class="lni lni-lock"></i></label>
                  <input class="input-psswd form-control required" id="confirm_password" name="confirm_password" type="password" placeholder="Confirm Password">
                </div>
                <button class="btn btn-warning btn-lg w-100 submit-btn" id="submit-btn" onclick="member.register()" type="button" >Sign Up</button>
              </form>
            </div>
            <!-- Login Meta-->
            <div class="login-meta-data">
              <p class="mt-3 mb-0">Already have an account?<a class="ms-1" href="login.php">Sign In</a></p>
            </div>
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