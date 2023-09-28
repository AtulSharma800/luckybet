<?php
	include("../db.php");
	include("common/check_login.php");
	include("../common-details.php");
	if(isset($_GET['id']))
		{
			$query=mysqli_query($con,"delete from enquiry where id='".$_GET['id']."'");
			$res=mysqli_affected_rows($con);
			if($res)
				{
					echo "<script>alert('This enquiry deleted successfully.');window.location.href='index.php';</script>";
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
	<title>Home :: <?=$co_name;?></title>

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
	<script src="global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="global_assets/js/plugins/pickers/daterangepicker.js"></script>

	<script src="assets/js/app.js"></script>
	<script src="global_assets/js/demo_pages/dashboard.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/sparklines.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/lines.js"></script>	
	<script src="global_assets/js/demo_charts/pages/dashboard/light/areas.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/donuts.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/bars.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/progress.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/pies.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/bullets.js"></script>
	<!-- /theme JS files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
	</style>
	<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('b8ccdc91feaf55b821de', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert('New payment received plz check');
      
    });
  </script>
  
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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Dashboard</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Dashboard</span>
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
								<h6 class="card-title">Recently Added Users</h6>
								<div class="header-elements">
									<a href="users.php"><span class="badge bg-success badge-pill">Show All</span></a>
								</div>
							</div>


							<div class="table-responsive">
								<table class="table datatable-save-state">
									<thead>
										<tr>
										    <th style="width:10%">Image</th>
										    <th style="width:10%">User Id</th>
											<th style="width:20%">Name</th>
											<th style="width:10%">Mobile</th>
											<th style="width:10%">Password</th>
											<th style="width:10%">Email</th>
											<th style="width:10%">City</th>
											<th style="width:22%">Joining Date</th>
											<th class="text-center" style="width:8%">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$current_date=date("Y-m-d");
											$query=mysqli_query($con,"select * from users order by joining_date desc limit 10");
											while($res=mysqli_fetch_array($query))
												{
												    $id=$res['id'];
													$user_id=$res['user_id'];
													$name=$res['name'];
													$mobile=$res['mobile'];
													$email=$res['email'];
													if(!empty($res['profile']))
														{
															$image="../images/profile/".$res['profile'];
														}
													else
														{
															$image="../img/icons/user-icon.png";
														}
													$gender=$res['gender'];
													$city_id=$res['city'];
													$query2=mysqli_query($con,"select * from geo_locations where id='$city_id'");
													$res2=mysqli_fetch_array($query2);
													$city=@$res2['name'];
													$a=date_create_from_format("Y-m-d h:i a",$res['joining_date']);
													$joining_date=date_format($a,"d, M Y h:i a");
										?>
													<tr>
												    	<td><center><img src="<?=$image;?>" style="width:80px;object-fit:cover;"></center></td>
														<td><?=$user_id;?></td>
														<td><?=$name;?></td>
														<td><?=$mobile;?></td>
														<td><?=$res['password'];?></td>
														<td><?=$email;?></td>
														<td><?=$city;?></td>
														<td><?=$joining_date;?></td>
														<td class="text-center">
															<div class="list-icons">
																<div class="dropdown">
																	<a href="#" class="list-icons-item" data-toggle="dropdown">
																		<i class="icon-menu9"></i>
																	</a>
																	<div class="dropdown-menu dropdown-menu-right">
																		<a href="user-profile.php?user_id=<?=$res['id'];?>" class="dropdown-item"><i class="fa fa-trash-o"></i>View</a>
																		<a href="user-edit.php?user_id=<?=$res['id'];?>" class="dropdown-item"><i class="fa fa-trash-o"></i>Edit</a>
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
</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jan 2021 12:21:06 GMT -->
</html>
