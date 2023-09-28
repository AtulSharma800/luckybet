<?php
	session_start();
	include("../db.php");
	include("../common-details.php");
	include('../plugin/phpqrcode/qrlib.php');
	include("common/check_login.php");
	mysqli_set_charset( $con, 'utf8');
	$insert_status='2';
	$message="";
	if(isset($_POST['submit']))
		{
			$count=0;
			$filename = explode(".", $_FILES['file']['name']);
			if($filename[1] == 'csv')
				{
				    $user_id=0;
                   	$joining_date=date("Y-m-d h:i a");
                	$status="Active";
					$handle = fopen($_FILES['file']['tmp_name'], "r");
					while($filesop = fgetcsv($handle))//handling csv file 
						{
							$name = $filesop[0];
							$mobile = $filesop[1];
							$email = $filesop[2];
							$password = $filesop[3];
							$gender = $filesop[4];
							$dob = $filesop[5];
							$state = $filesop[6];
							$city = $filesop[7];
							$address = $filesop[8];
							$nominee_name1=mysqli_real_escape_string($con,$filesop[9]);
                        	$nominee_relation1=mysqli_real_escape_string($con,$filesop[10]);
                        	$nominee_age1=mysqli_real_escape_string($con,$filesop[11]);
                        	
                        	$nominee_name2=mysqli_real_escape_string($con,$filesop[12]);
                        	$nominee_relation2=mysqli_real_escape_string($con,$filesop[13]);
                        	$nominee_age2=mysqli_real_escape_string($con,$filesop[14]);
                        	
                        	$nominee_name3=mysqli_real_escape_string($con,$filesop[15]);
                        	$nominee_relation3=mysqli_real_escape_string($con,$filesop[16]);
                        	$nominee_age3=mysqli_real_escape_string($con,$filesop[17]);
                        	
                        	$nominee_name4=mysqli_real_escape_string($con,$filesop[18]);
                        	$nominee_relation4=mysqli_real_escape_string($con,$filesop[19]);
                        	$nominee_age4=mysqli_real_escape_string($con,$filesop[20]);
                        	
                        	$nominee_name5=mysqli_real_escape_string($con,$filesop[21]);
                        	$nominee_relation5=mysqli_real_escape_string($con,$filesop[22]);
                        	$nominee_age5=mysqli_real_escape_string($con,$filesop[23]);
							$date_added=date("Y-m-d");
							
							if($name!='name')
								{
								    $user_id="MUDRA".rand(111111,999999);
                                	$text = $co_website_url."user-information.php?user_id=$user_id";
                                	$path = '../images/qrcode/';
                                	$qrcode=uniqid();
                                	$file = $path.$qrcode.".png";
                                	$qrcode_filename=$qrcode.".png";  
                                	// $ecc stores error correction capability('L')
                                	$ecc = 'L';
                                	$pixel_size = 5;
                                	$frame_size = 0;
                                	  
                                	// Generates QR Code and Stores it in directory given
                                	QRcode::png($text, $file, $ecc, $pixel_size, $frame_size);
									$query=mysqli_query($con,"insert into users(user_id,name,mobile,email,password,gender,dob,city,state,address,joining_date,qrcode,status,nominee_name1,nominee_relation1,nominee_age1,nominee_name2,nominee_relation2,nominee_age2,nominee_name3,nominee_relation3,nominee_age3,nominee_name4,nominee_relation4,nominee_age4,nominee_name5,nominee_relation5,nominee_age5) values('$user_id','$name','$mobile','$email','$password','$gender','$dob','$city','$state','$address','$joining_date','$qrcode_filename','Active','$nominee_name1','$nominee_relation1','$nominee_age1','$nominee_name2','$nominee_relation2','$nominee_age2','$nominee_name3','$nominee_relation3','$nominee_age3','$nominee_name4','$nominee_relation4','$nominee_age4','$nominee_name5','$nominee_relation5','$nominee_age5')");
									$res=mysqli_affected_rows($con);
									if($res)
										{
											$count++;
										}
								}
						}
					 if($count>0)
						{
							$message = "$count Users Imported successfully.";
							$insert_status=1;
						}
					else
						{
							$message = "Some problem occured tray again.";
							$insert_status=0;
						}
				} 
			else 
				{
					$type = "error";
					$message = "Invalid File Type. Upload CSV File.";
					$insert_status=1;
				}
		}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jan 2021 12:06:00 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Students :: <?=$co_name;?></title>

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
	<script src="global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="global_assets/js/demo_pages/form_select2.js"></script>
	<!-- /theme JS files -->
	<link rel="shortcut icon" href="../img/favicon.png"/>
	<style>
		.block
			{
				padding:2px 4px;
				background:#ED0A0A;
				color:white;
				border-radius:4px;
				margin-right:5px;
				display:inline-block;
				margin-bottom:5px;
			}
		#main_image
			{
				position:fixed;
				left:-2000px;
			}
		.main_image
			{
				width:100%;
				display:flex;
				justify-content:center;
				align-items:center;
				cursor:pointer;
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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Import Users</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Import Users</span>
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
						<div class="card">
							<div class="card-header header-elements-sm-inline">
								Import Users
								<span class="btn btn-info" style='float:right'>
								    <a href="sample-file.csv" style='color:white;'>Download Sample File</a>
								</span>    
							</div>
							<hr style="margin-top:0px;margin-bottom:0px;">
							<form action="import-users.php" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
								<div class="card-body border-top-0 rounded-0 rounded-bottom tab-content mb-0">
									<div class="tab-pane fade active show" id="tab-dark-1">
										<fieldset>
											<div class="row">	
												<div class="col-md-4">
													<div class="form-group">
														<label>Choose File</label>
														<input type="file" class='form-control' id='file' name='file' required>
													</div>	
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label>&nbsp;</label>
														<button type="submit" class='waves-effect waves-light btn-large btn btn-info' id='submit' name='submit' style="display:block">Submit</button>
													</div>	
												</div>
											</div>	
										</fieldset>
									</div>
								</div>
							</form>	
						</div>
						
					</div>
				</div>
				<!-- /dashboard content -->
			</div>
			<!-- /content area -->


			<!-- Footer -->
			<?php
				include("common/footer.php");
			?>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
	<link rel="stylesheet" href="plugins/toast/toast.style.min.css">
	<script src="plugins/toast/toast.script.js"></script>
	<?php
		if($insert_status==1)
			{
				echo "<script>$.Toast('', '$message', 'success', {
										has_icon:false,
										has_close_btn:true,
										stack: true,
										fullscreen:true,
										timeout:2000,
										sticky:false,
										has_progress:true,
										rtl:false,
									});
						</script>";
			}
		else if($insert_status==0)
			{
				echo "<script>$.Toast('', '$message', 'error', {
										has_icon:false,
										has_close_btn:true,
										stack: true,
										fullscreen:true,
										timeout:2000,
										sticky:false,
										has_progress:true,
										rtl:false,
									});</script>";
			}
	?>
	<script>
		function show_sections()
			{
				$("#page-loader").css("display","flex");
				var class_id=$("#class_id").val();
				$.ajax({
					url: "ajax/show_sections.php?class_id="+class_id,
					type: "POST",
					data:  "",
					contentType: false,
					cache: false,
					processData:false,
					success: function(data)
					{
						$("#page-loader").css("display","none");
						$("#section_id").html(data);					
					},
					error: function() 
					{
					} 	        
			   });
			}
	</script>
</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jan 2021 12:21:06 GMT -->
</html>
