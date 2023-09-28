<?php
	include("../db.php");
	include("common/check_login.php");
	include("../common-details.php");
	if(isset($_GET['id']))
		{
			$query=mysqli_query($con,"delete from users where id='".$_GET['id']."'");
			$res=mysqli_affected_rows($con);
			if($res)
				{
					echo "<script>alert('This users deleted successfully.');window.location.href='users.php';</script>";
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
	<title>Reports :: <?=$co_name;?></title>

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
		.pagination 
			{
			  display: inline-block;
			}
		.pagination a 
			{
				color: black;
				float: left;
				padding: 8px 16px;
				text-decoration: none;
			}
		.pagination a.active 
			{
				background-color: #4CAF50;
				color: white;
				border-radius: 5px;
			}
		.pagination a:hover:not(.active) 
			{
				background-color: #ddd;
				border-radius: 5px;
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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Reports</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Reports</span>
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
								<h6 class="card-title">Reports</h6>
								<!--<div class="header-elements">
									<a href="user-add.php"><span class="badge bg-success badge-pill">ADD NEW</span></a>
								</div>-->
							</div>


							<div class="table-responsive">
								<table class="table datatable-save-state">
									<thead>
										<tr>
										    <th style="width:10%">Date</th>
										    <th style="width:20%">Employee</th>
											<th style="width:30%">Working Area</th>
											<th style="width:12%">Cards Made</th>
											<th style="width:10%">Distributed</th>
											<th style="width:10%">Canceled</th>
											<th class="text-center" style="width:8%">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
                        					$query=mysqli_query($con,"select * from daily_report order by created_at");
                        					$num=mysqli_num_rows($query);
                        					if($num>0)
                        						{
                        							while($res=mysqli_fetch_array($query))
                        								{
                        									$employee_id=$res['employee_id'];
                        									
                        									$query2=mysqli_query($con,"select * from employee where id='$employee_id'");
                        									$res2=mysqli_fetch_array($query2);
                        									$employee_name=$res2['name'];
                        									$employee_mobile=$res2['mobile'];
                        									
                        									$a=date_create_from_format("Y-m-d h:i:s",$res['created_at']);
                        									$created_at=date_format($a,"d M, Y h:i:s");
                        									
                        									$state_id=$res['state'];
                        									$district_id=$res['district'];
                        									$query2=mysqli_query($con,"select * from geo_locations where id='$state_id'");
                        									$res2=mysqli_fetch_array($query2);
                        									$state_name=$res2['name'];
                        
                        									$query2=mysqli_query($con,"select * from geo_locations where id='$district_id'");
                        									$res2=mysqli_fetch_array($query2);
                        									$district_name=$res2['name'];	
                        									
                        									$block=$res['block'];
                        									$village=$res['village'];
                        									
                        				?>
        													<tr>
        												    	<td><center><?=$created_at;?></center></td>
        												    	<td><?=$employee_name;?> - <?=$employee_mobile;?></td>
        														<td><?=$village;?>, <?=$block;?>, <?=$district_name;?>, <?=$state_name;?></td>
        														<td><?=$res['cards_made'];?></td>
        														<td><?=$res['cards_distribute'];?></td>
        														<td><?=$res['cards_canceled'];?></td>
        														<td class="text-center">
        															<div class="list-icons">
        																<div class="dropdown">
        																	<a href="#" class="list-icons-item" data-toggle="dropdown">
        																		<i class="icon-menu9"></i>
        																	</a>
        																	<div class="dropdown-menu dropdown-menu-right">
        																		<a href="report-edit.php?id=<?=$res['id'];?>" class="dropdown-item"><i class="fa fa-trash-o"></i>Edit</a>
        																	</div>
        																</div>
        															</div>
        														</td>
        													</tr>
										<?php
												        }
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
