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
    <title><?=$co_name;?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
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
	<style>
		@keyframes slideInFromLeft 
			{
				from {width:70%}
				to {width: 100%;}
			}
		#logo
			{	
				animation: slideInFromLeft 2s;	
			}
		.powered
			{
				position:fixed;
				bottom:20px;
				width:100%;
				text-align:center;
				left:0px;
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
    <div class="intro-wrapper d-flex align-items-center justify-content-center text-center" style="background:white;background-image:url('img/pattern1.png'),url('img/pattern2.png');background-position:left top, right bottom;background-repeat: no-repeat, no-repeat;background-size:contain,contain;">
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container"><img class="big-logo" id="logo" src="<?=$co_logo;?>" alt="" style="padding:15px;"></div>
	  <p class="powered">Powered By <span style='color:#ED0A0A;font-weight:bold;'>Lucky</span> <span style='color:#005DA7;font-weight:bold;'>Bet</span></p>
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
	<?php
		if(isset($_COOKIE['user_id']))
			{
				echo "<script>$(document).ready(function(){setTimeout(function(){window.location.href='home.php'},2500);});</script>";
			}
		else
			{
				echo "<script>$(document).ready(function(){setTimeout(function(){window.location.href='intro.php'},2500);});</script>";		
			}			
	?>
	
  </body>
</html>