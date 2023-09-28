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
    <title>Lab Tests || <?=$co_name;?></title>
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
		.image-label
			{
				font-size: 15px;
				font-weight: 500;
				color: #000;
				padding-top: 4px;
				word-break:break-word;
				width: calc(100% - 50px);
				display: inline-block;
				vertical-align: middle;
				padding-top: 0px;
				padding-left: 8px;
			}
		input::-webkit-input-placeholder
			{
				color: #ED0A0A !important;
				font-size:15px;
			}
		.seemore
			{
				border: 1px solid #A7CC79;
				border-radius: 15px;
				color: #fff !important;
				font-size: 11px !important;
				padding: 5px 15px !important;
				text-decoration: none;
				float: right;
				background: transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box;
				box-shadow: 0 3px 6px #00000029;
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
          <h6 class="mb-0">Lab Tests</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas">&nbsp;</div>
      </div>
    </div>
    <div class="page-content-wrapper py-3">
      <div class="weekly-best-seller-area py-3">
		<div class="container" style="margin-bottom:40px;">
			<div class="d-flex align-items-center justify-content-between mb-3" >
				<h4 style='color:black'>What is your concern?</h4>
			</div>
			<p style="border:1px solid #E4E4E4;border-radius:8px;padding:5px 15px;"><i class="fa fa-search" aria-hidden="true" style="font-size: 16px;color: #E4E4E4;"></i><input type="text" class="form-control" name='search_speciality' id="search_speciality" placeholder="Search for Lab Tests" style="display:inline-block;width:calc(100% - 20px);height:35px;border:none;padding-left:10px;"></p>
		</div>	
		
		<div class="container" style="margin-bottom:40px;background:#EBF9DA;height:100vh">
			<div class="row g-3">
				<?php
					$query=mysqli_query($con,"select * from commonly_booked_test order by name");
					while($res=mysqli_fetch_array($query))
						{
				?>
							<!-- Single Weekly Product Card -->
							<div class="col-12 col-md-12">
							  <div class="horizontal-product-card">
								<div class="card-body align-items-center" style="padding:0px;    background: #EBF9DA; padding: 10px 5px;border-radius: 10px;">
									<div style="display:inline-block;width:calc(100% - 110px);">
										<a class="product-title image-label" href="test.php?id=<?=$res['id'];?>"><?=$res['name'];?></a>
										<a class="product-title image-label" style="font-size:13px;">Starting From ₹<?=$res['offer_price'];?></a>
									</div>	
									<div style="display:inline-block;width:100px">
										<a class="seemore" href="test.php?id=<?=$res['id'];?>" style="padding:5px 15px !important">Book Now</a>
									</div>
								</div>
							  </div>
							</div>
							<hr style="margin-bottom:0px;">
							<!-- Single Weekly Product Card -->
				<?php
						}
				?>			
			</div>
		</div>
		
      </div>
	  
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
	<?php
		include("common/footer.php");
	?>
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