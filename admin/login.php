<?php
	include("../db.php");
	include("../common-details.php");
	if(isset($_POST['submit']))
		{
			$admin_id=$_POST['admin_id'];
			$password=$_POST['password'];
			$query=mysqli_query($con,"select * from admin where password='$password' and (admin_id='$admin_id' or mobile='$admin_id')");
			$num=mysqli_num_rows($query);
			if($num>0)
				{
					$res=mysqli_fetch_array($query);
					$_SESSION['admin_id']=$res['admin_id'];
					$_SESSION['name']=$res['name'];
					$_SESSION['email_id']=$res['email_id'];
					echo "<script>alert('You are succssfully logged in');</script>";
					echo "<script>window.location.href='index.php';</script>";
				}
			else
				{
					echo "<script>alert('You have entered wrong admin_id or password');</script>";
				}			
		}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/login_transparent.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jan 2021 12:37:48 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Admin Login :: <?=$co_name;?></title>

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
	<script src="global_assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="assets/js/app.js"></script>
	<script src="global_assets/js/demo_pages/login.js"></script>
	<!-- /theme JS files -->
	<link rel="shortcut icon" href="<?=$co_favicon;?>"/>
</head>

<body style="background:url('img/login_banner.jpg');background-position:center;background-size:cover;">

	<!-- Main navbar -->

	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex align-items-center">

				<!-- Login card -->
				<form class="login-form" action="login.php" method="POST" style="background:rgba(0,0,0,0.4)">
					<div class="card-body">
						<div class="text-center mb-3">
							<i class="icon-people icon-2x text-warning-400 border-warning-400 border-3 rounded-round p-3 mb-3 mt-1"></i>
							<h5 class="mb-0" style="color:white;">Login to your account</h5>
							<span class="d-block text-muted" style="color:white !important">Your credentials</span>
						</div>

						<div class="form-group form-group-feedback form-group-feedback-left">
							<input type="text" class="form-control" name="admin_id" placeholder="Admin Id">
							<div class="form-control-feedback">
								<i class="icon-user text-muted"></i>
							</div>
						</div>

						<div class="form-group form-group-feedback form-group-feedback-left">
							<input type="password" class="form-control" name="password" placeholder="Password">
							<div class="form-control-feedback">
								<i class="icon-lock2 text-muted"></i>
							</div>
						</div>

						<div class="form-group d-flex align-items-center">
							<div class="form-check mb-0">
								<label class="form-check-label" style="color:white;">
									<input type="checkbox" name="remember" class="form-input-styled" checked data-fouc>
									Remember
								</label>
							</div>

							<a href="#" class="ml-auto" style="color:#B0DCF6">Forgot password?</a>
						</div>

						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
						</div>
					</div>
				</form>
				<!-- /login card -->

			</div>
			<!-- /content area -->

			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/login_transparent.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jan 2021 12:37:48 GMT -->
</html>
