<?php
	include("../db.php");
	include("common/check_login.php");
	include("../common-details.php");
	$insert_status=2;
	if(isset($_POST['submit']))
		{
			$date_added=date("Y-m-d");
			$name=$_POST['name'];
			$id_no=$_POST['id_no'];
			$experience=$_POST['experience'];
			$hospital=$_POST['hospital'];
			$speciality=$_POST['speciality'];
			$additional_speciality=serialize(@$_POST['additional_speciality']);
			$education=mysqli_real_escape_string($con,$_POST['education']);
			$symptoms=serialize(@$_POST['symptoms']);
			$language=serialize(@$_POST['language']);
			$fees=$_POST['fees'];
			$login_id=$_POST['login_id'];
			$password=$_POST['password'];
			$sort_order=$_POST['sort_order'];
			$main_image="";
			//Main Image Upload	
			if(!empty($_FILES['main_image']['name']))
				{
					$a=explode(".",$_FILES['main_image']['name']);
					$extension=$a[1];
					$main_image="main".time().".".$extension;
					move_uploaded_file($_FILES['main_image']['tmp_name'],"upload/doctor/$main_image");
				}
			
			//insert package details
			$query=mysqli_query($con,"insert into doctor(profile,id_no,name,exp,speciality,additional_speciality,education,hospital,language,symptoms,fees,sort_order,login_id,password,date_added) values('$main_image','$id_no','$name','$experience','$speciality','$additional_speciality','$education','$hospital','$language','$symptoms','$fees','$sort_order','$login_id','$password','$date_added')");
			$res=mysqli_affected_rows($con);
			if($res)
				{
					$insert_status="1";
					$education_names=$_POST['education_name'];
					$universitys=$_POST['university'];
					$years=$_POST['year'];	
					$query=mysqli_query($con,"select * from doctor order by id desc limit 1");
					$res=mysqli_fetch_array($query);
					$doctor_id=$res['id'];
					$i=0;
					foreach($education_names as $education_name)
						{
							$query=mysqli_query($con,"insert into education_history(doctor_id,name,university,year,date_added) values('$doctor_id','$education_name','".$universitys[$i]."','".$years[$i]."','$date_added')");
							$i++;
						}					
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
	<title>Add Doctor :: <?=$co_name;?></title>

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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Add Doctor</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Add Doctor</span>
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
								<h6 class="card-title">Add Doctor</h6>
								
								<div class="header-elements">
									<a onclick="doctor.save()"><span class="badge bg-info badge-pill" style="cursor:pointer;font-size:14px;">SAVE</span></a><a href="doctor.php"><span class="badge bg-success badge-pill" style="font-size:14px;">DOCTOR LIST</span></a>
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
												Education History
											</a>
										</li>
									</ul>
								</div>
							</div>
						<form action="doctor-add.php" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
							<div class="card card-body border-top-0 rounded-0 rounded-bottom tab-content mb-0">
								<div class="tab-pane fade active show" id="tab-dark-1">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="file" name="main_image" id="main_image" class="form-control">
												<div class="main_image img-thumbnail" onclick="doctor.select_image()">
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
													<label>Name</label>
													<input type="text" name="name" class="form-control">
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>ID No</label>
													<input type="text" name="id_no" class="form-control">
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Experience</label>
													<input type="text" name="experience" class="form-control">
												</div>	
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Hospital</label>
													<select name="hospital" id="hospital" class="form-control">
														<option value="">Select Hospital</option>
														<?php
															$query2=mysqli_query($con,"select * from hospital order by name");
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
											<div class="col-md-4">
												<div class="form-group">
													<label>Speciality</label>
													<select name="speciality" id="speciality" class="form-control">
														<option value="">Select Speciality</option>
														<?php
															$query2=mysqli_query($con,"select * from speciality order by name");
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
											<div class="col-md-4">
												<div class="form-group">
													<label>Additional Speciality</label>
													<select name="additional_speciality[]" id="additional_speciality" class="form-control select" multiple="multiple">
														<optgroup label="Select Speciality">
														<?php
															$query2=mysqli_query($con,"select * from speciality order by name");
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
											<div class="col-md-4">
												<div class="form-group">
													<label>Education</label>
													<input type="text" name="education" class="form-control">
												</div>	
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Symptoms</label>
													<select name="symptoms[]" id="symptoms" class="form-control select" multiple="multiple">
														<optgroup label="Select Symptoms">
														<?php
															$query2=mysqli_query($con,"select * from symptoms order by name");
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
											<div class="col-md-4">
												<div class="form-group">
													<label>Language</label>
													<select name="language[]" id="language" class="form-control select" multiple="multiple">
														<optgroup label="Select Language">
														<option value='Hindi'>Hindi</option>
														<option value='English'>English</option>
													</select>
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Fees</label>
													<input type="text" name="fees" class="form-control">
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Sort Order</label>
													<input type="text" name="sort_order" class="form-control">
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Login Id</label>
													<input type="text" name="login_id" class="form-control">
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Password</label>
													<input type="text" name="password" class="form-control">
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
								<div class="tab-pane fade" id="tab-dark-2">
									<div class="col-md-12">
										<fieldset>
											<legend>Education History</legend>
											<div class="row">
												<div class="col-md-12">
													<table class="table table-striped table-bordered" id='education-table'>
														<tr >
															<td class="text-left" style='width:25%;'>Education</td>
															<td class="text-left" style='width:45%;'>University</td>
															<td class="text-left" style='width:20%;'>Year</td>
															<td style='width:10%'></td>
														</tr>
														<tr>
															<td colspan="3"></td>
															<td class="text-left"><button type="button" onclick="education_row.add(1)" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add Education" style="padding:0px 12px;" id="education_add_btn"><i class="fa fa-plus-circle" style="margin-right:0px;"></i></button></td>
														</tr>
													</table>
												</div>
											</div>
										</fieldset>
									</div>
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
	<script src="js/doctor.js"></script>
	<script src="js/geo_location.js"></script>
	<link rel="stylesheet" href="plugins/toast/toast.style.min.css">
	<script src="plugins/toast/toast.script.js"></script>
	<?php
		if($insert_status==1)
			{
				echo "<script>$.Toast('', 'New Doctor added successfully.', 'success', {
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
