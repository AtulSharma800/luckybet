<?php
	include("../db.php");
	include("common/check_login.php");
	include("../common-details.php");
	
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jan 2021 12:06:00 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Health Cards :: <?=$co_name;?></title>

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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Health Cards</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Health Cards</span>
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
								<h6 class="card-title">Health Cards</h6>
								<div class="header-elements">
									<a href="make-health-card.php"><span class="badge bg-success badge-pill">ADD NEW</span></a>
								</div>
							</div>


							<div class="table-responsive">
								<table class="table datatable-save-state">
									<thead>
										<tr>
											<th style="width:20%">Name</th>
											<th style="width:10%">ID</th>
											<th style="width:10%">Mobile</th>
											<th style="width:20%">Made By</th>
											<th style="width:20%">Plan</th>
											<th style="width:10%">Status</th>
											<th class="text-center" style="width:10%">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$query=mysqli_query($con,"select * from users order by name");
											while($res=mysqli_fetch_array($query))
												{
													$name=$res['name'];
													$user_id=$res['id'];
													$user_code=$res['user_id'];
													$front_file_name=$user_code."-front.png";
													$back_file_name=$user_code."-back.png";
													$mobile=$res['mobile'];
													$query2=mysqli_query($con,"select * from plan where member_id='$user_id' order by id desc limit 1");
													$num2=mysqli_num_rows($query2);
													if($num2>0)
														{
															$res2=mysqli_fetch_array($query2);
															$employee_id=$res2['employee_id'];
															if($employee_id==0)
																{
																	$made_by="Admin";
																}
															else
																{
																	$query3=mysqli_query($con,"select * from employee where id='$employee_id'");
																	$res3=mysqli_fetch_array($query3);
																	$made_by=$res3['name'];
																}
															$plan_id=$res2['plan_id'];
															$query3=mysqli_query($con,"select * from health_package_detail where id='$plan_id'");
															$res3=mysqli_fetch_array($query3);
															$plan=$res3['duration']." Month";
										?>
															<tr>
																<td><?=$name;?></td>
																<td><?=$user_code;?></td>
																<td><?=$mobile;?></td>
																<td><?=$made_by;?></td>
																<td><?=$plan;?></td>
																<?php
																	if($res['status']=='Active')
																		{
																?>
																<td><span class="badge badge-success"><?=$res['status'];?></span></td>
																<?php
																		}
																	else
																		{
																?>
																<td><span class="badge badge-danger"><?=$res['status'];?></span></td>
																<?php
																		}				
																?>
																<td class="text-center">
																	<div class="list-icons">
																		<div class="dropdown">
																			<a href="#" class="list-icons-item" data-toggle="dropdown">
																				<i class="icon-menu9"></i>
																			</a>

																			<div class="dropdown-menu dropdown-menu-right">
																				<?php
																					if(file_exists("../images/idcards/$front_file_name"))
																						{
																							echo "<a href='download.php?filename=$front_file_name' class='dropdown-item'><i class='fa fa-download'></i> Download Front Card</a>";
																						}
																					if(file_exists("../images/idcards/$back_file_name"))
																						{
																							echo "<a href='download.php?filename=$back_file_name' class='dropdown-item'><i class='fa fa-download'></i> Download Back Card</a>";
																						}
																					if(file_exists("../images/idcards/$front_file_name"))
																						{
																							echo "<a href='generate-health-card.php?user_id=$user_id&plan_id=$plan_id' class='dropdown-item'><i class='fa fa-id-card-o'></i>Re-generate Health Card</a>";
																						}
																					else
																						{
																							echo "<a href='generate-health-card.php?user_id=$user_id&plan_id=$plan_id' class='dropdown-item'><i class='fa fa-id-card-o'></i>Generate Health Card</a>";
																						}																						
																				?>
																				
																				<a onclick="health_card.delete(<?=$res['id'];?>)" class="dropdown-item"><i class="fa fa-trash-o"></i> Delete</a>
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
