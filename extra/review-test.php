<?php
	include("db.php");
	include("function.php");
	include("common-details.php");
	include("check-login.php");
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
    <title>Review Test Booking || <?=$co_name;?></title>
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
	<style>
		.coupon-box
			{
				position:fixed;
				left:0px;
				top:0px;
				height:100%;
				width:100%;
				background:rgba(0,0,0,0.5);
				display:none;
			}
		.coupon-sub-box
			{
				background:white;
				border-radius:15px 15px 0px 0px;
				padding:15px;
				position: absolute;
				width: 100%;
				bottom: 0px;
			}		
		.seemore-btn
			{
				border: 1px solid #A7CC79;
				color: #fff !important;
				font-size: 22px !important;
				padding: 7px 15px !important;
				text-decoration: none;
				float: right;
				background: transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box;
				box-shadow: 0 3px 6px #00000029;
				width:100%;
				text-align:center;
				letter-spacing:1px;
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
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a onclick="history.back()" style="padding: 6px 10px;border-radius: 50%;    box-shadow: 2px 2px 4px grey;color: black;"><i class="fa fa-angle-left" aria-hidden="true"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Review Test Booking</h6>
        </div>
        <!-- Navbar Toggler-->
		<div class="suha-navbar-toggler" >&nbsp;</div>
      </div>
    </div>
    <?php
		$query=mysqli_query($con,"select * from commonly_booked_test where id='".$_GET['test_id']."'");
		$res=mysqli_fetch_array($query);
		$test_id=$res['id'];
		$test_name=$res['name'];
		if(!empty($res['offer_price']))
			{
				$price=$res['offer_price'];
			}
		else
			{
				$price=$res['price'];
			}
		$tax=$price*18/118;	
		$price_without_tax=$price-$tax;
	?>
    <div class="page-content-wrapper py-3">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<input type="hidden" id="test_id" value="<?=$_GET['test_id'];?>">
					<p style="background:teal;padding:13px 20px;border-radius:15px;color:white;font-weight:600"><i class="fa fa-circle" aria-hidden="true" style="font-size: 18px;vertical-align: text-bottom;"></i>&nbsp;<?=$test_name;?> <span style='float:right;'>₹<?=number_format($price_without_tax,2);?></span></p>
					<p style="margin-top:23px;letter-spacing:1px;;">Payment Details</p>
					<p style='color:black;margin-bottom:10px;'><?=$test_name;?><span style='float:right;'>₹<?=number_format($price_without_tax,2);?></span></p>
					<hr style="margin-top:0px;opacity:0.20;margin-bottom:10px;">
					<p style='color:black;margin-bottom:10px;color:#ED0A0A'><img src='img/icons/offer-icon.png' style="width:20px;">&nbsp;Apply Coupon<span style='float:right;'><a onclick="open_apply_coupon()" style="padding: 2px 9px;border-radius: 50%;color: gray;border: 1px solid gray;"><i class="fa fa-angle-right" aria-hidden="true"></i></a></span></p>
					<hr style="margin-top:0px;opacity:0.20;margin-bottom:10px;">
					<p style='color:black;margin-bottom:10px;'>Taxes & GST<span style='float:right;'>₹<?=number_format($tax,2);?></span></p>
					<hr style="margin-top:0px;opacity:0.20;margin-bottom:10px;">
					<p style='color:black;margin-bottom:10px;font-weight:bold;font-size:16px;'>To Pay<span style='float:right;color:teal;'>₹<?=number_format($price,2);?></span></p>
					<input type="hidden" id="to_pay" value="<?=$price;?>">
				</div>
			</div>
		</div>
		<p style="position: fixed;width: 100%;bottom: 0px;left: 0px;margin-bottom:0px;"><span class="seemore-btn" onclick="continue_to_payment_mode()">Proceed</span></p>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
	<div class="coupon-box">
		<div class="coupon-sub-box">
			<p style="color:black;font-size:16px;">Apply Coupon<span style="float:right;display:inline-block;" onclick="close_coupon_box()"><i class="fa fa-times-circle" aria-hidden="true"></i></span></p>
			<p style="margin-top:25px;"><input type="text" name="coupon" id="coupon" class="form-control" style="border-radius: 24px 0px 0px 24px;display: inline-block;width: calc(100% - 86px);" placeholder="enter coupon code"><span style="background: teal;color: white;width: 85px;display: inline-block;text-align: center;padding: 15px 0px;   border-radius: 0px 24px 24px 0px;">Apply</span></p>
			</br>
			</br>
			<p style='text-align:center;color:black;'><img src="img/icons/coupon.png" style="width:65px;"></br>No coupon available</p>
			</br>
			</br>
		</div>
	</div>
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
	<script>
		function select_plan(id)
			{
				$(".plan-box").removeClass("active-plan-box");
				$("#plan-box-"+id).addClass('active-plan-box');	
				$(".plan-box .circle").removeClass("fa-check-circle");
				$(".plan-box .circle").addClass("fa-circle-thin");
				$("#plan-box-"+id+" .circle").removeClass('fa-circle-thin');	
				$("#plan-box-"+id+" .circle").addClass('fa-check-circle');
				$("#plan_id").val(id);	
			}
		function open_apply_coupon()
			{
				$(".coupon-box").slideDown(1000);
				$(".coupon-box").css("display","block");
			}
		function close_coupon_box()
			{
				$(".coupon-box").slideUp(500);
			}
		function continue_to_payment_mode()
			{
				var to_pay=$("#to_pay").val();
				var test_id=$("#test_id").val();
				window.location.href="payment-mode-for-test.php?to_pay="+to_pay+"&test_id="+test_id;
			}	
	</script>
  </body>
</html>