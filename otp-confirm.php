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
    <title>OTP Confirm || <?=$co_name;?></title>
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
		.single-otp-input
			{
				background:transparent !important;
				border:1px solid #ebebeb !important;
			}
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
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
            <div class="text-start px-4">
              <h5 class="mb-1">Verify Phone Number</h5>
              <p class="mb-4">Enter the OTP code sent to<strong class="ms-1">+91-<?=$_SESSION['mobile'];?></strong></p>
              <p class="mb-4">Your OTP : <?=  $_SESSION['otp'] ?></p>
            </div>
            <!-- OTP Verify Form-->
            <div class="otp-verify-form mt-5 px-4">
              <form id="code-form" method="post">
                <div class="d-flex justify-content-between mb-5">
                  <input class="single-otp-input form-control" name="digit1" type="text" inputmode="numeric" value="" placeholder="-" maxlength="1">
                  <input class="single-otp-input form-control" name="digit2" type="text" inputmode="numeric" value="" placeholder="-" maxlength="1">
                  <input class="single-otp-input form-control" name="digit3" type="text" inputmode="numeric" value="" placeholder="-" maxlength="1">
                  <input class="single-otp-input form-control" name="digit4" type="text" inputmode="numeric" value="" placeholder="-" maxlength="1">
                </div>
                <button class="btn btn-warning btn-lg w-100 submit-btn" id="submit-btn" onclick="member.verify_otp()" type="button">Verify &amp; Proceed</button>
              </form>
            </div>
            <!-- Term & Privacy Info-->
            <div class="login-meta-data px-4">
              <p class="mt-3 mb-0">Don't received the OTP?<span class="otp-sec ms-1" id="resendOTP"></span></p>
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
    <script src="js/otp-timer.js"></script>
    <script src="js/active.js"></script>
    <script src="js/pwa.js"></script>
	<script src="js/custome.js"></script>
    <script src="plugin/toast/toast.script.js"></script>

    <script>
      $("#resendOTP").on("click",function(){
        console.log('resend click');
      });
    </script>
  </body>
</html>