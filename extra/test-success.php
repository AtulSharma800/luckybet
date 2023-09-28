<?php
	include("db.php");
	include("function.php");
	include("common-details.php");
	include("check-login.php");
	$member_id=$_COOKIE['id'];
	$test_id=$_GET['test_id'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Success || <?=$co_name;?></title>
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
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Comfortaa:wght@700&family=Poppins:wght@500&display=swap" rel="stylesheet">
	<style>
		.consult-now
			{
				border: 1px solid #A7CC79;
				border-radius: 10px;
				color: #fff !important;
				font-size: 13px !important;
				padding: 10px 5px !important;
				text-decoration: none;
				background: transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box;
				box-shadow: 0 3px 6px #00000029;
				width:42%;
				display:inline-block;
				text-align:center;
				margin-left:1%;
			}
		.know-more
			{
				border: 1px solid #EBF9DA;
				border-radius: 10px;
				color: #ED0A0A !important;
				font-size: 13px !important;
				padding: 10px 5px !important;
				text-decoration: none;
				background: transparent linear-gradient(180deg,#F2FBE7 0,#EBF9DA 100%) 0 0 no-repeat padding-box;
				box-shadow: 0 3px 6px #00000029;
				width:54%;
				display:inline-block;
				margin-right:1%;
				text-align:center;
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
    <!-- Header Area-->
    <?php
		$joining_date=date("Y-m-d");
		$member_id=$_COOKIE['id'];
		$test_id=$_GET['test_id'];
		$query=mysqli_query($con,"select * from users where id='$member_id'");
		$res=mysqli_fetch_array($query);
		$name=$res['name'];
		$test_id=$_GET['test_id'];
		$test_no=sprintf("%05d", $test_id);
		
		$query=mysqli_query($con,"select * from commonly_booked_test where id='$test_id'");
		$res=mysqli_fetch_array($query);
		$test_name=$res['name'];
	?>
    <div class="page-content-wrapper py-3">
		<div class="container">
			<div class="row" style="align-items:center;height:100vh">
				<div class="col-md-12">
					<center><img src="img//icons/test-success.png" style="height:220px;"></center>
					<p style="text-align:center;margin-top:20px;letter-spacing:1px;font-size:18px;margin-bottom:0px;color:black;">Your Test <b><?=$test_name;?></b> Has Been Booked Successfully!</p>
					<p style="text-align:center;margin-top:5px;letter-spacing:1px;font-size:15px;font-weight:bold;color:#ED0A0A">Your test no is #<?=$test_no;?></p>
					<p style="text-align:center;margin-top:20px;letter-spacing:1px;font-size:13px;">Your test has been successfully booked.</br>Within moments you will receive a notification with receipt of your booked test.</p>
					
					<div class="col-lg-12 col-12" style="margin-top:25px;">
						<center><a href="home.php" class="consult-now" style="width:80%;margin-top:30px;background: transparent linear-gradient(180deg,#04BDBD 0,#008080 100%) 0 0 no-repeat padding-box;">Go To Home</a></center>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
	<!-- All JavaScript Files-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.passwordstrength.js"></script>
    <script src="js/dark-mode-switch.js"></script>
    <script src="js/no-internet.js"></script>
    <script src="js/active.js"></script>
    <script src="js/pwa.js"></script>
	
	
  </body>
</html>