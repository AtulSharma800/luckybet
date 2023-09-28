<?php
	include("../db.php");
	include("common/check_login.php");
	include("../common-details.php");
	$insert_status=2;
	if(isset($_POST['submit']))
		{
			$title=$_POST['title'];
			$discount_on_health_checkups=$_POST['discount_on_health_checkups'];
			$discount_on_consultation=$_POST['discount_on_consultation'];
			$what_you_get_text=serialize($_POST['what_you_get_text']);
			$status=$_POST['status'];
			$date=date("Y-m-d");
			$time=date("H:i a");
			$main_image="";
			//Main Image Upload	
			if(!empty($_FILES['main_image']['name']))
				{
					$a=explode(".",$_FILES['main_image']['name']);
					$extension=$a[1];
					$main_image="main".time().".".$extension;
					move_uploaded_file($_FILES['main_image']['tmp_name'],"upload/health_package/$main_image");
				}
			
			//insert package details
			$query=mysqli_query($con,"insert into health_package(image,title,discount_on_health_checkups,discount_on_consultation,what_you_get,status,date_added,time_added) values('$main_image','$title','$discount_on_health_checkups','$discount_on_consultation','$what_you_get_text','$status','$date','$time')");
			$res=mysqli_affected_rows($con);
			if($res)
				{
					$id=mysqli_insert_id($con);
					$insert_status="1";		
					$durations=$_POST['duration'];
					$prices=$_POST['price'];
					$offer_prices=$_POST['offer_price'];	
					$i=0;
					foreach($durations as $duration)
						{
							$query3=mysqli_query($con,"insert into health_package_detail(health_package_id,duration,price,offer_price) values('$id','".$durations[$i]."','".$prices[$i]."','".$offer_prices[$i]."')");
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
	<title>Add Health Package :: <?=$co_name;?></title>

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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Add Health Package</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Add Health Package</span>
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
								<h6 class="card-title">Add Health Package</h6>
								
								<div class="header-elements">
									<a onclick="health_package.save()"><span class="badge bg-info badge-pill" style="cursor:pointer;font-size:14px;">SAVE</span></a><a href="health-package.php"><span class="badge bg-success badge-pill" style="font-size:14px;">HEALTH PACKAGE LIST</span></a>
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
													What You Get ?
												</a>
											</li>
											<li class="nav-item dropdown">
												<a href="#tab-dark-3" class="navbar-nav-link" data-toggle="tab">
													<i class="fa fa-info-circle mr-2" aria-hidden="true"></i>
													Plans
												</a>
											</li>
										</ul>
									</div>
								</div>
								<form action="health-package-add.php" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
									<div class="card card-body border-top-0 rounded-0 rounded-bottom tab-content mb-0">
										<div class="tab-pane fade active show" id="tab-dark-1">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<input type="file" name="main_image" id="main_image" class="form-control">
														<div class="main_image img-thumbnail" onclick="health_package.select_image()">
															<p style="font-size:24px;text-align:center;">
																<img src="img/icon/upload.png" style="width:150px;display:block"></br>
															</p>
														</div>
													</div>
												</div>
											</div>	
											<fieldset>
												<div class="row">	
													<div class="col-md-12">
														<div class="form-group">
															<label>Title</label>
															<input type="text" name="title" class="form-control">
														</div>	
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label>Discount on Health Checkups (₹)</label>
															<input type="text" name="discount_on_health_checkups" class="form-control">
														</div>	
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label>Discount On Consultation (₹)</label>
															<input type="text" name="discount_on_consultation" class="form-control">
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
												<label for='description'>What You Get ?</label>
											</div>
											<div class="col-md-12">
												<table class="table table-striped table-bordered" id='what-you-get-table'>
													<tr>
														<td class="text-left" style='width:90%;'>Advantage</td>
														<td style='width:10%'></td>
													</tr>
													
													<tr>
														<td></td>
														<td class="text-left"><button type="button" onclick="what_you_get.add(1)" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="What You Get ?" style="padding:0px 12px;" id="what_you_get_add_btn"><i class="fa fa-plus-circle" style="margin-right:0px;"></i></button></td>
													</tr>
												</table>
											</div>
										</div>
										
									</fieldset>
								</div>
								<div class="tab-pane fade" id="tab-dark-3">
									<fieldset>
										<div class="row">	
											<div class="input-field col-md-12">
												<label for='description'>Plans</label>
												<input type="hidden" name="remove_plan_id">
											</div>
											<div class="col-md-12">
												<table class="table table-striped table-bordered" id='plan-table'>
													<tr>
														<td class="text-left" style='width:50%;'>Duration(In Months)</td>
														<td class="text-left" style='width:20%;'>Price</td>
														<td class="text-left" style='width:20%;'>Offer Price</td>
														<td style='width:10%'></td>
													</tr>
													
													<tr>
														<td colspan='3'></td>
														<td class="text-left"><button type="button" onclick="plan.add(1)" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Plan" style="padding:0px 12px;" id="plan_add_btn"><i class="fa fa-plus-circle" style="margin-right:0px;"></i></button></td>
													</tr>
												</table>
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
	<script src="js/health-package.js"></script>
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
				echo "<script>$.Toast('', 'New health package added successfully.', 'success', {
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
