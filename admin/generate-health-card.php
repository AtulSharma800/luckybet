<?php
	include("../db.php");
	include("common/check_login.php");
	include("../common-details.php");
	$member_id=$_GET['user_id'];
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
	$image="../img/mudra-card-logo.png";
	$qr_code="../images/qrcode/".$res['qrcode'];
	$html.="<div class='container' style='padding-left:0px;padding-right:0px;'><div style='display:block;width:100%;border-bottom:3px solid #005EA8;'><span style='display:block;padding:5px;'><img src='$image' style='width:200px;'><span style='float:right;font-family: Comfortaa, cursive; font-size:32px;margin-top:18px;color:#005EA8;'>Health Card</span></span></div><div style='display:block;width:100%;border-bottom:3px solid #005EA8;background:url(../img/card-bg.png);background-position:center;background-size:cover;height:240px;'><div style='display:inline-block;width:70%;padding:10px 10px;color:black'><span style='display:block;font-family: Comfortaa, cursive; font-size:24px;font-weight:bold;'>$name</span><span style='display:block;font-family: Comfortaa, cursive;margin-top:4px;'>$member_code</span><span style='display:block;font-family: Comfortaa, cursive;margin-top:25px;'><b style='color:#005EA8;display:inline-block;width:50px;'>DOB</b> : &nbsp;&nbsp; <span style='display:inline-block;width:calc(100% - 80px);vertical-align:text-top;'>$dob</span></span><span style='display:block;font-family: Comfortaa, cursive;margin-top:4px;'><b style='color:#005EA8;display:inline-block;width:50px;'>ADD</b> : &nbsp;&nbsp; <span style='display:inline-block;width:calc(100% - 80px);vertical-align:text-top;'>$address</span></span><span style='display:block;font-family: Comfortaa, cursive;margin-top:8px;font-size:18px;'><b style='display:inline-block;'>VALID TILL</b> : <span style='display:inline-block;'>$valid_till</span></span></div><div style='display:inline-block;width:30%;padding:10px;vertical-align:top;'><img src='$qr_code' style='width:100%;'></div></div></div><div style='display:block;padding:10px;background: transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box;'><span style='display:block;font-family: Comfortaa, cursive;text-align:center;font-size:22px;color:white'>Helpline No. 865-081-8008</span><span style='display:block;font-family: Comfortaa, cursive;text-align:center;font-size:22px;margin-top:3px;color:white'>https://play.google.com/store/apps/details?id=mudra.swasthya.seva</span></div></div>";
	
	
	
	$html2="<div style='width:550px; padding:0;display:block;box-shadow:2px 2px 4px lightgrey;' ><div class='container' style='padding-left:0px;padding-right:0px;'><div style='display:block;width:100%;border-bottom:3px solid #005EA8;'><span style='display:block;padding:5px;'><img src='$image' style='width:200px;'><span style='float:right;font-family: Comfortaa, cursive; font-size:32px;margin-top:18px;color:#005EA8;'>Health Card</span></span></div><div style='display:block;width:100%;border-bottom:3px solid #005EA8;background:url(../img/card-bg.png);background-position:center;background-size:cover;height:240px;padding:15px;'>";
	
	
	$html2.="<table style='width:100%;font-family: Comfortaa, cursive;padding:5px;color:black;'><tr style='font-size:20px;color:#005EA8;'><td>Relationship</td><td>Name</td><td>Age</td></tr>";
	if(!empty($res['nominee_name1']))
	    {
	        $html2.="<tr><td>".$res['nominee_relation1']."</td><td>".$res['nominee_name1']."</td><td>".$res['nominee_age1']." Yr</td></tr>";
	    }
	if(!empty($res['nominee_name2']))
	    {    
	        $html2.="<tr><td>".$res['nominee_relation2']."</td><td>".$res['nominee_name2']."</td><td>".$res['nominee_age2']." Yr</td></tr>";
	    }
	if(!empty($res['nominee_name3']))
	    {    
	        $html2.="<tr><td>".$res['nominee_relation3']."</td><td>".$res['nominee_name3']."</td><td>".$res['nominee_age3']." Yr</td></tr>";
	    }
	if(!empty($res['nominee_name4']))
	    {    
	        $html2.="<tr><td>".$res['nominee_relation4']."</td><td>".$res['nominee_name4']."</td><td>".$res['nominee_age4']." Yr</td></tr>";
	    }
	if(!empty($res['nominee_name5']))
	    {    
        	$html2.="<tr><td>".$res['nominee_relation5']."</td><td>".$res['nominee_name5']."</td><td>".$res['nominee_age5']." Yr</td></tr>";
	    }
	
	$html2.="</table>";
	
	$html2.="</div><div style='display:block;padding:10px;background: transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box;'><span style='display:block;font-family: Comfortaa, cursive;text-align:center;font-size:18px;color:white'>Corporate Office</span><span style='display:block;font-family: Comfortaa, cursive;text-align:center;font-size:14px;margin-top:3px;color:white'>$co_address</span></div></div></div>";
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jan 2021 12:06:00 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Generate Health Card :: <?=$co_name;?></title>

	<!-- Global stylesheets -->
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="global_assets/js/main/jquery.min.js"></script>
	<script src="global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="global_assets/js/plugins/forms/selects/select2.min.js"></script>

	<script src="assets/js/app.js"></script>
	<script src="global_assets/js/demo_pages/datatables_basic.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- /theme JS files -->
	<link rel="shortcut icon" href="<?=$co_favicon;?>"/>
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

	<!-- Main navbar -->
	<?php
		include("common/header.php");
	?>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<?php
			include("common/sidebar.php");
		?>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Genrate Health Card</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Generate Health Card</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">
				<!-- Dashboard content -->
				<div class="row">
					<div class="col-xl-12">

						<!-- Marketing campaigns -->
						<div class="card">
							<div class="card-header header-elements-sm-inline">
								<h6 class="card-title">Generate Health Cards</h6>
								<div class="header-elements">
									<a href="health-card.php"><span class="badge bg-success badge-pill">HEALTH CARDS</span></a>
								</div>
							</div>
						
							<div class="row">
								<div class="col-xl-6 col-md-6" style="transform:scale(0.6)">
									<?=$html;?>
									
					
								</div>
								
								<div class="col-xl-6 col-md-6" style="transform:scale(0.6)">
									<?=$html2;?>
									
								</div>
								<div class="col-xl-12 col-md-12">
									<p>
										<a class="know-more" onclick="downloadHealthFrontCard(event)"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;&nbsp;Download Health Front Card</a>
										<a class="consult-now" onclick="downloadHealthBackCard(event)"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;&nbsp;Download Health Back Card</a>
									</p>
								</div>
							</div>
						</div>
						<!-- /marketing campaigns -->


						<!-- Quick stats boxes -->
						
						<!-- /latest posts -->

					</div>

				</div>
				<!-- /dashboard content -->
			</div>
			<!-- /content area -->
			<form method="post" id="download-front-form" action="download-from-card.php" style="opacity:0;">
				<input type="hidden" name="my_hidden" id="my_hidden">
				<input type="hidden" name="file_name" value="<?=$front_file_name;?>">
				<input type="hidden" name="member_id" value="<?=$_GET['user_id'];?>">
				<input type="hidden" name="plan_id" value="<?=$_GET['plan_id'];?>">
				<div id="front-card" style="width:550px;">
					<?php echo $html ?>
				</div>
			</form>		
			<form method="post" id="download-back-form" action="download-from-card.php" style="opacity:0;">
				<input type="hidden" name="my_hidden" id="my_hidden2">
				<input type="hidden" name="file_name" value="<?=$back_file_name;?>">
				<input type="hidden" name="member_id" value="<?=$_GET['user_id'];?>">
				<input type="hidden" name="plan_id" value="<?=$_GET['plan_id'];?>">
				<div id="back-card" style="width:550px;">
					<?php echo $html2 ?>
				</div>
			</form>

			<!-- Footer -->
			<?php
				include("common/footer.php");
			?>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
	<script type="text/javascript" src="../js/html2canvas.min.js"></script>
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

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jan 2021 12:21:06 GMT -->
</html>
