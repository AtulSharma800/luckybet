<?php
	include("../db.php");
	include("common/check_login.php");
	include("../common-details.php");
	$insert_status='2';
	$update_status='2';
	$delete_status='2';
	if(isset($_GET['delete_id']))
		{
			$query=mysqli_query($con,"delete from pharmacy_area where id='".$_GET['delete_id']."'");
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
			$state=mysqli_real_escape_string($con,$_POST['state']);
			$district=mysqli_real_escape_string($con,$_POST['district']);
			$area=mysqli_real_escape_string($con,$_POST['area']);
			$query=mysqli_query($con,"insert into pharmacy_area(state,district,area) values('$state','$district','$area')");
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
			$id=$_POST['pharmacy_area_id'];
			$state=mysqli_real_escape_string($con,$_POST['state']);
			$district=mysqli_real_escape_string($con,$_POST['district']);
			$area=mysqli_real_escape_string($con,$_POST['area']);
			$query=mysqli_query($con,"update pharmacy_area set state='$state',district='$district',area='$area' where id='$id'");
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
	<title>Pharmacy Area :: <?=$co_name;?></title>

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
		.symptom
			{
				padding:2px 4px;
				background:#ED0A0A;
				color:white;
				border-radius:4px;
				margin-right:5px;
				display:inline-block;
				margin-bottom:5px;
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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Pharmacy Area</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Pharmacy Area</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

				</div>
			</div>
			<!-- /page header -->

			<?php
				if(isset($_GET['edit_id']))
					{
						$query=mysqli_query($con,"select * from pharmacy_area where id='".$_GET['edit_id']."'");
						$res=mysqli_fetch_array($query);
						$state=$res['state'];
						$district=$res['district'];
						$area=$res['area'];
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
											echo "<h6 class='card-title'>Edit Pharmacy Area</h6>";
										}
									else
										{
											echo "<h6 class='card-title'>Add Pharmacy Area</h6>";
										}										
								?>
							</div>
							<hr style="margin-top:0px;margin-bottom:0px;">
							<form action="pharmacy-area.php" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
							<div class="card-body border-top-0 rounded-0 rounded-bottom tab-content mb-0">
								<div class="tab-pane fade active show" id="tab-dark-1">
									<fieldset>
										<div class="row">	
											<div class="col-md-12">
												<div class="form-group">
													<label>State</label>
													<input type="hidden" name="pharmacy_area_id" value="<?=@$_GET['edit_id'];?>">
													<select class="form-control select-search" id="state" name="state" onchange="geo_location.show_city()" data-fouc>
														<?php
															$query2=mysqli_query($con,"select * from geo_locations where location_type='STATE' order by name");
															while($res2=mysqli_fetch_array($query2))
																{
																	$id=$res2['id'];
																	$name=$res2['name'];
																	$selected="";
																	if(@$res['state']==$id)
																		{
																			$selected="selected";
																		}
																	echo "<option value='$id' $selected>$name</option>";
																}
														?>
													</select>
												</div>	
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>District</label>
													<select class="form-control select-search" id="city" name="district" data-fouc>
														<?php
															if(isset($_GET['edit_id']))
																{
																	$query2=mysqli_query($con,"select * from geo_locations where parent_id='".$res['state']."'");
																	while($res2=mysqli_fetch_array($query2))
																		{
																			$id=$res2['id'];
																			$name=$res2['name'];
																			$selected="";
																			if($id==@$res['district'])
																				{
																					$selected="selected";
																				}
																			echo "<option value='$id' $selected>$name</option>";
																		}
																}
															else
																{
																	echo "<option>Select State First</option>";
																}														
															
														?>
													</select>
												</div>
											</div>	
											<div class="col-md-12">
												<div class="form-group">
													<label>Area</label>
													<input type="text" name="area" value="<?=@$res['area'];?>" class="form-control">
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
								<h6 class="card-title">Pharmacy Area List</h6>
							</div>


							<div class="table-responsive">
								<table class="table datatable-save-state">
									<thead>
										<tr>
											<th style="width:30%">State</th>
											<th style="width:25%">City</th>
											<th style="width:30%">Area</th>
											<th class="text-center" style="width:15%">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$query=mysqli_query($con,"select * from pharmacy_area order by area");
											while($res=mysqli_fetch_array($query))
												{
													$query2=mysqli_query($con,"select * from geo_locations where id='".$res['state']."'");
													$res2=mysqli_fetch_array($query2);
													$state=$res2['name'];
													
													$query2=mysqli_query($con,"select * from geo_locations where id='".$res['district']."'");
													$res2=mysqli_fetch_array($query2);
													$district=$res2['name'];
										?>
													<tr>
														<td><?=$state;?></td>
														<td><?=$district;?></td>
														<td><?=$res['area'];?></td>
														<td class="text-center">
															<div class="list-icons">
																<div class="dropdown">
																	<a href="#" class="list-icons-item" data-toggle="dropdown">
																		<i class="icon-menu9"></i>
																	</a>

																	<div class="dropdown-menu dropdown-menu-right">
																		<a href="pharmacy-area.php?edit_id=<?=$res['id'];?>" class="dropdown-item"><i class="fa fa-pencil-square-o"></i> Edit</a>
																		<a href="pharmacy-area.php?delete_id=<?=$res['id'];?>" onclick="return confirm('Are you sure?')" class="dropdown-item"><i class="fa fa-trash-o"></i> Delete</a>
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
	<script src="js/geo_location.js"></script>
	<link rel="stylesheet" href="plugins/toast/toast.style.min.css">
	<script src="plugins/toast/toast.script.js"></script>
	<?php
		if($delete_status==1)
			{
				echo "<script>$.Toast('', 'Pharmacy area deleted successfully.', 'success', {
										has_icon:false,
										has_close_btn:true,
										stack: true,
										fullscreen:true,
										timeout:2000,
										sticky:false,
										has_progress:true,
										rtl:false,
									});
								setTimeout(function(){window.location.href='pharmacy-area.php';},1000);	
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
				echo "<script>$.Toast('', 'Pharmacy area added successfully.', 'success', {
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
				echo "<script>$.Toast('', 'Pharmacy area updated successfully.', 'success', {
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
