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
    <title>Buy Now || <?=$co_name;?></title>
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
		.plan-box
			{
				border-radius:15px;
				border:1px solid #ED0A0A;
				padding:25px 0px;
				position:relative;
			}
		.plan-box .circle
			{
				color:#ED0A0A;
				font-size: 27px;		
			}		
		.plan-box p
			{
				text-align:center;
				margin-bottom:4px;
			}
		.duration-text
			{
				font-size: 18px;
				color: black;
			}
		.offer-price-text del
			{
				font-size:16px;
			}
		.price-text
			{
				font-size: 22px;
				color: #ED0A0A;
			}
		.active-plan-box
			{
				background:linear-gradient(to bottom right, #A2C971 , #ED0A0A);
			}
		.active-plan-box .duration-text
			{
				color:white !important;
			}
		.active-plan-box .price-text
			{
				color:white !important;
			}
		.active-plan-box .circle
			{
				color:white !important;
			}
		.seemore-btn
			{
				border: 1px solid #A7CC79;
				border-radius: 15px;
				color: #fff !important;
				font-size: 22px !important;
				padding: 7px 15px !important;
				text-decoration: none;
				float: right;
				background: transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box;
				box-shadow: 0 3px 6px #00000029;
				width:100%;
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
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a onclick="history.back()"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Mudra Care Membership</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas"><span></span><span></span><span></span></div>
      </div>
    </div>
    <?php
		include("common/sidebar.php");
		$query=mysqli_query($con,"select * from health_package_detail order by duration limit 1");
		$res=mysqli_fetch_array($query);
		$plan_id=$res['id'];
	?>
    <div class="page-content-wrapper py-3">
      <div class="container">
        <h5 style="margin-bottom:0px;">Select Offers</h5>
		<p style='letter-spacing:1px;color:black;'>Introductory Offers</p>
		<div style="overflow-x:scroll;">
			<div class="row" style="width:800px">
				<input type='hidden' id='plan_id' name="plan_id" value='<?=$plan_id;?>'>
				<?php
					$i=0;
					$query=mysqli_query($con,"select * from health_package_detail order by duration");
					while($res=mysqli_fetch_array($query))
						{
							$i++;
							$price=$res['price'];
							$offer_price=$res['offer_price'];
							if(!empty($res['offer_price']))
								{
									$price_text="<p class='offer-price-text'><del>₹$price</del></p><p class='price-text'>₹$offer_price</p>";
								}
							else
								{
									$price_text="<p class='price-text'>₹$price</p>";
								}
								
				?>
							<div class="col-5" style="padding-right:7px;width:157px;">
								<div id="plan-box-<?=$res['id'];?>" class="plan-box <?php if($i==1){echo 'active-plan-box';} ?>" onclick="select_plan(<?=$res['id'];?>)">
									<span style="position:absolute;right:4px;top:3px;"><i class="circle fa <?php if($i==1){echo 'fa-check-circle';} else{echo 'fa-circle-thin';}?>" aria-hidden="true"></i></span>
									<p class='duration-text'><?=$res['duration'];?> months</p>
									<?=$price_text;?>
								</div>
							</div>
				<?php
						}					
				?>
			</div>
		</div>
		
      </div>
	  <hr style="margin-top:30px;height:10px !important;border:1 !important;">
	  <div class="container">
			<div class="health-package-lower-box" style="padding:0px;padding-bottom:12px;padding-top:10px;">
				<h5 style='color:black;'>What you get</h5>
				<?php
					$query=mysqli_query($con,"select * from health_package order by id desc limit 1");
					$res=mysqli_fetch_array($query);
					$package_id=$res['id'];
					$what_you_get=unserialize($res['what_you_get']);
					foreach($what_you_get as $a)
						{
				?>
							<p style="margin-bottom:10px;font-size:14px;color:black;"><i class="fa fa-check-circle" style='color:#ED0A0A;width:16px' aria-hidden="true"></i>&nbsp;<span style='display: inline-block;    width: calc(100% - 20px);vertical-align: top;'><?=$a;?></span></p>
				<?php
						}
				?>
			</div>
	  </div>
	  <hr style="margin-top:0px;height:10px !important;border:1 !important;">
	  <div class="container">
			<div class="health-package-lower-box" style="padding:0px;padding-bottom:12px;padding-top:10px;">
				<h5 style='color:black;'>Top Hospitals</h5>
				<div class="row">
					<?php
						$query=mysqli_query($con,"select * from hospital order by sort_order limit 6");
						while($res=mysqli_fetch_array($query))
							{
					?>
								<div class="col-4"><img src='admin/upload/hospital/<?=$res['image'];?>' style="padding:10px;"></div>
					<?php
							}
					?>
					<div class="col-12">
						<p style="text-align:right;padding-right:15px;"><a href='hospitals.php' style='color:#ED0A0A;letter-spacing:1px;font-weight:bold;'>See More <i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
					</div>
				</div>
			</div>
	  </div>
	  <hr style="opacity:0.10;margin-top:5px;margin-bottom:5px;">
	  <p style='text-align:center;font-size:11px;margin-bottom:0px;'>By clicking on 'Subscribe' I agree to the <a href='#' style='color:#ED0A0A'>Terms and conditions.</a></p>
	  <?php
		$member_id=$_COOKIE['id'];
		$query2=mysqli_query($con,"select * from plan where member_id='$member_id' and status='Active'");
		$num2=mysqli_num_rows($query2);
		if($num2>0)
			{
	  ?>
				<p style="padding-left:30px;padding-right:30px;position: fixed;width: 100%;bottom: 0px;left: 0px;"><span class="seemore-btn" style="background:tomato;">Already Subscribed</span></p>
	  <?php
			}
		else
			{
	  ?>
				<p style="padding-left:30px;padding-right:30px;position: fixed;width: 100%;bottom: 0px;left: 0px;"><span class="seemore-btn" onclick="subscribe()">Subscribe</span></p>
	  <?php
			}			
	  ?>		
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
		function subscribe()
			{
				var plan_id=$("#plan_id").val();
				window.location.href="review-order.php?plan_id="+plan_id;
			}		
	</script>
  </body>
</html>