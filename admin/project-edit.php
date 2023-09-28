<?php
	session_start();
	include("../db.php");
	include("common/check_login.php");
	if(isset($_POST['submit']))
		{
			$project_id=$_GET['project_id'];
			$date_added=date("Y-m-d");
			$title=mysqli_real_escape_string($con,$_POST['title']);
			$category=mysqli_real_escape_string($con,$_POST['category']);
			$status=mysqli_real_escape_string($con,$_POST['status']);
			$keywords=mysqli_real_escape_string($con,$_POST['keywords']);
			$address=mysqli_real_escape_string($con,$_POST['address']);
			$city=mysqli_real_escape_string($con,$_POST['city']);
			$description=mysqli_real_escape_string($con,$_POST['description']);
			$aminities=mysqli_real_escape_string($con,serialize($_POST['aminities']));
			$facebook=mysqli_real_escape_string($con,$_POST['facebook']);
			$twitter=mysqli_real_escape_string($con,$_POST['twitter']);
			$instagram=mysqli_real_escape_string($con,$_POST['instagram']);
			$youtube=mysqli_real_escape_string($con,$_POST['youtube']);
			$whatsapp=mysqli_real_escape_string($con,$_POST['whatsapp']);
			$location_link=mysqli_real_escape_string($con,$_POST['location_link']);
			$seo_url=mysqli_real_escape_string($con,$_POST['seo_url']);
			$main_image="";
			//Main Image Upload	
			if(!empty($_FILES['main_image']['name']))
				{
					$a=explode(".",$_FILES['main_image']['name']);
					$extension=$a[1];
					$main_image="$title".time().".".$extension;
					move_uploaded_file($_FILES['main_image']['tmp_name'],"upload/project/main_image/$main_image");
					$query=mysqli_query($con,"update projects set image='$main_image' where id='$project_id'");
				}
			$location="";	
			//Location Image Upload	
			if(!empty($_FILES['location']['name']))
				{
					if(strlen($_FILES['location']['name'][0])>3)
						{
							$a=explode(".",$_FILES['location']['name'][0]);
							$extension=$a[1];
							$location=$title."location".time().".".$extension;
							move_uploaded_file($_FILES['location']['tmp_name'][0],"upload/project/location/$location");
							$query=mysqli_query($con,"update projects set location_image='$location' where id='$project_id'");
						}
				}	
			
			//insert package details
			$query=mysqli_query($con,"update projects set title='$title', category='$category', keywords='$keywords', seo_url='$seo_url', address='$address', city='$city', description='$description', aminities='$aminities', facebook='$facebook', twitter='$twitter', instagram='$instagram', youtube='$youtube', whatsapp='$whatsapp',status='$status',location_link='$location_link' where id='$project_id'");
			//Project Gallery Upload
			$gallery=$_FILES['gallery']['name'];
			$i=0;
			foreach($gallery as $image)
				{
					if(!empty($_FILES['gallery']['name'][$i]))
						{
							$a=explode(".",$_FILES['gallery']['name'][$i]);
							$extension=$a[1];
							$main_image=$title."gallery-$i".time().".".$extension;
							move_uploaded_file($_FILES['gallery']['tmp_name'][$i],"upload/project/gallery/$main_image");
							mysqli_query($con,"insert into project_gallery(project_id,image) values('$project_id','$main_image')");
							$i++;
						}
				}
			//Project Floor Plan Upload
			$floor_plan=$_FILES['floor_plan']['name'];
			$i=0;
			foreach($floor_plan as $image)
				{
					if(!empty($_FILES['floor_plan']['name'][$i]))
						{
							$a=explode(".",$_FILES['floor_plan']['name'][$i]);
							$extension=$a[1];
							$main_image=$title."floor_plan-$i".time().".".$extension;
							move_uploaded_file($_FILES['floor_plan']['tmp_name'][$i],"upload/project/floor_plan/$main_image");
							mysqli_query($con,"insert into project_floor_plan(project_id,image) values('$project_id','$main_image')");
							$i++;
						}
				}
			//Project Offer Upload
			$offer=$_FILES['offer']['name'];
			$i=0;
			foreach($offer as $image)
				{
					if(!empty($_FILES['offer']['name'][$i]))
						{
							$a=explode(".",$_FILES['offer']['name'][$i]);
							$extension=$a[1];
							$main_image=$title."offer-$i".time().".".$extension;
							move_uploaded_file($_FILES['offer']['tmp_name'][$i],"upload/project/offer/$main_image");
							mysqli_query($con,"insert into project_offer(project_id,image) values('$project_id','$main_image')");
							$i++;
						}
				}
			//Project Near By Place Upload
			$nearby_title=$_POST['near_by_place_title'];
			$near_by_place_id=@$_POST['near_by_place_id'];
			$near_by_count=count($near_by_place_id);
			$nearby_distance=$_POST['near_by_place_distance'];
			$nearby_image=$_FILES['near_by_place_image']['name'];
			$i=0;
			$j=1;
			foreach($nearby_image as $image)
				{
					if($j<=$near_by_count)
						{
							$id=$near_by_place_id[$i];
							if(!empty($_FILES['near_by_place_image']['name'][$i]))
								{
									$a=explode(".",$_FILES['near_by_place_image']['name'][$i]);
									$extension=$a[1];
									$main_image=$title."near-by-place-image-$i".time().".".$extension;
									move_uploaded_file($_FILES['near_by_place_image']['tmp_name'][$i],"upload/project/nearby_place/$main_image");
									mysqli_query($con,"update project_nearby_places set image='$main_image' where id='$id'");
								}
							$nearby_title=$nearby_title[$i];
							$nearby_distance=$nearby_distance[$i];
							mysqli_query($con,"update project_nearby_places set title='$title',distance='$nearby_distance' where id='$id'");
							$i++;	
						}
					else
						{					
							if(!empty($_FILES['near_by_place_image']['name'][$i]))
								{
									$a=explode(".",$_FILES['near_by_place_image']['name'][$i]);
									$extension=$a[1];
									$main_image=$title."near-by-place-image-$i".time().".".$extension;
									move_uploaded_file($_FILES['near_by_place_image']['tmp_name'][$i],"upload/project/nearby_place/$main_image");
									$nearby_title=$nearby_title[$i];
									$nearby_distance=$nearby_distance[$i];
									mysqli_query($con,"insert into project_nearby_places(project_id,title,distance,image) values('$project_id','$nearby_title','$nearby_distance','$main_image')");
									$i++;
								}
						}
					$j++;	
				}	
			echo "<script>alert('Project Updated Successfully.');</script>";	
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
	<title>Edit Project :: Dreams Bhoomi</title>

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
	<script src="global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="global_assets/js/plugins/forms/styling/switch.min.js"></script>
	<script src="global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
	
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
		#main_image,.near_by_image_file
			{
				position:fixed;
				left:-2000px;
			}
		.main_image,.near-by-place-image
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
		.gallery,.floor-plan,.offer
			{
				margin-top: 20px;
				border: 1px solid #C1C1C1;
				padding: 10px;
			}	
		.gallery img,.floor-plan img,.offer img
			{
				width:200px !important;
				margin:10px;
			}
		.near-by-place-image img,.near-by-place-image img	
			{
				width:100% !important;
				margin:10px;
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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Edit Project</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Edit Project</span>
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
								<h6 class="card-title">Edit Project</h6>
								
								<div class="header-elements">
									<a onclick="project.update()"><span class="badge bg-info badge-pill" style="cursor:pointer;font-size:14px;">SAVE</span></a><a href="project-all.php"><span class="badge bg-success badge-pill" style="font-size:14px;">PROJECT LIST</span></a>
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

										<li class="nav-item dropdown">
											<a href="#tab-dark-2" class="navbar-nav-link" data-toggle="tab">
												<i class="fa fa-certificate mr-2" aria-hidden="true"></i>
												Aminities
											</a>
										</li>

										<li class="nav-item dropdown">
											<a href="#tab-dark-3" class="navbar-nav-link" data-toggle="tab">
												<i class="fa fa-user mr-2" aria-hidden="true"></i>
												Social Media Links
											</a>
										</li>

										<li class="nav-item dropdown">
											<a href="#tab-dark-4" class="navbar-nav-link" data-toggle="tab">
												<i class="fa fa-picture-o mr-2" aria-hidden="true"></i>
												Gallery
											</a>
										</li>
										
										<li class="nav-item dropdown">
											<a href="#tab-dark-5" class="navbar-nav-link" data-toggle="tab">
												<i class="fa fa-bed mr-2" aria-hidden="true"></i>
												Floor Plan
											</a>
										</li>
										
										<li class="nav-item dropdown">
											<a href="#tab-dark-6" class="navbar-nav-link" data-toggle="tab">
												<i class="fa fa-university mr-2" aria-hidden="true"></i>
												Near By Places
											</a>
										</li>
										
										<li class="nav-item dropdown">
											<a href="#tab-dark-7" class="navbar-nav-link" data-toggle="tab">
												<i class="fa fa-diamond mr-2" aria-hidden="true"></i>
												Offers
											</a>
										</li>
										
										<li class="nav-item dropdown">
											<a href="#tab-dark-8" class="navbar-nav-link" data-toggle="tab">
												<i class="fa fa-map-marker mr-2" aria-hidden="true"></i>
												Location
											</a>
										</li>
									</ul>
								</div>
							</div>
						<?php
							$project_id=$_GET['project_id'];
							$query=mysqli_query($con,"select * from projects where id='$project_id'");
							$res=mysqli_fetch_array($query);
							$aminities=unserialize($res['aminities']);
						?>
						<form action="project-edit.php?project_id=<?=$project_id;?>" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
							<div class="card card-body border-top-0 rounded-0 rounded-bottom tab-content mb-0">
								<!--Basic Details-->
								<div class="tab-pane fade active show" id="tab-dark-1">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="file" name="main_image" id="main_image" class="form-control">
												<div class="main_image img-thumbnail" onclick="project.select_image()">
													<p style="font-size:24px;text-align:center;">	
														<?php
															if(!empty($res['image']))
																{
														?>
																	<img src="<?php echo 'upload/project/main_image/'.$res['image'];?>" style="width:100%;display:block">
														<?php
																}
															else
																{															
														?>	
																	<img src="img/icon/upload.png" style="width:150px;display:block"></br>
																	Size 1920px * 500px
														<?php
																}
														?>
													</p>	
												</div>
											</div>
										</div>
									</div>	
									<fieldset>
										<legend>Basic Details</legend>
										<div class="row">	
											<div class="col-md-12">
												<div class="form-group">
													<label>Title</label>
													<input type="text" name="title" class="form-control" value="<?=$res['title'];?>">
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Category</label>
													<select name="category" id="category" class="form-control">
														<option value="">All Categories</option>	
														<option value="Residential" <?php if($res['category']=='Residential'){echo "selected";} ?>>Residential</option>	
														<option value="Commercial" <?php if($res['category']=='Commercial'){echo "selected";} ?>>Commercial</option>	
													</select>
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Status</label>
													<select name="status" id="status" class="form-control">
														<option value="">All Status</option>	
														<option value="On Going" <?php if($res['status']=='On Going'){echo "selected";} ?>>On Going</option>	
														<option value="Delivered" <?php if($res['status']=='Delivered'){echo "selected";} ?>>Delivered</option>	
														<option value="Upcoming" <?php if($res['status']=='Upcoming'){echo "selected";} ?>>Upcoming</option>	
													</select>
												</div>	
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Keywords</label>
													<input type="text" name="keywords" placeholder="maximum 15, should be seprated by comma" class="form-control" value="<?=$res['keywords'];?>">
												</div>	
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>SEO url</label>
													<input type="text" name="seo_url" placeholder="Replace blank space with '-' or '_'" class="form-control" value="<?=$res['seo_url'];?>">
												</div>	
											</div>
										</div>	
									</fieldset>
									
									<fieldset>
										<legend>Address Details</legend>
										<div class="row">	
											<div class="col-md-12">
												<div class="form-group">
													<label>Address</label>
													<input type="text" name="address" placeholder="Address Of Your Hotel" class="form-control" value="<?=$res['address'];?>">
												</div>	
											</div>
											<!--<div class="col-md-6">
												<div class="form-group">
													<label>Longitude (Drag marker on the map)</label>
													<input type="text" name="longitude" class="form-control">
												</div>	
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Latitude (Drag marker on the map)</label>
													<input type="text" name="latitude" class="form-control">
												</div>	
											</div>
											<div class="col-md-12">
												<div class="map-container">
													<div id="singleMap" class="vis-map" data-latitude="40.7427837" data-longitude="-73.11445617675781"></div>
												</div>
											</div>-->
											<div class="col-md-12">
												<div class="form-group">
													<label>City / Location</label>
													<select name="city" class="form-control">
														<option>Select City</option>
														<?php
															$query2=mysqli_query($con,"select * from city order  by name");
															while($res2=mysqli_fetch_array($query2))
																{
																	$city_name=$res2['name'];
																	$selected="";
																	if($res['city']==$city_name)
																		{
																			$selected="selected";
																		}
																	echo "<option value='$city_name' $selected>$city_name</option>";
																}
														?>
													</select>
												</div>	
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Location Link</label>
													<input type="text" name="location_link" placeholder="Link Of Google Map" value="<?=$res['location_link'];?>" class="form-control">
												</div>	
											</div>
										</div>	
									</fieldset>
									<fieldset>
										<legend>Description</legend>
										<div class="row">
											<div class="input-field col-md-12">
												<label for="textarea1">Descriptions:</label>
												<textarea  name="description" id="description" class="form-control"><?=$res['description'];?></textarea>
											</div>
										</div>
									</fieldset>				
									<div class="row" style="position:fixed;left:-2000px;">
										<div class="input-field col s12">
											<input type="submit" class="waves-effect waves-light btn-large" id="submit" name="submit" value="Submit">
										</div>
									</div>
								</div>
								<!--Basic Details Ends-->
								<!--Aminities-->
								<div class="tab-pane fade" id="tab-dark-2">
									<div class="col-md-12">
										<div class="form-group">
											<label class="d-block font-weight-semibold">Aminities</label>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input-styled" name="aminities[]" value="Gated Society" <?php if(@in_array('Gated Society',@$aminities)){echo "checked";} ?> data-fouc>
													Gated Society
												</label>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input-styled" name="aminities[]" value="Park" <?php if(@in_array('Park',@$aminities)){echo "checked";} ?> >
													Park
												</label>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input-styled" name="aminities[]" value="Water Supply" <?php if(@in_array('Water Supply',@$aminities)){echo "checked";} ?> >
													Water Supply
												</label>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input-styled" name="aminities[]"  value="Temple" <?php if(@in_array('Temple',@$aminities)){echo "checked";} ?>>
													Temple
												</label>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input-styled" name="aminities[]" value="Siwer" <?php if(@in_array('Siwer',@$aminities)){echo "checked";} ?>>
													Siwer
												</label>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input-styled" name="aminities[]" value="Light" <?php if(@in_array('Light',@$aminities)){echo "checked";} ?>>
													Light
												</label>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input-styled" name="aminities[]" value="24*7 Security" <?php if(@in_array('24*7 Security',@$aminities)){echo "checked";} ?>>
													24*7 Security
												</label>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input-styled" name="aminities[]" value="CCTV" <?php if(@in_array('CCTV',@$aminities)){echo "checked";} ?>>
													CCTV
												</label>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input-styled" name="aminities[]" value="Intercom" <?php if(@in_array('Intercom',@$aminities)){echo "checked";} ?>>
													Intercom
												</label>
											</div>
										</div>	
									</div>
								</div>
								<!--Aminites Ends-->
								<!--Social Details-->
								<div class="tab-pane fade" id="tab-dark-3">
									<div class="col-md-12">
										<div class="form-group">
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="text" class="form-control form-control-lg" name="facebook" placeholder="https://www.facebook.com/" value="<?=$res['facebook'];?>">
												<div class="form-control-feedback form-control-feedback-lg" style="padding-left:4px;">
													<img src="img/icon/facebook.png" style="width:35px;">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="text" class="form-control form-control-lg" name="twitter" placeholder="https://www.twitter.com/" value="<?=$res['twitter'];?>">
												<div class="form-control-feedback form-control-feedback-lg" style="padding-left:4px;">
													<img src="img/icon/twitter.png" style="width:35px;">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="text" class="form-control form-control-lg" name="instagram" placeholder="https://www.instagram.com/" value="<?=$res['instagram'];?>">
												<div class="form-control-feedback form-control-feedback-lg" style="padding-left:4px;">
													<img src="img/icon/instagram.png" style="width:35px;">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="text" class="form-control form-control-lg" name="youtube" placeholder="https://www.youtube.com/" value="<?=$res['youtube'];?>">
												<div class="form-control-feedback form-control-feedback-lg" style="padding-left:4px;">
													<img src="img/icon/youtube.png" style="width:35px;">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="text" class="form-control form-control-lg" name="whatsapp" placeholder="9874563210" value="<?=$res['whatsapp'];?>">
												<div class="form-control-feedback form-control-feedback-lg" style="padding-left:4px;">
													<img src="img/icon/whatsapp.png" style="width:35px;">
												</div>
											</div>
										</div>										
									</div>
								</div>
								<!--Social Detail Ends-->
								<!--Gallery-->
								<div class="tab-pane fade" id="tab-dark-4">
									<div class="col-md-12">
										<div class="gallery2 row" >
											<?php
												$query2=mysqli_query($con,"select * from project_gallery where project_id='$project_id'");
												while($res2=mysqli_fetch_array($query2))
													{
														$image=$res2['image'];
														$id=$res2['id'];
														echo "<div class='col-md-3' id='gallery_photo$id'><div class='row'><img class='img-thumbnail img-responsive' src='upload/project/gallery/$image'><span class='btn btn-danger' style='position: absolute;right: 28px;padding: 2px 10px 0px 10px;margin-top: 0px;margin-top: 22px;' onclick='project.delete_gallery($id)'><i class='fa fa-trash-o'></i></span></div></div>";
													}
											?>
										</div>
										<input type="file" name="gallery[]" multiple id="gallery-photo-add">
										<div class="gallery"></div>
									</div>
								</div>
								<!--Gallery Ends-->
								<!--Floor Plan-->
								<div class="tab-pane fade" id="tab-dark-5">
									<div class="col-md-12">
										<div class="floor_plan2 row" >
											<?php
												$query2=mysqli_query($con,"select * from project_floor_plan where project_id='$project_id'");
												while($res2=mysqli_fetch_array($query2))
													{
														$image=$res2['image'];
														$id=$res2['id'];
														echo "<div class='col-md-3' id='floor-plan$id'><div class='row'><img class='img-thumbnail img-responsive' src='upload/project/floor_plan/$image'><span class='btn btn-danger' style='position: absolute;right: 28px;padding: 2px 10px 0px 10px;margin-top: 0px;margin-top: 22px;' onclick='project.delete_floor_plan($id)'><i class='fa fa-trash-o'></i></span></div></div>";
													}
											?>
										</div>
										<input type="file" name="floor_plan[]" multiple id="floor-plan-add" onchange="project.upload_multiple(this,'#floor-plan')">
										<div class="floor-plan" id="floor-plan"></div>
									</div>
								</div>
								<!--Floor Plan Ends-->
								<!--Near By Places-->
								<div class="tab-pane fade" id="tab-dark-6">
									<div class="navbar navbar-expand-xl navbar-dark bg-indigo-400 navbar-component rounded-top mb-0" style="background:#DC6300">
										<div class="d-xl-none">
											<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-demo-dark">
												<i class="icon-menu"></i>
											</button>
										</div>
									</div>
									<div class="card card-body border-top-0 rounded-0 rounded-bottom tab-content mb-0">
										<?php
											$i=0;
											$query2=mysqli_query($con,"select * from project_nearby_places where project_id='$project_id'");
											while($res2=mysqli_fetch_array($query2))
												{
													$i++;
										?>
													<div class="row" id="near-by-place-image-<?=$i;?>-<?=$i;?>" style="padding:20px;background:aliceblue;margin-bottom:20px;">
														<div class="col-md-6">
															<div class="col-md-12">
																<div class="form-group">
																	<label>Title</label>
																	<input type="text" name="near_by_place_title[]" value="<?=$res2['title'];?>" class="form-control room_title">
																	<input type="hidden" name="near_by_place_id[]" value="<?=$res2['id'];?>">
																</div>	
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<label>Distance</label>
																	<input type="text" name="near_by_place_distance[]" value="<?=$res2['distance'];?>" class="form-control">
																</div>	
															</div>
															<div class="col-md-12">
																<p><span class="btn btn-danger" onclick="project.delete_nearby_places(<?=$i;?>,<?=$res2['id'];?>)">DELETE</span></p>
															</div>
														</div>	
													
														<div class="col-md-6">
															<input type="file" name="near_by_place_image[]" class='near_by_image_file' onchange="project.upload_multiple(this,'#near-by-place-image<?=$i;?>')">
															<div class="near-by-place-image img-thumbnail" id="near-by-place-image<?=$i;?>" onclick="project.select_any_image(<?=$i;?>)">
																<p style="font-size:24px;text-align:center;">	
																	<?php
																		if(!empty($res2['image']))
																			{
																	?>
																				<img src="<?php echo 'upload/project/nearby_place/'.$res2['image'];?>" style="width:100%;display:block">
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
										<?php
												}
											$i++;	
										?>			
										<div class="row" id="add-new-nearby-btn" style="text-align:right;margin-left:-10px;margin-right:-10px;">
											<span class="btn btn-info" onclick="project.add_nearby_place(<?=$i;?>)">Add New</span>
										</div>	
									</div>	
								</div>
								<!--Near By Place Ends-->
								<!--Offers-->
								<div class="tab-pane fade" id="tab-dark-7">
									<div class="col-md-12">
										<div class="offer2 row" >
											<?php
												$query2=mysqli_query($con,"select * from project_offer where project_id='$project_id'");
												while($res2=mysqli_fetch_array($query2))
													{
														$image=$res2['image'];
														$id=$res2['id'];
														echo "<div class='col-md-3' id='offer$id'><div class='row'><img class='img-thumbnail img-responsive' src='upload/project/offer/$image'><span class='btn btn-danger' style='position: absolute;right: 28px;padding: 2px 10px 0px 10px;margin-top: 0px;margin-top: 22px;' onclick='project.delete_offer($id)'><i class='fa fa-trash-o'></i></span></div></div>";
													}
											?>
										</div>
										<input type="file" name="offer[]" multiple id="offer-add" onchange="project.upload_multiple(this,'#offer')">
										<div class="offer" id="offer"></div>
									</div>
								</div>
								<!--Offers Ends-->
								<!--Location-->
								<div class="tab-pane fade" id="tab-dark-8">
									<div class="col-md-12">
										<input type="file" name="location[]" id="location-add" onchange="project.upload_multiple(this,'#location')">
										<div class="location" id="location">
											<?php
												if(!empty($res['location_image']))
													{
											?>
														<img src="<?php echo 'upload/project/location/'.$res['location_image'];?>" style="width:100%;display:block">
											<?php
													}
											?>
										</div>
									</div>
								</div>
								<!--Offers Ends-->
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
	<div class="page-loader" id="page-loader"><img src="img/gif/page-loader.gif" width="100px;"></div>
	<script src="js/project.js"></script>
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
</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jan 2021 12:21:06 GMT -->
</html>
