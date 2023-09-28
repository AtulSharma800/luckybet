<?php
	session_start();
	include("../db.php");
	include("common/check_login.php");
	include("image_resize/resize_tool2.php");
	if(isset($_GET['id']))
		{
			$query=mysqli_query($con,"delete from tour_enquiry where id='".$_GET['id']."'");
			if($res)
				{
					echo "<script>alert('This enquiry deleted successfully.');window.location.href='all-enquiry.php';</script>";
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
	<title>Confirm Enquiry :: Brij Dham Yatra</title>

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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Confirm Enquiry</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Confirm Enquiry</span>
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
								<h6 class="card-title">Confirm Enquiry</h6>
							</div>


							<div class="table-responsive">
								<table class="table datatable-save-state">
									<thead>
										<tr>
											<th style="width:5%;">S.No.</th>
											<th style="width:29%;">Package</th>
											<th style="width:15%;">Name</th>
											<th style="width:10%;">Mobile</th>
											<th style="width:15%;">Email</th>
											<th style="width:14%;">Date</th>
											<th style="width:6%;">People</th>
										    <th class="text-center" style="width:6%">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i=0;
											$member_id=$_SESSION['member_id'];
											$query=mysqli_query($con,"select * from tour_enquiry where status='Approved'");
											while($res=mysqli_fetch_array($query))
												{
													$package_id=$res['package_id'];
													$query2=mysqli_query($con,"select * from package where id='$package_id'");
													$res2=mysqli_fetch_array($query2);
													$package=$res2['title'];
													$name=$res['name'];
													$mobile=$res['mobile'];
													$email=$res['email'];
													$b=date_create_from_format("Y-m-d",$res['enquiry_date']);
													$date=date_format($b,"d-m-Y");
													$people=$res['people'];
													$status=$res['status'];
													$i++;
													$badge="badge-info";
													$status="Pending";
													if($res['status']=='Approved')
														{
															$badge="badge-success";
															$status="Approved";
														}
													else if($res['status']=='Unapproved')
														{
															$badge="badge-danger";
															$status="Unapproved";
														}
													$id=$res['id'];	
										?>
													<tr id='<?=$id;?>'>
														<td><?=$i;?></td>
														<td><?=$package;?></td>
														<td><?=$name;?></td>
														<td><?=$mobile;?></td>
														<td><?=$email;?></td>
														<td><?=$date;?></td>
														<td><?=$people;?></td>
														<td class="text-center">
															<div class="list-icons">
																<div class="dropdown">
																	<a href="#" class="list-icons-item" data-toggle="dropdown">
																		<i class="icon-menu9"></i>
																	</a>

																	<div class="dropdown-menu dropdown-menu-right">
																		<a onclick="enquiry.delete(<?=$id;?>)" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
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
<div class="page-loader" id="page-loader"><img src="img/gif/page-loader.gif" width="100px;"></div>
	<script src="js/enquiry.js"></script>
</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jan 2021 12:21:06 GMT -->
</html>
