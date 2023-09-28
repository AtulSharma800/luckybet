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
    <meta name="description" content="Consult Now">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Consult Now || <?=$co_name;?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
	<link rel="stylesheet" href="plugin/toast/toast.style.min.css">
	<style>
		.active-time-slot
			{
				background: transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box !important;
				color:white !important;
			}
		#bottom-loader
			{
				display:none;
			}
		.get-appointment
			{
				border: 1px solid #A7CC79;
				border-radius: 10px;
				color: #fff !important;
				font-size: 17px !important;
				padding: 8px 15px !important;
				text-decoration: none;
				background: transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box;
				box-shadow: 0 3px 6px #00000029;
				width:98%;
				display:inline-block;
				text-align:center;
				letter-spacing:1px;
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
        <div class="back-button"><a onclick="history.back()">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Consult Now</h6>
        </div>
        <!-- Filter Option-->
        <div class="filter-option">
          &nbsp;
        </div>
      </div>
    </div>
    <?php
		$doctor_id=$_COOKIE['doctor_id'];
		include("common/sidebar2.php");
		$current_date=date("Y-m-d");
		$current_day=date("l");
	?>
    <div class="page-content-wrapper">
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
			<div class="product-catagories">
				<form method="post" id="appointment-form">
					<div class="row g-3">
						<div class="col-md-12">
							<div class="form-group" style="margin-bottom:20px;margin-top:10px;">
								<label style="margin-bottom:10px;">Appointment Date</label>
								<input type="date" name="appointment_date" id="appointment_date" class="form-control" value="<?=$current_date;?>" onchange="get_preferred_time(<?=$_GET['doctor_id'];?>)">
							</div>
							<div class="form-group">
								<label style="margin-bottom:10px;">Choose Preferred Time Slot</label>
								<input type="hidden" name="preferred_time" id="preferred_time">
								<input type="hidden" name="doctor_id" id="doctor_id" value="<?=$_GET['doctor_id'];?>">
								<p style="margin-top:15px;" id="result-box">
									<?php
										$i=1;
										$query=mysqli_query($con,"select * from doctor_schedule where doctor_id='$doctor_id' and appointment_date='$current_date'");
										$num=mysqli_num_rows($query);
										if($num>0)
											{
												while($res=mysqli_fetch_array($query))
													{
														$a=date_create_from_format("H:i",$res['from_time']);
														$from=date_format($a,"h:i a");
														$b=date_create_from_format("H:i",$res['to_time']);
														$to=date_format($b,"h:i a");
														echo "<a onclick='select_this_time_slot($i)' style='cursor:pointer;padding:6px 20px;background:#D8EDC2;color:black;margin-right:10px;margin-bottom:10px;font-size:14px;letter-spacing:1px;border-radius:5px;display:inline-block;box-shadow:1px 1px 1px 1px lightgray;font-weight:500' id='time-slot-$i' class='time-slot'>$from - $to</a>";
														$i++;
													}
											}
										else
											{										
												$query=mysqli_query($con,"select * from doctor_timing where doctor_id='$doctor_id' and appointment_day='$current_day'");
												$num=mysqli_num_rows($query);
												if($num>0)
													{
														while($res=mysqli_fetch_array($query))
															{
																$a=date_create_from_format("H:i",$res['from_time']);
																$from=date_format($a,"h:i a");
																$b=date_create_from_format("H:i",$res['to_time']);
																$to=date_format($b,"h:i a");
																echo "<a onclick='select_this_time_slot($i)' style='cursor:pointer;padding:6px 20px;background:#D8EDC2;color:black;margin-right:10px;margin-bottom:10px;font-size:14px;letter-spacing:1px;border-radius:5px;display:inline-block;box-shadow:1px 1px 1px 1px lightgray;font-weight:500' id='time-slot-$i' class='time-slot'>$from - $to</a>";
																$i++;
															}
													}
											}
									?>
								</p>
							</div>
							<div class="form-group" style="margin-bottom:20px;margin-top:10px;">
								<label style="margin-bottom:10px;">Tell Your Problem</label>
								<textarea name="problem" id="problem" class="form-control" placeholder="Tell your problem" style="height:120px"></textarea>
							</div>
						</div>					
					</div>
				</form>	
			</div>
			<div class="col-lg-12 col-12" style="padding: 15px;position: fixed;bottom: 0px;background: white;z-index: 9999;left:0px;">
				<center><span class="get-appointment" onclick="get_appointment()">Get Appointment</span></center>
			</div>
			
        </div>
      </div>
    </div>
	<div class="page-loader" id="page-loader">
		<img src="img/icons/heart.gif" style="height:80px;border-radius:15px;">
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
	<script src="plugin/slick-master/slick/slick.js" type="text/javascript" charset="utf-8"></script>
	<script src="plugin/toast/toast.script.js"></script>
	<script type="text/javascript">
		function get_preferred_time(doctor_id)
			{
				$(".page-loader").css("display","flex");
				var a=encodeURIComponent($("#appointment_date").val());
				$.ajax({
					url: "ajax/show-preferred-time.php?a="+a+"&doctor_id="+doctor_id,
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
		function get_appointment(doctor_id)
			{
				$(".page-loader").css("display","flex");
				var Form=$('#appointment-form')[0];
				$.ajax({
					url: "ajax/place-appointment.php",
					type: "POST",
					data:  new FormData(Form),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data)
					{
						$(".page-loader").css("display","none");
						var a=JSON.parse(data);
						var appointment_id=a.appointment_id;
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
								setTimeout(function(){window.location.href='appointment-success.php?appointment_id='+appointment_id;},1000);
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
		function select_this_time_slot(id)
			{
				$(".time-slot").removeClass("active-time-slot");
				$("#time-slot-"+id).addClass("active-time-slot");
				var time_slot=$("#time-slot-"+id).html();
				$("#preferred_time").val(time_slot);
			}		
	</script>
  </body>
</html>