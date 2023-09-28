<?php
	session_start();
	include("../db.php");
	include("common/check_login.php");
	if(isset($_POST['submit']))
		{
			$id=$_GET['id'];
			$name=$_POST['name'];
			$email=$_POST['email'];
			$mobile=$_POST['mobile'];
			$whatsapp_mobile=$_POST['whatsapp_mobile'];
			$city=$_POST['city'];
			$address=$_POST['address'];
			$member_id=$_POST['member_id'];
			$password=$_POST['password'];
			$date_added=$_POST['date_added'];
			$status=$_POST['status'];
			$query=mysqli_query($con,"update member set name='$name',mobile='$mobile',email_id='$email',whatsapp_mobile='$whatsapp_mobile',city='$city',address='$address',member_id='$member_id',password='$password',date_added='$date_added',status='$status' where id='$id'");
			$res=mysqli_affected_rows($con);
			if($res)
				{
					echo "<script>alert('Member details updated successfully.');</script>";
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
	<title>Member Detail :: Brij Dham Yatra</title>

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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Member Detail</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Member Detail</span>
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
								<h6 class="card-title">Member Detail</h6>
								
								<div class="header-elements">
									<a onclick="member.update()"><span class="badge bg-info badge-pill" style="cursor:pointer;font-size:14px;">Updatde</span></a><a href="member-all.php"><span class="badge bg-success badge-pill" style="font-size:14px;">MEMBER LIST</span></a>
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

										
									</ul>
								</div>
							</div>
						<?php
							$id=$_GET['id'];
							$query=mysqli_query($con,"select * from member where id='$id'");
							$res=mysqli_fetch_array($query);
						?>	
						<form action="member-view.php?id=<?=$id;?>" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
							<div class="card card-body border-top-0 rounded-0 rounded-bottom tab-content mb-0">
								<div class="tab-pane fade active show" id="tab-dark-1">
									<fieldset>
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label>Name</label>
													<input type="text" name="name" class="form-control" value="<?=$res['name'];?>">
												</div>	
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Email</label>
													<input type="text" name="email" class="form-control" value="<?=$res['email_id'];?>">
												</div>	
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Mobile</label>
													<input type="number" name="mobile" class="form-control" value="<?=$res['mobile'];?>">
												</div>	
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Whatsapp Mobile</label>
													<input type="number" name="whatsapp_mobile" class="form-control" value="<?=$res['whatsapp_mobile'];?>">
												</div>	
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>City</label>
													<input type="text" name="city" class="form-control" value="<?=$res['city'];?>">
												</div>	
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Address</label>
													<input type="text" name="address" class="form-control" value="<?=$res['address'];?>">
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Member Id</label>
													<input type="text" name="member_id" class="form-control" value="<?=$res['member_id'];?>">
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Password</label>
													<input type="text" name="password" class="form-control" value="<?=$res['password'];?>">
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Date Added</label>
													<input type="date" name="date_added" class="form-control" value="<?=$res['date_added'];?>">
													<input type="submit" name="submit" id="submit" style="position:fixed;left:-4000px">
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Status</label>
													<select class="form-control" name="status">
														<option value='Enable' <?php if($res['status']=='Enable'){echo 'selected';} ?>>Enable</option>
														<option value='Disable' <?php if($res['status']=='Disable'){echo 'selected';} ?>>Disable</option>
													</select>
												</div>	
											</div>
										</div>	
									</fieldset>
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
	<script src="js/member.js"></script>
</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jan 2021 12:21:06 GMT -->
</html>