<?php
	include("../db.php");
	include("common/check_login.php");
	include("../common-details.php");
	$insert_status='2';
	$update_status='2';
	$delete_status='2';
	if(isset($_GET['delete_id']))
		{
			$query=mysqli_query($con,"delete from payment_methods where id='".$_GET['delete_id']."'");
			$res=mysqli_affected_rows($con);
			if($res)
				{
					$delete_status="1";			
				}
			else
				{
					$delete_status="0";		
				}
		}
	else if(isset($_POST['submit']))
		{
			$name=mysqli_real_escape_string($con,$_POST['name']);
			$mobile_number=$_POST['mobile_number'];
			$payment_method=$_POST['payment_method'];
			$bank_name=$_POST['bank_name'];
			$account_no=$_POST['account_no'];
			$account_name=$_POST['account_name'];
			$ifsc_code=$_POST['ifsc_code'];
			$status=$_POST['status'];
			$main_image="";
			//Main Image Upload	
			if(!empty($_FILES['main_image']['name']))
				{
					$a=explode(".",$_FILES['main_image']['name']);
					$extension=$a[1];
					$main_image="main".time().".".$extension;
					move_uploaded_file($_FILES['main_image']['tmp_name'],"upload/payment_methods/$main_image");
				}
			$query=mysqli_query($con,"insert into payment_methods(name,mobile_number,payment_method,bank_name,account_no,account_name,ifsc_code,status,image) values('$name','$mobile_number','$payment_method','$bank_name','$account_no','$account_name','$ifsc_code','$status','$main_image')");
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
	else if(isset($_POST['update_submit']))
		{
			$id=$_POST['method_id'];
			$name=mysqli_real_escape_string($con,$_POST['name']);
			$mobile_number=$_POST['mobile_number'];
			$payment_method=$_POST['payment_method'];
			$bank_name=$_POST['bank_name'];
			$account_no=$_POST['account_no'];
			$account_name=$_POST['account_name'];
			$ifsc_code=$_POST['ifsc_code'];
			$status=$_POST['status'];
			$main_image="";
			//Main Image Upload	
			if(!empty($_FILES['main_image']['name']))
				{
					$a=explode(".",$_FILES['main_image']['name']);
					$extension=$a[1];
					$main_image="main".time().".".$extension;
					move_uploaded_file($_FILES['main_image']['tmp_name'],"upload/payment_methods/$main_image");
					$query=mysqli_query($con,"update payment_methods set image='$main_image' where id='$id'");
				}
			$query=mysqli_query($con,"update payment_methods set name='$name',mobile_number='$mobile_number',status='$status',payment_method='$payment_method',bank_name='$bank_name',account_no='$account_no',account_name='$account_name',ifsc_code='$ifsc_code' where id='$id'");
			$res=mysqli_affected_rows($con);
			if($res)
				{
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
	<title>Payment Methods :: <?=$co_name;?></title>

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
		.speciality
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
		.enable
			{
				background:green;
				color:white;
			}
		.disable
			{
				background:tomato;
				color:white;
			}
		#bank
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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Payment Methods</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Payment Methods</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

				</div>
			</div>
			<!-- /page header -->

			<?php
				if(isset($_GET['edit_id']))
					{
						$query=mysqli_query($con,"select * from payment_methods where id='".$_GET['edit_id']."'");
						$res=mysqli_fetch_array($query);
						$name=$res['name'];
						$mobile_number=$res['mobile_number'];
						$payment_method=$res['payment_method'];
						$bank_name=$res['bank_name'];
						$account_no=$res['account_no'];
						$account_name=$res['account_name'];
						$ifsc_code=$res['ifsc_code'];
						$status=$res['status'];
						$image=$res['image'];
					}
			?>
			<!-- Content area -->
			<div class="content">
				<!-- Dashboard content -->
				<div class="row">
					<div class="col-xl-4">
						<div class="card">
							<div class="card-header header-elements-sm-inline">
								<?php
									if(isset($_GET['edit_id']))
										{
											echo "<h6 class='card-title'>Edit Payment Method</h6>";
										}
									else
										{
											echo "<h6 class='card-title'>Add Payment Method</h6>";
										}										
								?>
							</div>
							<hr style="margin-top:0px;margin-bottom:0px;">
							<form action="payment-methods.php" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
							<div class="card-body border-top-0 rounded-0 rounded-bottom tab-content mb-0">
								<div class="tab-pane fade active show" id="tab-dark-1">
									<fieldset>
										<div class="row">	
											<div class="col-md-12">
												<div class="form-group">
													<label>Payment Method</label>
													<select name="payment_method" id="payment_method" class="form-control" onchange="show_methods()">
													    <option value='other' <?php if($payment_method=='other'){echo 'selected';} ?>>Other</option>
													    <option value='bank' <?php if($payment_method=='bank'){echo 'selected';} ?>>Bank</option>
													</select>    
												</div>	
											</div>
											<div id='other' style='width:100%'>
    											<div class="col-md-12">
    												<div class="form-group">
    													<label>Name</label>
    													<input type="text" name="name" value="<?=@$name;?>" class="form-control">
    													<?php
    														if(isset($_GET['edit_id']))
    															{
    																$edit_id=$_GET['edit_id'];
    																echo "<input type='hidden' name='method_id' value='$edit_id'>";
    															}
    													?>
    												</div>	
    											</div>
    											<div class="col-md-12">
    												<div class="form-group">
    													<label>Mobile Number</label>
    													<input type="text" name="mobile_number" value="<?=@$mobile_number;?>" class="form-control">
    												</div>	
    											</div>
    										</div>
    										<div id='bank' style='width:100%'>
    											<div class="col-md-12">
    												<div class="form-group">
    													<label>Bank Name</label>
    													<input type="text" name="bank_name" value="<?=@$bank_name;?>" class="form-control">
    												</div>	
    											</div>
    											<div class="col-md-12">
    												<div class="form-group">
    													<label>IFSC Code</label>
    													<input type="text" name="ifsc_code" value="<?=@$ifsc_code;?>" class="form-control">
    												</div>	
    											</div>
    											<div class="col-md-12">
    												<div class="form-group">
    													<label>Account No</label>
    													<input type="text" name="account_no" value="<?=@$account_no;?>" class="form-control">
    												</div>	
    											</div>
    											<div class="col-md-12">
    												<div class="form-group">
    													<label>Account Name</label>
    													<input type="text" name="account_name" value="<?=@$account_name;?>" class="form-control">
    												</div>	
    											</div>
    										</div>	
											<div class="col-md-12">
												<div class="form-group">
													<label>Status</label>
													<select name="status" class="form-control">
														<option value="enable" <?php if(@$status=='enable'){echo 'selected';} ?>>Enable</option>
														<option value="disable" <?php if(@$status=='disable'){echo 'selected';} ?>>Disable</option>
													</select>
												</div>	
											</div>
											<div class="col-md-12">
													<div class="form-group">
														<input type="file" name="main_image" id="main_image" class="form-control">
														<div class="main_image img-thumbnail" onclick="method.select_image()">
															<p style="font-size:24px;text-align:center;">
																<img src="img/icon/upload.png" style="width:150px;display:block"></br>
															</p>
														</div>
													</div>
												</div>
										</div>	
									</fieldset>
									
									<div class="row">
										<div class="input-field col s12">
											<?php
												if(isset($_GET['edit_id']))
													{
														echo "<input type='submit' class='waves-effect waves-light btn-large btn btn-info' id='update_submit' name='update_submit' value='Update'>";
													}
												else
													{
														echo "<input type='submit' class='waves-effect waves-light btn-large btn btn-info' id='submit' name='submit' value='Save'>";
													}													
											?>
											
										</div>
									</div>
								</div>
							</div>
							</form>
						</div>
						
					</div>
					<div class="col-xl-8">

						<!-- Marketing campaigns -->
						<div class="card">
							<div class="card-header header-elements-sm-inline">
								<h6 class="card-title">Payment Method List</h6>
							</div>


							<div class="table-responsive">
								<table class="table datatable-save-state">
									<thead>
										<tr>
											<th style="width:15%">Image</th>
											<th style="width:15%">Method</th>
											<th style="width:40%">Detail</th>
											<th style="width:15%">Status</th>
											<th class="text-center" style="width:15%">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$query=mysqli_query($con,"select * from payment_methods");
											while($res=mysqli_fetch_array($query))
												{
													$image=$res['image'];
													$name=$res['name'];
													$mobile_number=$res['mobile_number'];
													$status=$res['status'];
													$payment_method=$res['payment_method'];
                            						$bank_name=$res['bank_name'];
                            						$account_no=$res['account_no'];
                            						$account_name=$res['account_name'];
                            						$ifsc_code=$res['ifsc_code'];
                            						if($payment_method=='other')
                            						    {
                            						        $detail="<b>Name : </b>$name</br><b>Mobile No :</b>$mobile_number";
                            						    }
                            						else
                            						    {
                            						        $detail="<b>Bank Name : </b>$bank_name</br><b>Account No :</b>$account_no</br><b>Account Name :</b>$account_name</br><b>IFSC Code :</b>$ifsc_code";
                            						    }
													
										?>
													<tr>
														<td><img src="upload/payment_methods/<?=$image;?>" class="img-thumbnail rounded" alt=""></td>
														<td><?=$payment_method;?></td>
														<td><?=$detail;?></td>
														<td><span class="btn <?=$status;?>"><?=$status;?></span></td>
														<td class="text-center">
															<div class="list-icons">
																<div class="dropdown">
																	<a href="#" class="list-icons-item" data-toggle="dropdown">
																		<i class="icon-menu9"></i>
																	</a>

																	<div class="dropdown-menu dropdown-menu-right">
																		<a href="payment-methods.php?edit_id=<?=$res['id'];?>" class="dropdown-item"><i class="fa fa-pencil-square-o"></i> Edit</a>
																		<a href="payment-methods.php?delete_id=<?=$res['id'];?>" onclick="return confirm('Are you sure?')" class="dropdown-item"><i class="fa fa-trash-o"></i> Delete</a>
																	</div>
																</div>
															</div>
														</td>
													</tr>
										<?php
												}
										?>										
							
									</tbody>
								</table>
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
	<script src="js/payment_methods.js"></script>
	<script>
	    function show_methods()
	        {
	            var a = $("#payment_method").val();
                if(a=='other')
                    {
                        $("#bank").css("display","none");
                        $("#other").css("display","block");
                    }
                else
                    {
                        $("#bank").css("display","block");
                        $("#other").css("display","none");
                    }    
	        }
	   $(document).ready(function(){
	        show_methods();    
	   })     
	</script>
	<?php
		if($delete_status==1)
			{
				echo "<script>$.Toast('', 'Payment method deleted successfully.', 'success', {
										has_icon:false,
										has_close_btn:true,
										stack: true,
										fullscreen:true,
										timeout:2000,
										sticky:false,
										has_progress:true,
										rtl:false,
									});
								setTimeout(function(){window.location.href='payment-methods.php';},1000);	
						</script>";
			}
		else if($delete_status==0)
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

		if($insert_status==1)
			{
				echo "<script>$.Toast('', 'Payment methods added successfully.', 'success', {
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
			
		if($update_status==1)
			{
				echo "<script>$.Toast('', 'Payment methods updated successfully.', 'success', {
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
