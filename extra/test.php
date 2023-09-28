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
    <title>Test Detail || <?=$co_name;?></title>
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
	<link rel="stylesheet" type="text/css" href="plugin/slick-master/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="plugin/slick-master/slick/slick-theme.css">
	<style>
		.share-box
			{
				position:fixed;
				left:0px;
				top:0px;
				height:100%;
				width:100%;
				background:rgba(0,0,0,0.5);
				display:none;
				z-index:9999;
			}
		.share-sub-box
			{
				background:white;
				border-radius:15px 15px 0px 0px;
				padding:15px;
				position: absolute;
				width: 100%;
				bottom: 0px;
			}
		.image-label
			{
				font-size: 12px;
				font-weight: 500;
				color: #000;
				padding-top: 4px;
				word-break:break-word;
				width: 100%;
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
		.search_for
			{
				color:#999999;
				display:inline-block;
				width:calc(100% - 120px);;
			}
		.sub_search_for
			{
				width:100%;
				display:inline-block;
			}
		.book-now
			{
				border: 1px solid #A7CC79;
				border-radius: 10px;
				color: #fff !important;
				font-size: 13px !important;
				padding: 10px 15px !important;
				text-decoration: none;
				background: transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box;
				box-shadow: 0 3px 6px #00000029;
				width:90%;
				display:inline-block;
				text-align:center;
				margin-left:1%;
			}
		.share
			{
				border: 1px solid #A7CC79;
				border-radius: 10px;
				color: #fff !important;
				font-size: 13px !important;
				padding: 10px 15px !important;
				text-decoration: none;
				background: transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box;
				box-shadow: 0 3px 6px #00000029;
				width:70%;
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
				padding: 10px 15px !important;
				text-decoration: none;
				background: transparent linear-gradient(180deg,#F2FBE7 0,#EBF9DA 100%) 0 0 no-repeat padding-box;
				box-shadow: 0 3px 6px #00000029;
				width:48%;
				display:inline-block;
				margin-right:1%;
				text-align:center;
			}
		.back-button
			{
				position:fixed;
				left:15px;
				top:15px;
				z-index:99;
			}
		.price-block
			{
				background:transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box;
				color:white;
				padding: 4px 10px;
				border-radius: 7px;
			}	
		.test-image-box
			{
				border-radius:15px;
				padding:18px;
				box-shadow:1px 1px 4px 1px #e5e5e5;
				background-color: white;
			}
		.test-box
			{
				padding:8px;
			}
		.facility-box
			{
				border-radius:100%;
				padding:18px;
				box-shadow:1px 1px 4px 1px #e5e5e5;
				background:transparent linear-gradient(180deg,#03A8A8 0,#008080 100%) 0 0 no-repeat padding-box;
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
		$test_id=$_GET['id'];
		$query=mysqli_query($con,"select * from commonly_booked_test where id='$test_id'");
		$res=mysqli_fetch_array($query);
		$bg_image=$res['background_image'];
		$tests=0;
		$tests_included=unserialize($res['tests_included']);
		foreach($tests_included as $test_profile)
			{
				$query2=mysqli_query($con,"select * from test_profile where id='$test_profile'");
				$res2=mysqli_fetch_array($query2);
				$all_tests=unserialize($res2['tests']);
				$all_tests_count=count($all_tests);
				$tests+=$all_tests_count;
			}
	?>
    <div class="page-content-wrapper py-3" style="margin-top:0px;padding-top:0px !important;">
		<div class="back-button"><a onclick="history.back()" style="padding: 6px 10px;border-radius: 50%;    box-shadow: 2px 2px 4px grey;color: black;background:white;"><i class="fa fa-angle-left" aria-hidden="true"></i></a></div>
		<div class="weekly-best-seller-area py-3" style="padding-top:0px !important">
			<div class="container"  style="background:url('admin/upload/commonly_booked_test/<?=$bg_image;?>');background-size:cover;background-repeat:no-repeat;padding:30px;padding-bottom:60px;padding-top:60px;">
				<div class="row">
					<div class="col-lg-12 col-12">
						<div style="background:teal;padding:15px;border-radius:15px">
							<span style="display:inline-block;width:55px;vertical-align:top;padding:2px;"><img src="img/icons/add.png" style=""></span>
							<p style="display:inline-block;width:calc(100% - 70px);color:white;margin-bottom:0px;"><span style="font-weight:600;width:100%;display:block;">Your health is our priority</span>
							<span style="width:100%;display:inline-block;font-size:12px;">What we and our partners are doing to keep your testing safe - <a href="#" style="color:white;font-weight:600;">Know More > </a></span></p>
						</div>
					</div>
				</div>		
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-12">
						<?php
							if(!empty($res['offer_price']))
								{
									$price=$res['price'];
									$offer_price=$res['offer_price'];
									echo "<p style='margin-top:20px;'><span class='price-block'>₹$offer_price onwards</span>&nbsp;&nbsp;<del>₹$price</del></p>";
								}
							else
								{
									$price=$res['price'];
									echo "<p style='margin-top:20px;'><span class='price-block'>₹$price onwards</span></p>";
								}								
						?> 
						<h3><?=$res['name'];?></h3>	
					</div>
					<div class="col-lg-12 col-12" style="margin-top:35px;">
						<div style="display:inline-block;width:49%">
							<span style="background: transparent linear-gradient(180deg,#03A8A8 0,#008080 100%) 0 0 no-repeat padding-box;display: inline-block;padding: 8px;border-radius: 10px;vertical-align:super;"><img src="img/icons/testtube.png" style="width:30px"></span>
							<span style="display:inline-block;margin-left:5px;line-height:16px;font-size:14px;"><span style='color:black;font-weight:bold;'><?=$tests;?>+</span> Test</br> Included</span>
						</div>
						
						<div style="display:inline-block;width:49%">
							<span style="background: transparent linear-gradient(180deg,#03A8A8 0,#008080 100%) 0 0 no-repeat padding-box;display: inline-block;padding: 8px;border-radius: 10px;vertical-align:super;"><img src="img/icons/smiley.png" style="width:30px"></span>
							<span style="display:inline-block;margin-left:5px;line-height:16px;font-size:14px;"><span style='color:black;font-weight:bold;'>3000+</span> Booked in</br> last 7 days</span>
						</div>
					</div>
					
					<div class="col-lg-12 col-12" style="margin-top:25px;">
						<h6 style="font-weight:600;margin-bottom:4px;"><?=$tests;?>+ Tests Included</h6>
						<p style="font-size:15px;">Tap on a panel to see included tests</p>
					</div>
					<div class="col-lg-12 col-12">
						<div class="weekly-best-seller-area py-3">
							  <div class="row g-3">
								<!-- Single Weekly Product Card -->
								<section class="vertical-center-4 slider" style="margin-top:0px;">
									<?php
										foreach($tests_included as $test_profile)
											{
												$query2=mysqli_query($con,"select * from test_profile where id='$test_profile'");
												$res2=mysqli_fetch_array($query2);
												$all_tests=unserialize($res2['tests']);
												$all_tests_count=count($all_tests);
									?>
												<!-- Single Weekly Product Card -->
												<div class="test-box" onclick="show_tests(<?=$test_profile;?>)">
													<a class="product-thumbnail d-block test-image-box"><img src="admin/upload/test_profile/<?=$res2['image'];?>" style="width:100%;object-fit:cover;border-radius:15px;" alt="<?=$res2['name'];?>"></a>
													<a class="product-title d-block image-label two-line" style="height:37px;text-align:center;margin-top:7px;" id="heading<?=$test_profile;?>"><?=$res2['name'];?>(<?=$all_tests_count;?>)</a>
													<p id="content<?=$test_profile;?>" style="display:none;">
														<?php
															foreach($all_tests as $test)
																{
																	$query2=mysqli_query($con,"select * from tests where id='$test'");
																	$res2=mysqli_fetch_array($query2);
																	$test_name=$res2['name'];
																	echo "<span style='display:block'>$test_name</span>";
																}
														?>
													</p>
												</div>
												<!-- Single Weekly Product Card -->
									<?php
											}
									?>				
								</section>
							  </div>
						  </div>
					</div>
					<div class="col-lg-12 col-12" style="margin-top:5px;">
						<h6 style="font-weight:600;margin-bottom:4px;">This package covers</h6>
						<ul style="padding-left:15px;margin-top:10px;">
						<?php
							$query2=mysqli_query($con,"select * from cbt_covers where cbt_id='$test_id'");
							while($res2=mysqli_fetch_array($query2))
								{
									$cover=$res2['covers'];
									echo "<li style='list-style:disc;font-size:13px;'>$cover</li>";
								}
						?>
						</ul>
					</div>
				</div>
			</div>
			<div class="container" style="background: #EBF9DA; margin-top: 15px;">
				<div class="row">
					<div class="col-lg-12 col-12" style="margin-top:25px;">
						<h6 style="font-weight:600;margin-bottom:4px;">Why should you book this package?</h6>
					</div>
					<div class="col-lg-12 col-12" style="margin-top:15px;">
						<div class="weekly-best-seller-area py-3">
							  <div class="row g-3">
								<!-- Single Weekly Product Card -->
								<section class="vertical-center-5 slider" style="margin-top:0px;">
									<?php
										$query2=mysqli_query($con,"select * from cbt_why where cbt_id='$test_id'");
										while($res2=mysqli_fetch_array($query2))
											{
									?>
												<!-- Single Weekly Product Card -->
												<div class="test-box">
													<center><a class="product-thumbnail d-block test-image-box" style="max-width:90px;padding:10px;" href="#"><img src="admin/upload/commonly_booked_test/<?=$res2['image'];?>" style="width:100%;object-fit:cover;border-radius:15px;" alt="<?=$res2['content'];?>"></a></center>
													<a class="product-title d-block image-label" style="text-align:center;margin-top:7px;" href="#"><?=$res2['content'];?></a>
												</div>
												<!-- Single Weekly Product Card -->
									<?php
											}
									?>				
								</section>
							  </div>
						  </div>
					</div>
				</div>
			</div>
			<div class="container" style="padding-top:30px;">
				<div class="row" style="margin-left: 0px; margin-right: 0px; border: 1px solid lightgray;    padding: 15px; border-radius: 15px;">
					<div class="col-lg-12 col-4" style="padding-left: 5px; padding-right: 5px;">
						<center><a class="product-thumbnail d-block facility-box" style="max-width:55px;padding:10px;" href="#"><img src="img/icons/doctor.png" style="width:100%;object-fit:cover;max-width:55px" ></a></center>
						<a class="product-title d-block image-label" style="text-align:center;margin-top:7px;" href="#">Free consultations with top doctors</a>
					</div>
					<div class="col-lg-12 col-4" style="padding-left: 5px; padding-right: 5px;">
						<center><a class="product-thumbnail d-block facility-box" style="max-width:55px;padding:10px;" href="#"><img src="img/icons/home.png" style="width:100%;object-fit:cover;max-width:55px" ></a></center>
						<a class="product-title d-block image-label" style="text-align:center;margin-top:7px;" href="#">Sample pickup at home</a>
					</div>
					<div class="col-lg-12 col-4" style="padding-left: 5px; padding-right: 5px;">
						<center><a class="product-thumbnail d-block facility-box" style="max-width:55px;padding:10px;" href="#"><img src="img/icons/online-report.png" style="width:100%;object-fit:cover;max-width:55px" ></a></center>
						<a class="product-title d-block image-label" style="text-align:center;margin-top:7px;" href="#">Online reports within 48 hours</a>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-12" style="padding: 15px;position: fixed;bottom: 0px;background: white;z-index: 9999;text-align:center">
				<span class="book-now" onclick="book_now(<?=$_GET['id'];?>)">Book Now</span>
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
	<div class="share-box">
		<div class="share-sub-box">
			<p style="color:black;font-size:18px;"><span id=></span><span style="float: right;display: inline-block;color: #ED0A0A;font-size: 28px;margin-top: -6px;" onclick="close_share_box()"><i class="fa fa-times-circle-o" aria-hidden="true"></i></span></p>
			<p style="margin-top:25px;"><?=$res['name'];?> from <?=$hospital_name;?> is one of the top <?=$speciality;?> in the country.</p>
		</div>
	</div>
	<script>
		function open_share_box()
			{
				$(".share-box").slideDown(1000);
				$(".share-box").css("display","block");
			}
		function close_share_box()
			{
				$(".share-box").slideUp(500);
			}	
	</script>
	<script src="plugin/slick-master/slick/slick.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(document).on('ready', function() {
			$(".vertical-center-4").slick({
				horizontal: true,
				slidesToShow: 4,
				infinite:false,
				slidesToScroll: 4,
				rows:1,
				autoplay: true,
				autoplaySpeed: 2000
			});
			
			$(".vertical-center-5").slick({
				horizontal: true,
				slidesToShow: 3,
				infinite:false,
				slidesToScroll: 3,
				rows:1,
				autoplay: true,
				autoplaySpeed: 2000
			});
		});
		
		function book_now(test_id)
			{
				window.location.href="review-test.php?test_id="+test_id;
			}
	</script>
	
  </body>
</html>