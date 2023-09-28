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
    <title>Payment Mode || <?=$co_name;?></title>
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
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
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
				font-size: 12px !important;
				padding: 10px 5px !important;
				text-decoration: none;
				float: right;
				background: transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box;
				box-shadow: 0 3px 6px #00000029;
				width:100%;
				text-align:center;
				letter-spacing:1px;
				border-radius:5px;
				cursor:pointer;
			}
		.select2-container--default .select2-selection--single
			{
				padding:6px !important;
				height:40px !important;
			}
		.select2-container--default .select2-selection--single .select2-selection__arrow
			{
				height:40px !important;
			}
		.select2-container
			{
				width:100% !important;
			}
		.page-loader
			{
				position:fixed;
				left:0px;
				top:0px;
				height:100%;
				width:100%;
				background:rgba(0,0,0,0.5);
				display:none;
				justify-content:center;
				align-items:center;
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
          <h6 class="mb-0">Select Payment Mode</h6>
        </div>
        <!-- Navbar Toggler-->
		<div class="suha-navbar-toggler" >&nbsp;</div>
      </div>
    </div>
    <div class="page-content-wrapper py-3">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<input type="hidden" id="plan_id" value="<?=$_GET['plan_id'];?>">
					<input type="hidden" id="amount" value="<?=$_GET['to_pay'];?>">
					<p style="background:teal;padding:13px 20px;border-radius:15px;color:white;font-weight:600"><i class="fa fa-circle" aria-hidden="true" style="font-size: 18px;vertical-align: text-bottom;"></i>&nbsp;Amount To Pay <span style='float:right;'>₹<?=number_format($_GET['to_pay'],2);?></span></p>
					<p style="margin-top:23px;letter-spacing:1px;;">Payment Mode</p>
					<p style='color:black;margin-bottom:10px;'><label for="cash">Pay Cash</label><span style='float:right;'><input type="radio" name="payment_mode" id="cash" value="cash" checked></span></p>
					<hr style="margin-top:0px;opacity:0.20;margin-bottom:10px;">
					<p style='color:black;margin-bottom:10px;'><label for="online">Pay Online</label><span style='float:right;'><input type="radio" name="payment_mode" id="online" value="online"></span></p>
				</div>
			</div>
		</div>
		<p style="position: fixed;width: 100%;bottom: 0px;left: 0px;margin-bottom:0px;"><span class="seemore-btn" onclick="purchase_plan()">Continue</span></p>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
	<div class="page-loader">
		<img src="img/icons/heart.gif" style="height:80px;border-radius:15px;">
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
	<script src="plugin/toast/toast.script.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
	
	<script>
		$(document).ready(function()
			{
				$('.js-example-programmatic').select2();
			});
		function open_apply_coupon()
			{
				$(".coupon-box").slideDown(1000);
				$(".coupon-box").css("display","block");
			}
		function close_coupon_box()
			{
				$(".coupon-box").slideUp(500);
			}
		function purchase_plan()
			{
				var plan_id=$("#plan_id").val();
				var member_id=$("#member_id").val();
				var amount=$("#amount").val();
				var payment_mode=$('input[name="payment_mode"]:checked').val();
				$(".page-loader").css("display","flex");
				$.ajax({
					url: "ajax/purchase-plan.php?plan_id="+plan_id+"&amount="+amount+"&payment_mode="+payment_mode,
					type: "POST",
					data:  "",
					contentType: false,
					cache: false,
					processData:false,
					success: function(data)
					{
						$(".page-loader").css("display","none");
						var a=JSON.parse(data);
						if(a.status=='Success')
							{
								$.Toast("", a.message, "success", {
									has_icon:false,
									has_close_btn:true,
									stack: true,
									fullscreen:true,
									timeout:2000,
									sticky:false,
									has_progress:true,
									rtl:false,
								});
								setTimeout(function(){window.location.href='success.php?plan_id='+plan_id;},1000);
							}
						else	
							{
								$.Toast("", a.message, "error", {
									has_icon:false,
									has_close_btn:true,
									stack: true,
									fullscreen:true,
									timeout:2000,
									sticky:false,
									has_progress:true,
									rtl:false,
								});
							}
					},
					error: function() 
					{
					} 	        
			   });
			}		
	</script>
  </body>
</html>