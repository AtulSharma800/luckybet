<?php
	session_start();
	include("../db.php");
	include("common/check_login.php");
	include("../company_details.php");
	$update_status=2;
	if(isset($_POST['submit']))
		{
			$id=$_GET['id'];
			$transaction_id=mysqli_real_escape_string($con,$_POST['transaction_id']);
			$status=mysqli_real_escape_string($con,$_POST['status']);
			$remark=mysqli_real_escape_string($con,$_POST['remark']);
			$updated_at=date("Y-m-d H:i:s");
			$main_image="";
			//Main Image Upload	
			if(!empty($_FILES['main_image']['name']))
				{
					$a=explode(".",$_FILES['main_image']['name']);
					$extension=$a[1];
					$main_image="main".time().".".$extension;
					move_uploaded_file($_FILES['main_image']['tmp_name'],"upload/withdrawal/$main_image");
					$query=mysqli_query($con,"update add_withdrawal set screen_shot='$main_image' where id='$id'");
				}
			
			$query=mysqli_query($con,"update add_withdrawal set transaction_id='$transaction_id',status='$status',remark='$remark',modified_at='$updated_at' where id='$id'");
			$res=mysqli_affected_rows($con);
			if($res)
				{
					$query=mysqli_query($con,"update transactions set status='$status',remark='$remark' where money_id='$id' and transaction_type='Withdrawal'");
					$update_status="1";		
				}
			else
				{
					$update_status="0";
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
	<title>Edit Withdrawal :: <?=$co_name;?></title>

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
		#bank-box, #upi-box
			{
				display:none;
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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Edit Withdrawal</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Edit Withdrawal</span>
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
								<h6 class="card-title">Edit Withdrawal</h6>
								
								<div class="header-elements">
									<a onclick="withdrawal.update()"><span class="badge bg-info badge-pill" style="cursor:pointer;font-size:14px;">UPDATE</span></a><a href="event.php"><span class="badge bg-success badge-pill" style="font-size:14px;">WITHDRAWAL LIST</span></a>
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
							$query=mysqli_query($con,"select * from add_withdrawal where id='$id'");
							$res=mysqli_fetch_array($query);
						?>	
						<form action="edit-withdrawal.php?id=<?=$id;?>" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
							<div class="card card-body border-top-0 rounded-0 rounded-bottom tab-content mb-0">
								<div class="tab-pane fade active show" id="tab-dark-1">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="file" name="main_image" id="main_image" class="form-control">
												<div class="main_image img-thumbnail" onclick="withdrawal.select_image()">
													<p style="font-size:24px;text-align:center;">
														<?php
															if(!empty($res['screen_shot']))
																{
														?>
																	<img src="<?php echo 'upload/withdrawal/'.$res['screen_shot'];?>" style="width:100%;display:block">
														<?php
																}
															else
																{															
														?>	
																	<img src="img/icon/upload.png" style="width:150px;display:block"></br>
														<?php
																}
														?>
														
													</p>
												</div>
											</div>
										</div>
									</div>	
									<fieldset>
										<div class="row">	
											<div class="col-md-12">
												<div class="form-group">
													<label>Transaction Id</label>
													<input type="text" name="transaction_id" class="form-control" value="<?=$res['transaction_id'];?>">
												</div>	
											</div>
											
											<div class="col-md-12">
												<div class="form-group">
													<label>Withdrawal Method</label>
													<select class='form-control' name="withdrawal_method" id="withdrawal_method" style="height:45px;border-color:#ED0A0A;" onchange="withdrawal.show_method()">
														<option value="">Select Method</option>
														<option value="bank" <?php if($res['withdrawal_method']=='bank'){echo 'selected';} ?>>Bank</option>
														<option value="upi" <?php if($res['withdrawal_method']=='upi'){echo 'selected';} ?>>UPI ID</option>
													</select>
												</div>	
											</div>
											<div class="col-md-12">
												<div id="bank-box" class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label style="margin-top:10px;">Bank Name</label>
															<input type="text" class='form-control' name="bank_name" id="bank_name" style="height:45px;border-color:#ED0A0A;" value="<?=$res['bank_name'];?>" placeholder="Bank Name">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">	
															<label style="margin-top:10px;">IFSC Code</label>
															<input type="text" class='form-control' name="ifsc_code" id="ifsc_code" style="height:45px;border-color:#ED0A0A;" value="<?=$res['ifsc_code'];?>" placeholder="IFSC Code">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">	
															<label style="margin-top:10px;">Account No.</label>
															<input type="text" class='form-control' name="account_no" id="account_no" style="height:45px;border-color:#ED0A0A;" value="<?=$res['account_no'];?>" placeholder="Account Number">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">	
															<label style="margin-top:10px;">Account Name</label>
															<input type="text" class='form-control' name="account_name" id="account_name" style="height:45px;border-color:#ED0A0A;" placeholder="Account Name" value="<?=$res['account_name'];?>">
														</div>
													</div>	
												</div>
												<div class="row" id="upi-box">
													<div class="col-md-12">
														<div class='form-group' >
															<label style="margin-top:10px;">UPI Id</label>
															<input type="text" class='form-control' name="upi_id" id="upi_id" style="height:45px;border-color:#ED0A0A;" value="<?=$res['upi_id'];?>" placeholder="UPI ID">
														</div>
													</div>	
												</div>	
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Status</label>
													<select name="status" id="status" class="form-control">
														<option value="Pending" <?php if($res['status']=='Pending'){echo "selected";} ?>>Pending</option>
														<option value="Rejected" <?php if($res['status']=='Rejected'){echo "selected";} ?>>Rejected</option>
														<option value="Approved" <?php if($res['status']=='Approved'){echo "selected";} ?>>Approved</option>
													</select>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Remark</label>
													<textarea class="form-control" name="remark" id="remark"><?=$res['remark'];?></textarea>
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
	<script src="js/withdrawal.js"></script>
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
			CKEDITOR.replace( 'description' ,{
				filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
				filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
				filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr='
			});
				
		});
	</script>
	<?php
		if($res['withdrawal_method']=='bank')
			{
				echo "<script>$('#bank-box').css('display','flex');</script>";
			}
		else if($res['withdrawal_method']=='upi')
			{
				echo "<script>$('#upi-box').css('display','flex');</script>";
			}	
		if($update_status==1)
			{
				echo "<script>$.Toast('', 'Withdrawal request updated successfully.', 'success', {
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
		else if($update_status==0)
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
