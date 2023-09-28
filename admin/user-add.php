<?php
	session_start();
	include("../db.php");
	include("../common-details.php");
	include('../plugin/phpqrcode/qrlib.php');
	include("common/check_login.php");
	mysqli_set_charset( $con, 'utf8');
	$insert_status=2;
	function compress($source, $destination, $quality) 
	    {
            $info = getimagesize($source);
            if ($info['mime'] == 'image/jpeg') 
                $image = imagecreatefromjpeg($source);
            
            elseif ($info['mime'] == 'image/gif') 
                $image = imagecreatefromgif($source);
            
            elseif ($info['mime'] == 'image/png') 
                $image = imagecreatefrompng($source);
            imagejpeg($image, $destination, $quality);
            return $destination;
        }
	if(isset($_POST['submit']))
		{
		    $user_id=0;
           	$joining_date=date("Y-m-d h:i a");
        	$status="Active";
        	$name=mysqli_real_escape_string($con,$_POST['name']);
        	$mobile=$_POST['mobile'];
        	$email=mysqli_real_escape_string($con,$_POST['email']);
        	$password=mysqli_real_escape_string($con,$_POST['password']);
        	$gender=mysqli_real_escape_string($con,$_POST['gender']);
        	$dob=mysqli_real_escape_string($con,$_POST['dob']);
        	$city=mysqli_real_escape_string($con,$_POST['city']);
        	$state=mysqli_real_escape_string($con,$_POST['state']);
        	$address=mysqli_real_escape_string($con,$_POST['address']);
        	
        	$nominee_name1=mysqli_real_escape_string($con,$_POST['nominee_name1']);
        	$nominee_relation1=mysqli_real_escape_string($con,$_POST['nominee_relation1']);
        	$nominee_age1=mysqli_real_escape_string($con,$_POST['nominee_age1']);
        	
        	$nominee_name2=mysqli_real_escape_string($con,$_POST['nominee_name2']);
        	$nominee_relation2=mysqli_real_escape_string($con,$_POST['nominee_relation2']);
        	$nominee_age2=mysqli_real_escape_string($con,$_POST['nominee_age2']);
        	
        	$nominee_name3=mysqli_real_escape_string($con,$_POST['nominee_name3']);
        	$nominee_relation3=mysqli_real_escape_string($con,$_POST['nominee_relation3']);
        	$nominee_age3=mysqli_real_escape_string($con,$_POST['nominee_age3']);
        	
        	$nominee_name4=mysqli_real_escape_string($con,$_POST['nominee_name4']);
        	$nominee_relation4=mysqli_real_escape_string($con,$_POST['nominee_relation4']);
        	$nominee_age4=mysqli_real_escape_string($con,$_POST['nominee_age4']);
        	
        	$nominee_name5=mysqli_real_escape_string($con,$_POST['nominee_name5']);
        	$nominee_relation5=mysqli_real_escape_string($con,$_POST['nominee_relation5']);
        	$nominee_age5=mysqli_real_escape_string($con,$_POST['nominee_age5']);
        	
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
				    $insert_status="1";
				}
			else
			    {
			        $insert_status="0";
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
	<title>Add User :: <?=$website_name;?></title>

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
	<script src="global_assets/js/plugins/ui/prism.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="global_assets/js/plugins/extensions/jquery_ui/interactions.min.js"></script>
	<script src="global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="global_assets/js/demo_pages/form_select2.js"></script>
	<script src="assets/js/app.js"></script>
	<script src="global_assets/js/demo_pages/form_layouts.js"></script>
	<link rel="stylesheet" type="text/css" href="text_editor/css/editor.css" />
	<script src="text_editor/js/editor.js" type="text/javascript"></script>
	<script src="global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="global_assets/js/plugins/forms/styling/switch.min.js"></script>
	<script src="global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
	
	<!-- /theme JS files -->
	<link rel="shortcut icon" href="../img/favicon.png"/>
	
	<style>
		.Unapproved,.Disable
			{
				background:#FCE4E4;
			}
		.Approved,.Enable
			{
				background:#C6E2AD;
			}
		#main_image,.near_by_image_file
			{
				position:fixed;
				left:-2000px;
			}
		.main_image,.near-by-place-image
			{
				width:100%;
				display:flex;
				justify-content:center;
				align-items:center;
				cursor:pointer;
			}
		legend
			{
				font-size:17px;
				color:black;
				background:#CFD3EC;
				padding-left:10px;
			}
		.delete-btn
			{
				background:tomato !important;
				display: inline-block;
				padding: 5px 10px;
				border-radius: 3px;
				box-shadow: 1px 1px 2px black;
			}	
		.gallery,.floor-plan,.offer
			{
				margin-top: 20px;
				border: 1px solid #C1C1C1;
				padding: 10px;
			}	
		.gallery img,.floor-plan img,.offer img
			{
				width:200px !important;
				margin:10px;
			}
		.near-by-place-image img,.near-by-place-image img	
			{
				width:100% !important;
				margin:10px;
			}
		.nominee_title
		    {
	            background: beige;
                padding: 5px;
                letter-spacing: 1px;
                color: black;
                font-size: 15px;
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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Add User</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Add User</span>
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
								<h6 class="card-title">Add User</h6>
								
								<div class="header-elements">
									<a onclick="user.save()"><span class="badge bg-info badge-pill" style="cursor:pointer;font-size:14px;">SAVE</span></a><a href="import-users.php"><span class="badge bg-danger badge-pill" style="font-size:14px;">Import Users</span></a><a href="users.php"><span class="badge bg-success badge-pill" style="font-size:14px;">USERS LIST</span></a>
								</div>
							</div>
							<div class="card-body">
								<div class="navbar navbar-expand-xl navbar-dark bg-indigo-400 navbar-component rounded-top mb-0">
								

								<div class="d-xl-none">
									<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-demo-dark">
										<i class="icon-menu"></i>
									</button>
								</div>

								<div class="navbar-collapse collapse" id="navbar-demo-dark">
									<ul class="nav navbar-nav">
										<li class="nav-item dropdown">
											<a href="#tab-dark-1" class="navbar-nav-link active" data-toggle="tab">
												<i class="fa fa-info-circle mr-2" aria-hidden="true"></i>
												Details
											</a>
										</li>

										<li class="nav-item dropdown">
											<a href="#tab-dark-2" class="navbar-nav-link" data-toggle="tab">
												<i class="fa fa-certificate mr-2" aria-hidden="true"></i>
												Nominee
											</a>
										</li>
                                    </ul>
								</div>
							</div>
						<form action="user-add.php" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
							<div class="card card-body border-top-0 rounded-0 rounded-bottom tab-content mb-0">
								<!--Basic Details-->
								<div class="tab-pane fade active show" id="tab-dark-1">
									<fieldset>
										<div class="row">	
											<div class="col-md-12">
												<div class="form-group">
													<label>Name</label>
													<input type="text" name="name" class="form-control">
												</div>	
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Mobile</label>
													<input type="text" name="mobile" placeholder="" class="form-control">
												</div>	
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Email</label>
													<input type="text" name="email" placeholder="" class="form-control">
												</div>	
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Password</label>
													<input type="text" name="password" placeholder="" class="form-control">
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Gender</label>
													<select name="gender" class="form-control">
													       <option value="Male">Male</option>
													       <option value="Female">Female</option>
													       <option value="Transgender">Transgender</option>
													</select>
												</div>	
											</div>
											
											<div class="col-md-3">
												<div class="form-group">
													<label>DOB</label>
													<input type='date' name="dob" id="dob" class="form-control">
												</div>	
											</div>
											
											<div class="col-md-3">
												<div class="form-group">
													<label>State</label>
													<select name="state" id="state" class="form-control" onchange="geo_location.show_city()">
														<option value="">Select State</option>
														<?php
															$query2=mysqli_query($con,"select * from geo_locations where location_type='STATE'");
															while($res2=mysqli_fetch_array($query2))
																{
																	$id2=$res2['id'];
																	$name2=$res2['name'];
																	echo "<option value='$id2'>$name2</option>";
																}
														?>
													</select>
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>City</label>
													<select name="city" id="city" class="form-control">
														<option value="">Select State First</option>
													</select>
												</div>	
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Address</label>
													<input type='text' name="address" id="address" class="form-control">
												</div>	
											</div>
										</div>	
									</fieldset>
									
													
									<div class="row" style="position:fixed;left:-2000px;">
										<div class="input-field col s12">
											<input type="submit" class="waves-effect waves-light btn-large" id="submit" name="submit" value="Submit">
										</div>
									</div>
								</div>
								<!--Basic Details Ends-->
								<!--Aminities-->
								<div class="tab-pane fade" id="tab-dark-2">
									<div class="col-md-12">
										<fieldset>
										<div class="row">
										    <div class='col-md-12'>
									           <p class='nominee_title'>Nominee-1</p> 
									        </div>  
											<div class="col-md-4">
												<div class="form-group">
													<label>Name</label>
													<input type='text' name="nominee_name1" class="form-control">
												</div>	
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Relation</label>
													<input type='text' name="nominee_relation1" class="form-control">
												</div>	
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Age</label>
													<input type='text' name="nominee_age1" class="form-control">
												</div>	
											</div>
										</div>
										
										<div class="row">
										    <div class='col-md-12'>
										           <p class='nominee_title'>Nominee-2</p> 
									        </div>  
											<div class="col-md-4">
												<div class="form-group">
													<label>Name</label>
													<input type='text' name="nominee_name2" class="form-control">
												</div>	
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Relation</label>
													<input type='text' name="nominee_relation2" class="form-control">
												</div>	
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Age</label>
													<input type='text' name="nominee_age2" class="form-control">
												</div>	
											</div>
										</div>
										
										<div class="row">
										    <div class='col-md-12'>
										           <p class='nominee_title'>Nominee-3</p> 
									        </div>  
											<div class="col-md-4">
												<div class="form-group">
													<label>Name</label>
													<input type='text' name="nominee_name3" class="form-control">
												</div>	
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Relation</label>
													<input type='text' name="nominee_relation3" class="form-control">
												</div>	
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Age</label>
													<input type='text' name="nominee_age3" class="form-control">
												</div>	
											</div>
										</div>
										
										<div class="row">
										    <div class='col-md-12'>
										           <p class='nominee_title'>Nominee-4</p> 
									        </div>  
											<div class="col-md-4">
												<div class="form-group">
													<label>Name</label>
													<input type='text' name="nominee_name4" class="form-control">
												</div>	
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Relation</label>
													<input type='text' name="nominee_relation4" class="form-control">
												</div>	
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Age</label>
													<input type='text' name="nominee_age4" class="form-control">
												</div>	
											</div>
										</div>
										
										<div class="row">
										    <div class='col-md-12'>
										           <p class='nominee_title'>Nominee-5</p> 
									        </div>  
											<div class="col-md-4">
												<div class="form-group">
													<label>Name</label>
													<input type='text' name="nominee_name5" class="form-control">
												</div>	
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Relation</label>
													<input type='text' name="nominee_relation5" class="form-control">
												</div>	
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Age</label>
													<input type='text' name="nominee_age5" class="form-control">
												</div>	
											</div>
										</div>
									</fieldset>
									</div>
								</div>
								<!--Aminites Ends-->
							</form>	
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


			<!-- Footer -->
			<?php
				include("common/footer.php");
			?>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
	<script src="js/user.js"></script>
	<script src="js/geo_location.js"></script>
	<link rel="stylesheet" href="plugins/toast/toast.style.min.css">
	<script src="plugins/toast/toast.script.js"></script>
	<script src="ckeditor/ckeditor.js"></script>
	<script src="ckeditor/samples/js/sample.js"></script>
	<script>
		// Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.editorConfig = function (config) {
			config.language = 'es';
			config.uiColor = '#F7B42C';
			config.height = 300;
			config.toolbarCanCollapse = true;

		};
		$(document).ready(function() {
			CKEDITOR.replace( 'overview' ,{
				filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
				filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
				filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr='
			});
			
			CKEDITOR.replace( 'requirment' ,{
				filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
				filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
				filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr='
			});
				
			CKEDITOR.replace( 'career' ,{
				filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
				filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
				filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr='
			});	
		});
	</script>
	<?php
		if($insert_status==1)
			{
				echo "<script>$.Toast('', 'New User added successfully.', 'success', {
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
				echo "<script>$.Toast('', 'Some problem occured. Try again.', 'error', {
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
</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jan 2021 12:21:06 GMT -->
</html>
