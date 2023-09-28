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
    <title>Search Doctors || <?=$co_name;?></title>
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
				font-size: 12px;
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
		.consult-now
			{
				border: 1px solid #A7CC79;
				border-radius: 10px;
				color: #fff !important;
				font-size: 12px !important;
				padding: 10px 15px !important;
				text-decoration: none;
				background: transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box;
				box-shadow: 0 3px 6px #00000029;
				width:48%;
				display:inline-block;
				text-align:center;
				margin-left:1%;
			}
		.know-more
			{
				border: 1px solid #EBF9DA;
				border-radius: 10px;
				color: #ED0A0A !important;
				font-size: 12px !important;
				padding: 10px 15px !important;
				text-decoration: none;
				background: transparent linear-gradient(180deg,#F2FBE7 0,#EBF9DA 100%) 0 0 no-repeat padding-box;
				box-shadow: 0 3px 6px #00000029;
				width:48%;
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
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a onclick="history.back()"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0"><a href="home.php"><img src="img/mudra-logo.png" alt="<?=$co_name;?>" style="max-height:40px;"></a></h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas"><span></span><span></span><span></span></div>
      </div>
    </div>
    <div class="page-content-wrapper py-3">
      <div class="weekly-best-seller-area py-3" style="padding-top:0px !important;">
		<div class="container" style="margin-bottom:15px;" id="input-box" >
			<p style="border:1px solid #E4E4E4;border-radius:20px;padding:10px 15px;color:#ED0A0A;" ><i class="fa fa-search" aria-hidden="true" style="font-size: 16px;color: #E4E4E4;"></i><input type='text' class='form-control' name='search_doctor' id='search_doctor' style='display:inline-block;width:calc(100% - 50px);height:23px;border:none;padding-left:10px;' value="<?=$_GET['a'];?>"><span class='back-button' style='display:inline-block'><a onclick='find_doctors()' style='padding: 7px 10px;border-radius: 50%; color: white;background:#ED0A0A;'><i class='fa fa-chevron-right' aria-hidden='true'></i></a></span></p>
		</div>	
		
		<div class="container" onclick='hide_input_box()' style="margin-bottom:0px;background:#F0FAE4;padding:20px;border-radius:15px 15px 0px 0px;height:100vh;overflow-y:auto;position:fixed;padding-bottom:140px;">
		  <div class="d-flex align-items-center justify-content-between mb-3" >
			<p style='color:#000000;width:100%;font-size:14px;margin-bottom:0px;' id='searching-text'>Showing earliest available doctors near you</p>
		  </div>
		  <div class="row g-3">
				<?php
					if(isset($_GET['speciality_id']))
						{
							$speciality_id=$_GET['speciality_id'];
							$a='i:.*;s:.*:"'.$speciality_id.'";';
							$query=mysqli_query($con,"select * from doctor where speciality='".$_GET['speciality_id']."' or additional_speciality REGEXP '$a'");
						}
					while($res=mysqli_fetch_array($query))
						{
							$hospital_id=$res['hospital'];
							$query2=mysqli_query($con,"select * from hospital where id='$hospital_id'");
							$res2=mysqli_fetch_array($query2);
							$city_id=$res2['city'];
							$query3=mysqli_query($con,"select * from geo_locations where id='$city_id'");
							$res3=mysqli_fetch_array($query3);
							$city=$res3['name'];
							
							$speciality_id=$res['speciality'];
							$query3=mysqli_query($con,"select * from speciality where id='$speciality_id'");
							$res3=mysqli_fetch_array($query3);
							$speciality=$res3['name'];
							$language=unserialize($res['language']);
							$languages=implode(",",$language);
							
				?>
							<div class="col-lg-12" style="background:white;padding:10px;border-radius:15px;">
								<div class='row'>
									<div class="col-lg-5 col-5">
										<img src="admin/upload/doctor/<?=$res['profile'];?>" style="height: 130px;width: 100%;object-fit: cover; border-radius: 15px;border: 1px solid #e0e3e6;">
										<p style="text-align:center;"> <span style='color: white;text-align: center; background: teal;border-radius: 5px;padding: 2px 10px;margin-top: 8px;display:inline-block;font-size:11px;'><?=$res['exp'];?> years exp</span></p>
									</div>
									<div class="col-lg-7 col-7" style="padding-left:0px;">
										<p style='color:#000000;margin-bottom:5px;'><img src="admin/upload/hospital/<?=$res2['image'];?>" style="height: 21px;object-fit: contain;vertical-align:inherit;"><span style="height:21px;display:inline-block;border-right:1.5px solid #e0e3e6;margin-left:12px;margin-right:12px;vertical-align:super;">&nbsp;</span><span style='font-size:0.7em;display:inline-block;'><span class="single-line"><?=$res2['name'];?></span><span><?=$city;?></span></span></p>
										<h6 style="font-size:14px;margin-bottom:2px;"><?=$res['name'];?></h6>
										<p class="single-line" style="font-size:11px;margin-bottom:2px;"><?=$res['education'];?></p>
										<p class="single-line" style="font-size:11px;color:black;margin-bottom:4px;"><?=$speciality;?></p>
										<p class="single-line" style="font-size:11px;color:black;margin-bottom:5px"><i class="fa fa-language" aria-hidden="true" style="color:#ED0A0A;font-size:15px;vertical-align:bottom;"></i>&nbsp;&nbsp;<?=$languages;?></p>
										<p style='color:black;'>₹<?=$res['fees'];?></p>
									</div>
									<div class="col-lg-12 col-12">
										<a href="doctor-detail.php?doctor_id=<?=$res['id'];?>"><span class="know-more"><i class="fa fa-play-circle" aria-hidden="true"></i>&nbsp;&nbsp;Know More</span></a>
										<span class="consult-now">Consult Now</span>
									</div>
								</div>
							</div>
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
		var text_count=1;
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
		function change_search_for_text()
			{
				text_count++;
				if(text_count>5)
					{
						text_count=1;
					}
				if(text_count==1)
					{
						//$(".sub_search_for").fadeOut(500);
						$(".sub_search_for").html("doctors<span style='float:right;'><i class='fa fa-user-md' aria-hidden='true'></i></span>");
						$(".sub_search_for").fadeIn(1000);
					}
				else if(text_count==2)
					{
						//$(".sub_search_for").fadeOut(1000);
						$(".sub_search_for").html("specialities<span style='float:right;'><i class='fa fa-stethoscope' aria-hidden='true'></i></span>");
						$(".sub_search_for").fadeIn(1000);
					}
				else if(text_count==3)
					{
						//$(".sub_search_for").fadeOut(1000);
						$(".sub_search_for").html("languages<span style='float:right;'><i class='fa fa-language' aria-hidden='true'></i></span>");
						$(".sub_search_for").fadeIn(1000);
					}	
				else if(text_count==4)
					{
						//$(".sub_search_for").fadeOut(1000);
						$(".sub_search_for").html("locations<span style='float:right;'><i class='fa fa-map-marker' aria-hidden='true'></i></span>");
						$(".sub_search_for").fadeIn(1000);
					}	
				else if(text_count==5)
					{
						//$(".sub_search_for").fadeOut(1000);
						$(".sub_search_for").html("hospitals<span style='float:right;'><i class='fa fa-hospital-o' aria-hidden='true'></i></span>");
						$(".sub_search_for").fadeIn(1000);
					}	
				
			}		
		$(document).ready(function()
			{
				
				setInterval(function(){change_search_for_text();},1500);
			});
		function show_input_box()
			{
				$("#search_for_text_main").removeAttr("onclick");
				$("#search_for_text_main").html("<input type='text' class='form-control' name='search_doctor' id='search_doctor' style='display:inline-block;width:calc(100% - 50px);height:23px;border:none;padding-left:10px;' ><div class='back-button' style='display:inline-block'><a onclick='find_doctors()' style='padding: 7px 10px;border-radius: 50%; color: white;background:#ED0A0A;'><i class='fa fa-chevron-right' aria-hidden='true'></i></a></div>");
				$("#input-box").focus();
				$("#search_doctor").focus();
			}
		function hide_input_box()
			{
				//alert("Mohit");
				$("#search_for_text_main").attr("onclick","show_input_box()");
				$("#search_for_text_main").html("<span>&nbsp;&nbsp;Search For :&nbsp;&nbsp;&nbsp;</span><span class='search_for'><span class='sub_search_for'>locations<span style='float:right;'><i class='fa fa-map-marker' aria-hidden='true'></i></span></span></span></span>");
			}
		function find_doctors()
			{
				if($("#search_doctor").val().length>0)
					{
						var a=encodeURIComponent$("#search_doctor").val());
						window.location.href="search-doctor.php?a="+a;
					}
			}	
			
	</script>
  </body>
</html>