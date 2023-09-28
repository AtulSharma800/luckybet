<?php
	include("db.php");
	include("function.php");
	include("common-details.php");
	include("check-login.php");
	$member_id=$_COOKIE['id'];
	$plan_id=$_GET['plan_id'];
	
	$query = mysqli_query($con,"select * from users where id='$member_id'");
	$res = mysqli_fetch_array($query);
	$html="<div style='width:550px; padding:0;display:block;box-shadow:2px 2px 4px lightgrey;' >";
	$html.="";
                             
	$name = $res["name"];
	$member_code = $res["user_id"];
	$front_file_name=$member_code."-front.png";
	$back_file_name=$member_code."-back.png";
	$a = date_create_from_format("Y-m-d",$res['dob']);
	$dob = date_format($a,"d-m-Y");
	$address = $res["address"];
	$query2 = mysqli_query($con,"select * from plan where member_id='$member_id' and plan_id='$plan_id' order by id desc limit 1");
	$res2 = mysqli_fetch_array($query2);
	$a = date_create_from_format("Y-m-d",$res2['valid_till']);
	$valid_till = date_format($a,"m/Y");
	$image="img/mudra-card-logo.png";
	$qr_code="images/qrcode/".$res['qrcode'];
	$html.="<div class='container' style='padding-left:0px;padding-right:0px;'><div style='display:block;width:100%;border-bottom:3px solid #005EA8;'><span style='display:block;padding:5px;'><img src='$image' style='width:200px;'><span style='float:right;font-family: Comfortaa, cursive; font-size:32px;margin-top:18px;color:#005EA8;'>Health Card</span></span></div><div style='display:block;width:100%;border-bottom:3px solid #005EA8;background:url(img/card-bg.png);background-position:center;background-size:cover;height:240px;'><div style='display:inline-block;width:70%;padding:10px 10px;color:black'><span style='display:block;font-family: Comfortaa, cursive; font-size:24px;font-weight:bold;'>$name</span><span style='display:block;font-family: Comfortaa, cursive;margin-top:4px;'>$member_code</span><span style='display:block;font-family: Comfortaa, cursive;margin-top:25px;'><b style='color:#005EA8;display:inline-block;width:50px;'>DOB</b> : &nbsp;&nbsp; <span style='display:inline-block;width:calc(100% - 80px);vertical-align:text-top;'>$dob</span></span><span style='display:block;font-family: Comfortaa, cursive;margin-top:4px;'><b style='color:#005EA8;display:inline-block;width:50px;'>ADD</b> : &nbsp;&nbsp; <span style='display:inline-block;width:calc(100% - 80px);vertical-align:text-top;'>$address</span></span><span style='display:block;font-family: Comfortaa, cursive;margin-top:8px;font-size:18px;'><b style='display:inline-block;'>VALID TILL</b> : <span style='display:inline-block;'>$valid_till</span></span></div><div style='display:inline-block;width:30%;padding:10px;vertical-align:top;'><img src='$qr_code' style='width:100%;'></div></div></div><div style='display:block;padding:10px;background: transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box;'><span style='display:block;font-family: Comfortaa, cursive;text-align:center;font-size:22px;color:white'>Helpline No. $co_mobile1</span><span style='display:block;font-family: Comfortaa, cursive;text-align:center;font-size:22px;margin-top:3px;color:white'>$co_website_url</span></div></div>";
	
	
	
	$html2="<div style='width:550px; padding:0;display:block;box-shadow:2px 2px 4px lightgrey;' ><div class='container' style='padding-left:0px;padding-right:0px;'><div style='display:block;width:100%;border-bottom:3px solid #005EA8;'><span style='display:block;padding:5px;'><img src='$image' style='width:200px;'><span style='float:right;font-family: Comfortaa, cursive; font-size:32px;margin-top:18px;color:#005EA8;'>Health Card</span></span></div><div style='display:block;width:100%;border-bottom:3px solid #005EA8;background:url(img/card-bg.png);background-position:center;background-size:cover;height:240px;padding:15px;'>";
	
	
	$html2.="<table style='width:100%;font-family: Comfortaa, cursive;padding:5px;color:black;'><tr style='font-size:20px;color:#005EA8;'><td>Relationship</td><td>Name</td><td>Age</td></tr>";
	
	$html2.="<tr><td>Father</td><td>Rakesh Agrawal</td><td>20 Yr</td></tr>";
	$html2.="<tr><td>Father</td><td>Rakesh Agrawal</td><td>20 Yr</td></tr>";
	$html2.="<tr><td>Father</td><td>Rakesh Agrawal</td><td>20 Yr</td></tr>";
	$html2.="<tr><td>Father</td><td>Rakesh Agrawal</td><td>20 Yr</td></tr>";
	$html2.="<tr><td>Father</td><td>Rakesh Agrawal</td><td>20 Yr</td></tr>";
	$html2.="<tr><td>Father</td><td>Rakesh Agrawal</td><td>20 Yr</td></tr>";
	
	$html2.="</table>";
	
	$html2.="</div><div style='display:block;padding:10px;background: transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box;'><span style='display:block;font-family: Comfortaa, cursive;text-align:center;font-size:18px;color:white'>Corporate Office</span><span style='display:block;font-family: Comfortaa, cursive;text-align:center;font-size:14px;margin-top:3px;color:white'>$co_address</span></div></div>";
	
	
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
		$plan_id=$_GET['plan_id'];
		$query=mysqli_query($con,"select * from users where id='$member_id'");
		$res=mysqli_fetch_array($query);
		$name=$res['name'];
		
		$query=mysqli_query($con,"select * from health_package_detail where id='$plan_id'");
		$res=mysqli_fetch_array($query);
		$duration=$res['duration'];
		$valid_till=date('d, M Y', strtotime("+$duration months", strtotime($joining_date)));
	?>
    <div class="page-content-wrapper py-3">
		<div class="container">
			<div class="row" style="align-items:center;height:100vh">
				<div class="col-md-12">
					<center><img src="img/icons/success2.png" style="height:150px;"></center>
					<p style="text-align:center;margin-top:20px;letter-spacing:1px;font-size:15px;">Congratulations <img src="img/icons/congratulation.png" style="height:30px;vertical-align:sub;"><img src="img/icons/congratulation.png" style="height:30px;vertical-align:sub;"> Mr. <?=$name;?> has been successfully subscribed for <b>Mudra Health Care</b> - <?=$duration;?> month plan.</br></br> This plan is valid till <b><?=$valid_till;?></b></p>
				</div>
				<div class="col-lg-12 col-12" >
					<a class="know-more" onclick="downloadHealthFrontCard(event)"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;&nbsp;Download Health Front Card</a>
					<a class="consult-now" onclick="downloadHealthBackCard(event)"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;&nbsp;Download Health Back Card</a>
					<center><a href="home.php" class="consult-now" style="width:80%;margin-top:30px;background: transparent linear-gradient(180deg,#04BDBD 0,#008080 100%) 0 0 no-repeat padding-box;">Go To Home</a></center>
				</div>
			</div>
		</div>
	</div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
	<form method="post" id="download-front-form" action="download-from-card.php" style="opacity:0;">
		<input type="hidden" name="my_hidden" id="my_hidden">
		<input type="hidden" name="file_name" value="<?=$front_file_name;?>">
		<input type="hidden" name="member_id" value="<?=$_COOKIE['member_id'];?>">
		<input type="hidden" name="plan_id" value="<?=$_GET['plan_id'];?>">
		<div id="front-card" style="width:550px;">
			<?php echo $html ?>
		</div>
	</form>		
	<form method="post" id="download-back-form" action="download-from-card.php" style="opacity:0;">
		<input type="hidden" name="my_hidden" id="my_hidden2">
		<input type="hidden" name="file_name" value="<?=$back_file_name;?>">
		<input type="hidden" name="member_id" value="<?=$_COOKIE['member_id'];?>">
		<input type="hidden" name="plan_id" value="<?=$_GET['plan_id'];?>">
		<div id="back-card" style="width:550px;">
			<?php echo $html2 ?>
		</div>
	</form>	
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
		function continue_to_success()
			{
				var member_id=$("#member").val();
				var to_pay=$("#to_pay").val();
				window.location.href="payment-mode.php?member_id="+member_id+"&to_pay="+to_pay;
			}
			
	</script>
	<script type="text/javascript" src="js/html2canvas.min.js"></script>
	<script>
		function downloadHealthFrontCard(e)
			{
				e.preventDefault();
				const screenshotTarget=document.getElementById("front-card");
				html2canvas(screenshotTarget).then((canvas)=>{
				const base64image = canvas.toDataURL("image/png");
				document.getElementById('my_hidden').value = canvas.toDataURL('image/png');
				document.forms["download-front-form"].submit();
				});
				
			}
		function downloadHealthBackCard(e)
			{
				e.preventDefault();
				const screenshotTarget=document.getElementById("back-card");
				html2canvas(screenshotTarget).then((canvas)=>{
				const base64image = canvas.toDataURL("image/png");
				document.getElementById('my_hidden2').value = canvas.toDataURL('image/png');
				document.forms["download-back-form"].submit();
				});
				
			}	
	</script>
  </body>
</html>