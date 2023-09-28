<?php
	include("../db.php");
	include("common/check_login.php");
	include("../common-details.php");
	$insert_status=2;
	if(isset($_POST['submit']))
		{
			$pharmacy_name=$_POST['pharmacy_name'];
			$licence_no=$_POST['licence_no'];
			$state=$_POST['state'];
			$district=$_POST['district'];
			$area=$_POST['area'];
			$address=$_POST['address'];
			$name=$_POST['name'];
			$login_id=$_POST['login_id'];
			$mobile=$_POST['mobile'];
			$alternate_mobile=$_POST['alternate_mobile'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$dob=$_POST['dob'];
			$status=$_POST['status'];
			$created_at=date("Y-m-d h:i:s");
			$updated_at=date("Y-m-d h:i:s");
			$short_description=mysqli_real_escape_string($con,$_POST['short-description']);
			$description=mysqli_real_escape_string($con,$_POST['description']);
			$main_image="";
			//Main Image Upload	
			if(!empty($_FILES['main_image']['name']))
				{
					$a=explode(".",$_FILES['main_image']['name']);
					$extension=$a[1];
					$main_image="main".time().".".$extension;
					move_uploaded_file($_FILES['main_image']['tmp_name'],"upload/pharmacist/$main_image");
				}
			
			//insert package details
			$query=mysqli_query($con,"insert into pharmacist(pharmacy_name,licence_no,state,district,area,address,image,name,login_id,mobile,alternate_mobile,email,password,dob,short_description,description,status,created_at,updated_at) values('$pharmacy_name','$licence_no','$state','$district','$area','$address','$main_image','$name','$login_id','$mobile','$alternate_mobile','$email','$password','$dob','$short_description','$description','$status','$created_at','$updated_at')");
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
	<title>Add Pharmacist :: <?=$co_name;?></title>

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
	
	
	<!-- /theme JS files -->
	<link rel="shortcut icon" href="<?=$co_favicon;?>"/>
	
	<style>
		.Unapproved,.Disable
			{
				background:#FCE4E4;
			}
		.Approved,.Enable
			{
				background:#C6E2AD;
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
		.gallery
			{
				margin-top: 20px;
				border: 1px solid #C1C1C1;
				padding: 10px;
			}	
		.gallery img
			{
				width:200px !important;
				margin:10px;
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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Add Pharmacist</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Add Pharmacist</span>
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
								<h6 class="card-title">Add Pharmacist</h6>
								
								<div class="header-elements">
									<a onclick="pharmacist.save()"><span class="badge bg-info badge-pill" style="cursor:pointer;font-size:14px;">SAVE</span></a><a href="pharmacist.php"><span class="badge bg-success badge-pill" style="font-size:14px;">PHARMACIST LIST</span></a>
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
													<i class="fa fa-info-circle mr-2" aria-hidden="true"></i>
													Long Description
												</a>
											</li>
										</ul>
									</div>
								</div>
								<form action="pharmacist-add.php" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
									<div class="card card-body border-top-0 rounded-0 rounded-bottom tab-content mb-0">
										<div class="tab-pane fade active show" id="tab-dark-1">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<input type="file" name="main_image" id="main_image" class="form-control">
														<div class="main_image img-thumbnail" onclick="pharmacist.select_image()">
															<p style="font-size:24px;text-align:center;">
																<img src="img/icon/upload.png" style="width:150px;display:block"></br>
															</p>
														</div>
													</div>
												</div>
											</div>	
											<fieldset>
												<div class="row">	
													<div class="col-md-6">
														<div class="form-group">
															<label>Pharmacy Name</label>
															<input type="text" name="pharmacy_name" class="form-control">
														</div>	
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Licence No</label>
															<input type="text" name="licence_no" class="form-control">
														</div>	
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>State</label>
															<select class="form-control select-search" id="state" name="state" onchange="geo_location.show_city()" data-fouc>
																<?php
																	$query2=mysqli_query($con,"select * from geo_locations where location_type='STATE' order by name");
																	while($res2=mysqli_fetch_array($query2))
																		{
																			$id=$res2['id'];
																			$name=$res2['name'];
																			echo "<option value='$id'>$name</option>";
																		}
																?>
															</select>
														</div>	
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>District</label>
															<select class="form-control select-search" id="city" name="district" onchange="geo_location.show_area()" data-fouc>
																<option>Select State First</option>
															</select>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>Area</label>
															<select class="form-control select-search" id="area" name="area" data-fouc>
																<option>Select District First</option>
															</select>
														</div>
													</div>													
													<div class="col-md-12">
														<div class="form-group">
															<label>Address</label>
															<input type="text" class="form-control" id="address" name="address">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Contact Person</label>
															<input type="text" name="name" class="form-control">
														</div>	
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Login Id</label>
															<input type="text" name="login_id" class="form-control">
														</div>	
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label><i class="fa fa-mobile"></i>&nbsp;Mobile</label>
															<input type="text" name="mobile" class="form-control">
														</div>	
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label><i class="fa fa-mobile"></i>&nbsp;Alternate Mobile</label>
															<input type="text" name="alternate_mobile" class="form-control">
														</div>	
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>Email</label>
															<input type="text" name="email" class="form-control">
														</div>	
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label>Password</label>
															<input type="password" name="password" class="form-control">
														</div>	
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label>DOB</label>
															<input type="date" name="dob" class="form-control">
														</div>	
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label>Status</label>
															<select name="status" id="status" class="form-control">
																<option value="Active">Active</option>
																<option value="Inactive">Inactive</option>
															</select>
														</div>	
													</div>
													<div class="input-field col-md-12">
														<label>Short Descriptions (Max 250 Chars)</label>
														<textarea  name="short-description" id="short-description" style="height:150px;" class="form-control"></textarea>
													</div>
												</div>	
											</fieldset>
											
											<div class="row" style="position:fixed;left:-2000px;">
												<div class="input-field col s12">
													<input type="submit" class="waves-effect waves-light btn-large" id="submit" name="submit" value="Submit">
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="tab-dark-2">
											<fieldset>
												<div class="row">	
													<div class="input-field col-md-12">
														<label for='description'>Full Descriptions</label>
														<textarea  name="description" id="description" class="form-control"></textarea>
													</div>
												</div>	
											</fieldset>
										</div>
									</div>
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
	<link rel="stylesheet" href="plugins/toast/toast.style.min.css">
	<script src="plugins/toast/toast.script.js"></script>
	<script src="js/geo_location.js"></script>
	<script src="js/pharmacist.js"></script>
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
			CKEDITOR.replace( 'description' ,{
				filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
				filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
				filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr='
			});
				
		});
	</script>
	<?php
		if($insert_status==1)
			{
				echo "<script>$.Toast('', 'New pharmacist added successfully.', 'success', {
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
