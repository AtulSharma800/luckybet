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
    <title>Doctor Detail || <?=$co_name;?></title>
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
	<link rel="stylesheet" href="plugin/vertical-timeline-master/assets/css/style.css">
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
				font-size: 13px !important;
				padding: 10px 15px !important;
				text-decoration: none;
				background: transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box;
				box-shadow: 0 3px 6px #00000029;
				width:48%;
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
		$doctor_id=$_GET['doctor_id'];
		$query=mysqli_query($con,"select * from doctor where id='$doctor_id'");
		$res=mysqli_fetch_array($query);
		$doctor_name=$res['name'];
		$doctor_description="You can instantly consult $doctor_name on the $co_name, and avail a free follow-up.";
		$doctor_link="$co_website_url"."doctor-detail.php?doctor_id=$doctor_id";
		
		$speciality_id=$res['speciality'];
		$query3=mysqli_query($con,"select * from speciality where id='$speciality_id'");
		$res3=mysqli_fetch_array($query3);
		$speciality=$res3['name'];
		
		$hospital_id=$res['hospital'];
		$query2=mysqli_query($con,"select * from hospital where id='$hospital_id'");
		$res2=mysqli_fetch_array($query2);
		$city_id=$res2['city'];
		$query3=mysqli_query($con,"select * from geo_locations where id='$city_id'");
		$res3=mysqli_fetch_array($query3);
		$city=$res3['name'];
		
		$language=unserialize($res['language']);
		$languages=implode(",",$language);
		
		$additional_speciality_text="";
		$additional_specialitys=unserialize($res['additional_speciality']);
		foreach($additional_specialitys as $speciality_id)
			{
				$query3=mysqli_query($con,"select * from speciality where id='$speciality_id'");
				$res3=mysqli_fetch_array($query3);
				$speciality=$res3['name'];
				$additional_speciality_text.=$speciality.", ";
			}
			
	?>
    <div class="page-content-wrapper py-3" style="margin-top:0px;padding-top:0px !important;">
		<div class="weekly-best-seller-area py-3" style="padding-top:0px !important">
			<div class="container"  style="background:url('img/bg-pattern3.jpg');background-size:cover;background-repeat:no-repeat;padding:30px;padding-bottom:60px;">
				<div class="row">
					<div class="col-lg-12 col-12">
						<div class="back-button"><a onclick="history.back()" style="padding: 6px 10px;border-radius: 50%;    box-shadow: 2px 2px 4px grey;color: black;background:white;"><i class="fa fa-angle-left" aria-hidden="true"></i></a></div>
						<center><img src="admin/upload/doctor/<?=$res['profile'];?>" style="height: 110px;width: 110px;object-fit: cover; border-radius: 50%;border: 1px solid #e0e3e6;"></center>
					</div>
				</div>		
			</div>
			<div class="container" style="margin-top:-30px;">
				<div class="row">
					<div class="col-lg-12 col-12">
						<div style="background: white;box-shadow: 4px 4px 4px 0px lightgrey;padding: 12px;   border-radius: 10px;">
							<p style="letter-spacing:1px;text-transform: uppercase; font-size: 15px;margin-bottom:5px;"><img src="img/icons/certificate.png" style="width:18px;">&nbsp;&nbsp;<?=$res['id_no'];?></p>
							<h5 style="font-size:19px;letter-spacing:1px;margin-bottom:3px;"><?=$res['name'];?><span style='color: white;text-align: center; background: teal;border-radius: 5px;padding: 5px 10px;display:inline-block;font-size:11px;float:right;'><?=$res['exp'];?> years exp</span></h5>
							<p class="single-line" style="font-size:14px;margin-bottom:10px;"><?=$speciality;?></p>
							<div class="row">
								<div class="col-lg-9 col-9">
									<p style='margin-bottom:5px;'><img src="admin/upload/hospital/<?=$res2['image'];?>" style="height: 21px;object-fit: contain;vertical-align:inherit;"><span style="height:21px;display:inline-block;border-right:1.5px solid #e0e3e6;margin-left:12px;margin-right:12px;vertical-align:super;">&nbsp;</span><span style='font-size:0.7em;display:inline-block;'><span class="single-line" style="color:#000000;font-size:12px;"><?=$res2['name'];?></span><span><?=$city;?></span></span></p>
								</div>
								<div class="col-lg-3 col-3">
									<p style="color: black; text-align: right; font-size: 16px;">₹<?=$res['fees'];?></p>
								</div>
							</div>	
						</div>	
					</div>
				</div>
			</div>
			
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-12">
						<section class="cd-timeline js-cd-timeline" style="background:transparent;padding-bottom:5px;">
							<div class="container cd-timeline__container" style="max-width: 100%;margin-left: 0px;margin-right: 0px;padding-top:0px;padding-bottom:0px;">
							  <div class="cd-timeline__block">
								<div class="cd-timeline__img cd-timeline__img--picture">
								  <i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:20px;color:#ED0A0A;"></i>
								</div> <!-- cd-timeline__img -->

								<div class="cd-timeline__content text-component" style="padding-bottom:5px;">
								  <h6 style="letter-spacing:1px;margin-bottom:12px;font-size:17px;">My Education</h6>
								  <?php
									$query2=mysqli_query($con,"select * from education_history where doctor_id='$doctor_id'");
									while($res2=mysqli_fetch_array($query2))
										{
								  ?>
											<p class="color-contrast-medium" style="margin-bottom:3px;color:black;font-size:16px;"><?=$res2['name'];?></p>
											<p class="color-contrast-medium"><?=$res2['university'];?></p>
								  <?php
										}
								  ?>
									<hr style="background-color:lightgray;margin-top:0px;opacity:0.25">
								</div> <!-- cd-timeline__content -->
							  </div> <!-- cd-timeline__block -->
							
							  <div class="cd-timeline__block">
								<div class="cd-timeline__img cd-timeline__img--picture">
								  <i class="fa fa-lightbulb-o" aria-hidden="true" style="font-size:20px;color:#ED0A0A"></i>
								</div> <!-- cd-timeline__img -->

								<div class="cd-timeline__content text-component" style="padding-bottom:0px;">
								  <h6 style="letter-spacing:1px;margin-bottom:5px;">Additional Specialisations</h6>
								  <p class="color-contrast-medium"><?=trim($additional_speciality_text,", ");?></p>
								  <hr style="background-color:lightgray;margin-top:0px;opacity:0.25">
								</div> <!-- cd-timeline__content -->
							  </div>
							
							  <div class="cd-timeline__block">
								<div class="cd-timeline__img cd-timeline__img--picture">
								  <i class="fa fa-language" aria-hidden="true" style="font-size:20px;color:#ED0A0A"></i>
								</div> <!-- cd-timeline__img -->

								<div class="cd-timeline__content text-component" style="padding-bottom:0px;">
								  <h6 style="letter-spacing:1px;margin-bottom:5px;">I can speak</h6>
								  <p class="color-contrast-medium"><?=$languages;?></p>
								</div> <!-- cd-timeline__content -->
							  </div> <!-- cd-timeline__block -->
							</div>
						  </section> 	
					</div>
				</div>
			</div>
			<hr style="background-color:lightgray;margin-top:0px;opacity:0.25">
			<?php
				$hospital_id=$res['hospital'];
				$query2=mysqli_query($con,"select * from hospital where id='$hospital_id'");
				$res2=mysqli_fetch_array($query2);
				$hospital_name=$res2['name'];
			?>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-12">
						<h6 style="margin-bottom:15px;font-size:18px;"><span style="display:inline-block;width:calc(100% - 65px);vertical-align:sub"><?=$res2['name'];?></span><span style="display:inline-block;float:right;"><img src="admin/upload/hospital/<?=$res2['image'];?>" style="height: 40px;object-fit: contain;vertical-align:inherit;"></span></h6>
						<h6 style="margin-top:25px;">Established in <?=$res2['year'];?><span style="float:right;"><?=$res2['doctors'];?> Doctors</span></h6>
						<div style="font-size:14px;"><?=$res2['description'];?></div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-12" style="padding: 15px;position: fixed;bottom: 0px;background: white;z-index: 9999;">
				<span class="know-more" onclick="open_share_box()"><i class="fa fa-share-alt" aria-hidden="true"></i>&nbsp;&nbsp;Recommend</span>
				<a href="consult-now.php?doctor_id=<?=$res['id'];?>"><span class="consult-now">Consult Now</span></a>
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
	<script src="plugin/vertical-timeline-master/assets/js/main.js"></script>
	<div class="share-box">
		<div class="share-sub-box">
			<p style="color:black;font-size:18px;">Recommend <?=$res['name'];?><span style="float: right;display: inline-block;color: #ED0A0A;font-size: 28px;margin-top: -6px;" onclick="close_share_box()"><i class="fa fa-times-circle-o" aria-hidden="true"></i></span></p>
			<p style="margin-top:25px;"><?=$res['name'];?> from <?=$hospital_name;?> is one of the top <?=$speciality;?> in the country.</p>
			<p>I recommend her for any relevant health concerns.</p>
			<p>You can instantly consult <?=$res['name'];?> on the <?=$co_name;?>, and avail a free follow-up.</p>
			</br>
			<p style='text-align:center;color:black;'><span class="share share_button">Share</span></p>
		</div>
	</div>
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
				$("#search_for_text_main").html("<input type='text' class='form-control' name='search_doctor' id='search_doctor' style='display:inline-block;width:calc(100% - 20px);height:23px;border:none;padding-left:10px;' onblur='hide_input_box()'>");
				$("#search_doctor").focus();
			}
		function hide_input_box()
			{
				$("#search_for_text_main").attr("onclick","show_input_box()");
				$("#search_for_text_main").html("<span>&nbsp;&nbsp;Search For :&nbsp;&nbsp;&nbsp;</span><span class='search_for'><span class='sub_search_for'>locations<span style='float:right;'><i class='fa fa-map-marker' aria-hidden='true'></i></span></span></span></span>");
			}	
		function open_share_box()
			{
				$(".share-box").slideDown(1000);
				$(".share-box").css("display","block");
			}
		function close_share_box()
			{
				$(".share-box").slideUp(500);
			}	
		async function AndroidNativeShare(Title,URL,Description)
			{
				if(typeof navigator.share==='undefined' || !navigator.share)
					{
						alert('Your browser does not support Android Native Share');
					} 
				else 
					{
						const TitleConst = Title;
						const URLConst = URL;
						const DescriptionConst = Description;
						try
							{
								await navigator.share({title:TitleConst, text:DescriptionConst, url:URLConst});
							} 
						catch (error) 
							{
								console.log('Error sharing: ' + error);
								return;
							}   
					}
			} 

			$(".share_button").click(function(){
				AndroidNativeShare('<?=$doctor_name;?>', '<?=$doctor_link;?>','<?=$doctor_description;?>'); 
			});	
	</script>
	
  </body>
</html>