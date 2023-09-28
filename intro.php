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
	<style>
		.bubble-tab i
			{
				color:whitesmoke;
			}
		.bubble-tab .active
			{
				color:#ED0A0A;
			}
		.wrap 
			{		
				height: 100%;
				display: flex;
				align-items: center;
				justify-content: center;
				margin-top:40px;
			}

		.wrap button 
			{
				min-width: 60px;
				min-height: 60px;
				font-family: 'Nunito', sans-serif;
				font-size: 22px;
				text-transform: uppercase;
				letter-spacing: 1.3px;
				font-weight: 700;
				color: white;
				background: #4FD1C5;
				background: linear-gradient(90deg, rgba(237,10,10,0.4) 0%, rgba(237,10,10,1) 100%);
				border: none;
				border-radius: 1000px;
				box-shadow: 12px 12px 24px rgba(237,10,10,.64);
				transition: all 0.3s ease-in-out 0s;
				cursor: pointer;
				outline: none;
				position: relative;
				padding: 10px;
		  }

		

		.wrap .button:hover, .wrap .button:focus 
			{
				color: white;
				transform: translateY(-6px);	
			}

		.wrap button:hover::before, .wrap button:focus::before 
			{
				opacity: 1;
			}

		.wrap button::after 
			{
				content: '';
				width: 30px; height: 30px;
				border-radius: 100%;
				border: 6px solid #ED0A0A;
				position: absolute;
				z-index: -1;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				animation: ring 1.5s infinite;
			}

		.wrap button:hover::after, .wrap button:focus::after 
			{
				animation: none;
				display: none;
			}

		@keyframes ring 
			{
				0% 
					{
						width: 30px;
						height: 30px;
						opacity: 1;
					}
				100% 
					{
						width: 120px;
						height: 120px;
						opacity: 0;
					}
			}
		#slide2, #slide3
			{
				display:none;
				
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
	  <div class="container">
		  <div id="slide1">
				<a href='login.php' style="position:absolute;right:20px;top:10px;letter-spacing:1px;color:black;font-weight:500">Skip</a></p>
				<img class="big-logo" id="logo" src="img/ab1.png" alt="" style="padding:15px;max-height:270px;">
				<p style="font-size:20px;letter-spacing:1px;font-weight:500;">Number Betting</p>
				<p style="letter-spacing:1px;">Numbers Betting is the world's most comprehensive lotteries betting solution on the market, offering punters 24/7 fixed odds betting on numerous markets and outcome selections, with upwards of 44,000 real state lottery draws per month from over 70 countries worldwide.</p>
				<p class="bubble-tab"><i class="fa fa-circle active" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-circle" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-circle" aria-hidden="true"></i></p>
				<div class="wrap">
					<button class="button" onclick="nextSlide('slide1','slide2')"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
				</div>
		  </div>
		  <div id="slide2">
				<a href='login.php' style="position:absolute;right:20px;top:10px;letter-spacing:1px;color:black;font-weight:500">Skip</a></p>
				<img class="big-logo" id="logo" src="img/ab3.png" alt="" style="padding:15px;max-height:270px;">
				<p style="font-size:20px;letter-spacing:1px;font-weight:500;">Number Betting</p>
				<p style="letter-spacing:1px;">Numbers Betting is the world's most comprehensive lotteries betting solution on the market, offering punters 24/7 fixed odds betting on numerous markets and outcome selections, with upwards of 44,000 real state lottery draws per month from over 70 countries worldwide.</p>
				<p class="bubble-tab"><i class="fa fa-circle" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-circle active" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-circle" aria-hidden="true"></i></p>
				<div class="wrap">
					<button class="button" onclick="nextSlide('slide2','slide3')"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
				</div>
		  </div>
		  <div id="slide3">
				<a href='login.php' style="position:absolute;right:20px;top:10px;letter-spacing:1px;color:black;font-weight:500">Skip</a></p>
				<img class="big-logo" id="logo" src="img/ab4.png" alt="" style="padding:15px;max-height:270px;">
				<p style="font-size:20px;letter-spacing:1px;font-weight:500;">Number Betting</p>
				<p style="letter-spacing:1px;">Numbers Betting is the world's most comprehensive lotteries betting solution on the market, offering punters 24/7 fixed odds betting on numerous markets and outcome selections, with upwards of 44,000 real state lottery draws per month from over 70 countries worldwide.</p>
				<p class="bubble-tab"><i class="fa fa-circle" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-circle" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-circle active" aria-hidden="true"></i></p>
				<div class="wrap">
					<a href='login.php'><button class="button" style="padding:10px 25px;"><span style='font-size:18px;'>Get Started</span> &nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></button></a>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script>
		function nextSlide(current_slide,next_slide)
			{
				$('#'+current_slide).css('display','none');
				$('#'+next_slide).fadeIn(1000);
				$('#'+next_slide).css('display','inherit');
			}
	</script>
  </body>
</html>