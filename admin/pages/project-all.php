<?php
	session_start();
	include("../db.php");
	include("common/check_login.php");
	include("image_resize/resize_tool2.php");
	if(isset($_GET['project_id']))
		{
			$query=mysqli_query($con,"delete from project where id='".$_GET['project_id']."'");
			$query=mysqli_query($con,"delete from project_floor_plan_faq where project_id='".$_GET['project_id']."'");
			$query=mysqli_query($con,"delete from project_gallery where project_id='".$_GET['project_id']."'");
			$query=mysqli_query($con,"delete from project_nearby_places where project_id='".$_GET['project_id']."'");
			$query=mysqli_query($con,"delete from project_offer where project_id='".$_GET['project_id']."'");
			$res=mysqli_affected_rows($con);
			if($res)
				{
					echo "<script>alert('This project deleted successfully.');window.location.href='project-all.php';</script>";
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
	<title>All Projects :: Dreams Bhoomi</title>

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
		#page-loader
			{
				background:rgba(0,176,159,0.2);
				width:100%;
				height:100%;
				left:0;
				top:0%;
				position:fixed;
				display:none;
				z-index:9990;
				justify-content:center;
				align-items:center;
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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - All Projects</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">All Projects</span>
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
								<h6 class="card-title">All Projects</h6>
							</div>


							<div class="table-responsive">
								<table class="table datatable-save-state">
									<thead>
										<tr>
											<th style="width:10%">Image</th>
											<th style="width:20%">Title</th>
											<th style="width:10%">City</th>
											<th style="width:30%">Address</th>
											<th style="width:12%">Category</th>
											<th style="width:10%">Status</th>
											<th class="text-center" style="width:8%">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$query=mysqli_query($con,"select * from project");
											while($res=mysqli_fetch_array($query))
												{
													$project_id=$res['id'];
													$title=$res['title'];
													$city=$res['city'];
													$address=$res['address'];
													$category=$res['category'];
													$image_name=$res['image'];
													$width=70;
													$height=70;
													$a=explode(".",$image_name);
													$new_name=$a[0]."".$width."x".$height.".".$a[1];
													if(file_exists("upload/thumbs/$new_name"))
														{
															$image="upload/thumbs/$new_name";
														}
													else
														{												
															$image=resize_image("upload/project/main_image/$image_name",70,70);
														}
													$badge="badge-info";
													$status="";
													if($res['status']=='On Going')
														{
															$badge="badge-success";
															$status="On Going";
														}
													else if($res['status']=='Upcoming')
														{
															$badge="badge-danger";
															$status="Upcoming";
														}
													else if($res['status']=='Delivered')
														{
															$badge="badge-danger";
															$status="Delivered";
														}
														
										?>
													<tr id='<?=$id;?>'>
														<td><img src="<?=$image;?>" class="rounded-circle" alt=""></td>
														<td><?=$title;?></td>
														<td><?=$city;?></td>
														<td><?=$address;?></td>
														<td><?=$category;?></td>
														<td class='status'><span class="badge <?=$badge;?>"><?=$status;?></span></td>
														<td class="text-center">
															<div class="list-icons">
																<div class="dropdown">
																	<a href="#" class="list-icons-item" data-toggle="dropdown">
																		<i class="icon-menu9"></i>
																	</a>

																	<div class="dropdown-menu dropdown-menu-right">
																		<a href="project-edit.php?project_id=<?=$project_id;?>" class="dropdown-item"><i class="fa fa-pencil-square-o"></i> Edit</a>
																		<a onclick="project.delete(<?=$project_id;?>)" class="dropdown-item"><i class="fa fa-trash-o"></i> Delete</a>
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
	<script src="js/project.js"></script>
</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jan 2021 12:21:06 GMT -->
</html>
