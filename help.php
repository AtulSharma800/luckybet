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
    <title>Help || <?=$co_name;?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Poppins:wght@500&display=swap" rel="stylesheet">
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
	<link rel="stylesheet" type="text/css" href="plugin/slick-master/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="plugin/slick-master/slick/slick-theme.css">

	<style>
		.user-id-block
			{
				border: 1px solid #ED0A0A;
				display: inline-block;
				font-size: 9px;
				line-height: 11px;
				padding: 1px 4px;
				border-radius: 4px;
				box-shadow:1px 1px 2px #ED0A0A;
			}
		.cash-block
			{
				display: inline-block;
				font-size: 9px;
				padding: 6px 4px;
				border-radius: 4px;
				background: white;
				margin-left: 5px;
				vertical-align:text-bottom;
			}
		.add-cash-button
			{
				display: inline-block;
				font-size: 9px;
				padding: 6px 9px;
				border-radius: 4px;
				background: linear-gradient(to bottom right, #ED0A0A,#F4B8B8);
				margin-left: 5px;
				vertical-align:text-bottom;
			}	
		.nav-btn-text
			{
				display: inline-block;
				padding: 6px 9px;
				background: #FEF1F1;
				margin-left: 5px;
				vertical-align:text-bottom;
				color:black;
				width:100%;
				text-align:center;
			}
		.active-nav-btn-text
			{
				background: linear-gradient(to bottom right, #ED0A0A,#F4B8B8);
				color:white;
				position:relative;
			}
		.common-box
			{
				display:none;
			}		
		.active-box
			{
				display:block !important;
			}
		option:checked
			{
			   background: green;
			   color: white;
			}
		.number-box
			{
				width: 10%;
				display: block;
			}	
		.number-sub-box
			{
				background:#ED0A0A;
				color:white;
				text-align:center;
				border-right:1px solid #E3E0E0;
				display:block;
			}
		.number-box input
			{
				background:#FEF1F1;
				border-right:1px solid #E3E0E0;
				text-align:center;
			}
		.add-amount-btn
			{
				background: linear-gradient(to bottom right, #ED0A0A,#F4B8B8);
				color:white;
				padding:8px 15px;
				border-radius:5px;
			}
		.copy-btn
			{
				background: linear-gradient(to bottom right, #ED0A0A,#F4B8B8);
				color: white;
				padding: 9px 16px;
				border-radius: 0px 5px 5px 0px;
			}

		.next-btn
			{
				background: linear-gradient(to bottom right, #ED0A0A,#F4B8B8);
				color:white;
				padding:8px 15px;
				border-radius:5px;
				letter-spacing:1px;
			}
		.back-btn
			{
				background: black;
				color:white;
				padding:8px 15px;
				border-radius:5px;
				margin-right:10px;
				letter-spacing:1px;
			}	
		.steps
			{
				display:none;
				padding-bottom:20px;
			}
		.active-step
			{
				display:initial;
			}	
		.payment-box
			{
				width:100%;
				height:100px;
				display:flex;
				justify-content:center;
				align-items:center;
				background:white;
				border-radius:15px;
				position:relative;
				margin-top:20px;
			}	
		.manual-text
			{
				background:#ED0A0A;
				color:white;
				padding:2px 4px;
				border-radius:5px 0px 5px 0px;
				position:absolute;
				right:8px;
				top:8px;
				font-size:9px;
			}
		#error-text
			{
				text-align:center;
				color:#ED0A0A;
				letter-spacing:1px;
			}
		#step-3 .payment-box
			{
				width:100%;
				background:white;
				border-radius:15px;
				margin-top:20px;
				padding:10px;
				display:block;
				height:auto;
			}
		.view-detail-btn
			{
				background: #ED0A0A;
				color:white;
				padding:0px 4px;
				border-radius:3px;
				font-size:9px;
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
    <div class="header-area" id="headerArea" style='background:#FEF1F1'>
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Logo Wrapper-->
        <div class="logo-wrapper"><a href="home.php"><img src="img/long-logo.png" alt="<?=$co_name;?>" style="max-height:40px;"></a></div>
        <!-- Search Form-->
        <div class="top-search-form">
          &nbsp;
        </div>
		<?php
			$user_id=$_COOKIE['id'];
			$user_code=$_COOKIE['user_id'];
			$available_balance=get_available_amount($user_id,$con);
		?>
        <!-- Navbar Toggler-->
        <div><span class='user-id-block'><span style='color:#ED0A0A;display:block'>USER ID</span><?=$user_code;?></span><span class='cash-block'><img src="img/rupee-symbol2.png" style='height:13px'>&nbsp;&nbsp;<span style='color:#ED0A0A'><?=number_format($available_balance,2);?></span></span><a href="money.php"><span class='add-cash-button'><i class="fa fa-plus-circle" style='color:white' aria-hidden="true"></i></span></a></div>
      </div>
    </div>
    <?php
		include("common/sidebar.php");
	?>
    <!-- PWA Install Alert -->
    <?php
        $query=mysqli_query($con,"select * from settings where id='1'");
        $res=mysqli_fetch_array($query);
        $help_number=urlencode($res['help_number']);
    ?>	
    <div class="page-content-wrapper">
		<div class="container">
			<div class="pt-3">
				<div class="row g-3 upper-icons">
					<div class="col-12">
						<h5 style='letter-spacing:1px;text-align:center;'>SUPPORT IN MESSENGERS</h5>
					</div>
					<div class="col-12">
						<p style='text-align: center;'><a href="https://wa.me/17073350576"><span class="btn btn-success"><i class="fa fa-whatsapp" aria-hidden="true"></i>&nbsp;&nbsp;Chat On Whatsapp</span></a></p>
					</div>
					
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
	<script src="plugin/slick-master/slick/slick.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(document).on('ready', function() {
		  $(".vertical-center-4").slick({
			horizontal: true,
			slidesToShow: 5,
			infinite:false,
			slidesToScroll: 5,
			rows:2,
			autoplay: true,
			autoplaySpeed: 2000
		  });
		  
		  
		  $(".vertical-center-3").slick({
			horizontal: true,
				slidesToShow: 3,
				infinite:false,
				slidesToScroll: 3,
				rows:1,
				autoplay: true,
				autoplaySpeed: 2000
		  });
		  
		  /*$(".vertical-center-2").slick({
			dots: true,
			vertical: true,
			centerMode: true,
			slidesToShow: 2,
			slidesToScroll: 2
		  });
		  $(".vertical-center").slick({
			dots: true,
			vertical: true,
			centerMode: true,
		  });
		  $(".vertical").slick({
			dots: true,
			vertical: true,
			slidesToShow: 3,
			slidesToScroll: 3
		  });
		  $(".regular").slick({
			dots: true,
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 3
		  });
		  $(".center").slick({
			dots: true,
			infinite: true,
			centerMode: true,
			slidesToShow: 5,
			slidesToScroll: 3
		  });
		  $(".variable").slick({
			dots: true,
			infinite: true,
			variableWidth: true
		  });
		  $(".lazy").slick({
			lazyLoad: 'ondemand', // ondemand progressive anticipated
			infinite: true
		  });*/
		});
		function show_box(btn_id,box_id)
			{
				$('.nav-btn-text').removeClass("active-nav-btn-text");
				$('#'+btn_id).addClass("active-nav-btn-text");
				
				$('.common-box').removeClass("active-box");
				$('#'+box_id).addClass("active-box");
			}
			
	</script>
  </body>
</html>