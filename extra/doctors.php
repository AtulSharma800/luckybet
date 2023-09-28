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
    <title>Doctors || <?=$co_name;?></title>
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
		.see-all
			{
				border: 1px solid white;
				border-radius: 10px;
				color: #ED0A0A !important;
				font-size: 14px !important;
				font-weight:bold;
				padding: 10px 15px !important;
				text-decoration: none;
				background: white;
				box-shadow: 0 3px 6px #00000029;
				display:inline-block;
				margin-right:1%;
				text-align:center;
				letter-spacing:1px;
			}	
		.input-box-p
			{
				border:1px solid #E4E4E4 !important;
				border-radius:20px !important;
				padding:10px 15px !important;
				color:#ED0A0A !important;
			}
		.input-box .fa-search
			{
				font-size: 16px !important;
				color: #E4E4E4 !important;
			}
		.result-box
			{
				margin-bottom:0px !important;
				background:#F0FAE4 !important;
				border-radius:15px 15px 0px 0px !important;
				height:100vh !important;
				overflow-y:auto !important;
				position:fixed !important;
				padding-bottom:140px !important;
				padding:0px;
			}
		#searching-text
			{
				color:#000000 !important;
				width:100% !important;
				font-size:14px !important;
				margin-bottom:0px !important;
			}
		.doctor-box
			{
				background:white !important;
				padding:10px !important;
				border-radius:15px !important;
			}
		.doctor-box .profile-pic
			{
				height: 130px !important;
				width: 100% !important;
				object-fit: cover !important; 
				border-radius: 15px !important;
				border: 1px solid #e0e3e6 !important;
			}
		.doctor-box .experience	
			{
				color: white !important;
				text-align: center !important; 
				background: teal !important;
				border-radius: 5px !important;
				padding: 2px 10px !important;
				margin-top: 8px !important;
				display:inline-block !important;
				font-size:11px !important;
			}
		.doctor-box .doctor-sub-box
			{
				padding-left:0px !important;
			}
		.doctor-box .doctor-sub-box .hospital	
			{
				color:#000000 !important;
				margin-bottom:5px !important;
			}
		.doctor-box .doctor-sub-box .hospital img	
			{
				height: 21px !important;
				object-fit: contain !important;
				vertical-align:inherit !important;
			}
		.doctor-box .doctor-sub-box .hospital .devider	
			{
				height:21px !important;
				display:inline-block !important;
				border-right:1.5px solid #e0e3e6 !important;
				margin-left:12px !important;
				margin-right:12px !important;
				vertical-align:super !important;
			}
		.doctor-box .doctor-sub-box .hospital .name
			{
				font-size:0.7em !important;
				display:inline-block !important;
			}	
		.doctor-box .doctor-sub-box .doctor-name
			{
				font-size:14px !important;
				margin-bottom:2px !important;
			}
		.doctor-box .doctor-sub-box .education
			{
				font-size:11px !important;
				margin-bottom:2px !important;
			}
		.doctor-box .doctor-sub-box .speciality
			{
				font-size:11px !important;
				color:black !important;
				margin-bottom:4px !important;
			}
		.doctor-box .doctor-sub-box .language
			{
				font-size:11px !important;
				color:black !important;
				margin-bottom:5px !important;
			}
		.doctor-box .doctor-sub-box .language .fa-language
			{
				color:#ED0A0A !important;
				font-size:15px !important;
				vertical-align:bottom !important;
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
			<p class="input-box-p" >
				<i class="fa fa-search" aria-hidden="true"></i>
				<span id="search_for_text_main" onclick="show_input_box()">
					<span>&nbsp;&nbsp;Search For :&nbsp;&nbsp;&nbsp;</span><span class='search_for'><span class="sub_search_for">locations<span style='float:right;'><i class="fa fa-map-marker" aria-hidden="true"></i></span></span></span>
				</span>
			</p>
		</div>	
		
		<div class="container result-box" onclick='hide_input_box()' id="result-box">
			<?php
				if(isset($_GET['speciality_id']))
					{
						$speciality_id=$_GET['speciality_id'];
						$a='i:.*;s:.*:"'.$speciality_id.'";';
						$query=mysqli_query($con,"select * from doctor where speciality='".$_GET['speciality_id']."'");
					}
				else if(isset($_GET['symptom_id']))
					{
						$symptom_id=$_GET['symptom_id'];
						$a='i:.*;s:.*:"'.$symptom_id.'";';
						$query=mysqli_query($con,"select * from doctor where symptoms REGEXP '$a'");
					}	
				else if(isset($_GET['hospital_id']))
					{
						$hospital_id=$_GET['hospital_id'];
						$query=mysqli_query($con,"select * from doctor where hospital='$hospital_id'");
					}
				$num=mysqli_num_rows($query);
				if($num>0)	
					{
			?>
				<div class="d-flex align-items-center justify-content-between mb-3" style="padding: 0px 20px;padding-top: 20px;">
					<p id='searching-text'>Showing earliest available doctors near you</p>
				</div>
				<div class="row g-3" style="padding:0px 20px;">
					<?php
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
								<div class="col-lg-12 doctor-box">
									<div class='row'>
										<div class="col-lg-5 col-5">
											<img src="admin/upload/doctor/<?=$res['profile'];?>" class="profile-pic">
											<p style="text-align:center;"> <span class="experience"><?=$res['exp'];?> years exp</span></p>
										</div>
										<div class="col-lg-7 col-7 doctor-sub-box">
											<p class="hospital"><img src="admin/upload/hospital/<?=$res2['image'];?>"><span class="devider">&nbsp;</span><span class="name"><span class="single-line"><?=$res2['name'];?></span><span><?=$city;?></span></span></p>
											<h6 class='doctor-name'><?=$res['name'];?></h6>
											<p class="single-line education"><?=$res['education'];?></p>
											<p class="single-line speciality"><?=$speciality;?></p>
											<p class="single-line language"><i class="fa fa-language" aria-hidden="true"></i>&nbsp;&nbsp;<?=$languages;?></p>
											<p style='color:black;'>₹<?=$res['fees'];?></p>
										</div>
										<div class="col-lg-12 col-12">
											<a href="doctor-detail.php?doctor_id=<?=$res['id'];?>"><span class="know-more"><i class="fa fa-play-circle" aria-hidden="true"></i>&nbsp;&nbsp;Know More</span></a>
											<a href="consult-now.php?doctor_id=<?=$res['id'];?>"><span class="consult-now">Consult Now</span></a>
										</div>
									</div>
								</div>
					<?php
							}						
					?>
				</div>
			<?php
					}
				else
					{
			?>
						<div class="row" style="padding:0px 20px; padding-top:30px;padding-bottom:20px">
							<div class="col-12">
								<center><img src="img/icons/male-doctor.png" style="width:60px"> &nbsp;&nbsp;<img src="img/icons/female-doctor.png" style="width:60px"> &nbsp;&nbsp;<img src="img/icons/surgeon.png" style="width:60px"></center>
								<p style="text-align:center;margin-top:20px;font-size:16px;">Sorry, we couldn't find any doctors that matches your search. </p>
								<?php
									if(isset($_GET['speciality_id']))
										{
								?>
											<p style="text-align:center;"><a href="doctors.php?speciality_id=<?=$speciality_id;?>"><span class="see-all">See all doctors</span></a></p>
								<?php
										}
									else if(isset($_GET['symptom_id']))
										{
								?>
											<p style="text-align:center;"><a href="doctors.php?symptom_id=<?=$symptom_id;?>"><span class="see-all">See all doctors</span></a></p>
								<?php
										}
									else if(isset($_GET['hospital_id']))
										{
								?>
											<p style="text-align:center;"><a href="doctors.php?hospital_id=<?=$hospital_id;?>"><span class="see-all">See all doctors</span></a></p>
								<?php
										}								
								?>			
							</div>
						</div>
		<?php	
					}
		  ?>
		</div>
      </div>
	  
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
				$("#search_for_text_main").html("<input type='text' class='form-control' name='search_doctor' id='search_doctor' style='display:inline-block;width:calc(100% - 50px);height:23px;border:none;padding-left:10px;' ><div class='back-button' style='display:inline-block'><a onclick='find_doctors()' id='find-doctors-btn' style='padding: 7px 10px;border-radius: 50%; color: white;background:#ED0A0A;'><i class='fa fa-chevron-right' aria-hidden='true'></i></a></div>");
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
						$("#find-doctors-btn").html("<i class='fa fa-times' aria-hidden='true'></i>");
						$("#find-doctors-btn").css("background","tomato");
						$("#find-doctors-btn").attr("onclick","refresh_list()");
						$("#search_doctor").attr("onkeyup","restore_search_btn()");
						$(".page-loader").css("display","flex");
						var a=encodeURIComponent($("#search_doctor").val());
						$("#searching-text").html('showing result for <span style="color:#ED0A0A">"'+a+'"</span>');
						$.ajax({
							url: "ajax/show-doctors.php?a="+a+"&speciality_id=<?=$speciality_id;?>",
							type: "POST",
							data:  "",
							contentType: false,
							cache: false,
							processData:false,
							success: function(data)
							{
								$(".page-loader").css("display","none");
								$("#result-box").html(data);
							},
							error: function() 
							{
							} 	        
					   });
					}
			}
		function refresh_list()
			{
				window.location.href='doctors.php?speciality_id=<?=$speciality_id;?>';
			}		
		function restore_search_btn()
			{
				$("#find-doctors-btn").html("<i class='fa fa-chevron-right' aria-hidden='true'></i>");
				$("#find-doctors-btn").css("background","#ED0A0A");
				$("#find-doctors-btn").attr("onclick","find_doctors()");
			}		
	</script>
  </body>
</html>