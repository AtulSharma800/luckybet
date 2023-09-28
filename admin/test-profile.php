<?php
	include("../db.php");
	include("common/check_login.php");
	include("../common-details.php");
	$insert_status='2';
	$update_status='2';
	$delete_status='2';
	if(isset($_GET['delete_id']))
		{
			$query=mysqli_query($con,"delete from test_profile where id='".$_GET['delete_id']."'");
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
			$tests=serialize($_POST['tests']);
			$main_image="";
			//Main Image Upload	
			if(!empty($_FILES['main_image']['name']))
				{
					$a=explode(".",$_FILES['main_image']['name']);
					$extension=$a[1];
					$main_image="main".time().".".$extension;
					move_uploaded_file($_FILES['main_image']['tmp_name'],"upload/test_profile/$main_image");
				}
			$query=mysqli_query($con,"insert into test_profile(name,tests,image) values('$name','$tests','$main_image')");
			$res=mysqli_affected_rows($con);
			if($res)
				{
					$insert_status="1";
					$name="";	
					$tests="";	
					$main_image="";	
				}
			else
				{
					$insert_status="0";		
				}
		}
	else if(isset($_POST['update_submit']))
		{
			$id=$_POST['edit_id'];
			$name=mysqli_real_escape_string($con,$_POST['name']);
			$tests=serialize($_POST['tests']);
			$main_image="";
			//Main Image Upload	
			if(!empty($_FILES['main_image']['name']))
				{
					$a=explode(".",$_FILES['main_image']['name']);
					$extension=$a[1];
					$main_image="main".time().".".$extension;
					move_uploaded_file($_FILES['main_image']['tmp_name'],"upload/test_profile/$main_image");
					$query=mysqli_query($con,"update test_profile set image='$main_image' where id='$id'");
				}
			$query=mysqli_query($con,"update test_profile set name='$name',tests='$tests' where id='$id'");
			$res=mysqli_affected_rows($con);
			if($res)
				{
					$update_status="1";	
					$name="";	
					$tests="";	
					$main_image="";			
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
	<title>Test Profile :: <?=$co_name;?></title>

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
		.block
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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Test Profile</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Test Profile</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

				</div>
			</div>
			<!-- /page header -->

			<?php
				$tests=array();
				if(isset($_GET['edit_id']))
					{
						$query=mysqli_query($con,"select * from test_profile where id='".$_GET['edit_id']."'");
						$res=mysqli_fetch_array($query);
						$name=$res['name'];
						$tests=unserialize($res['tests']);
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
											echo "<h6 class='card-title'>Edit Test Profile</h6>";
										}
									else
										{
											echo "<h6 class='card-title'>Add Profile</h6>";
										}										
								?>
							</div>
							<hr style="margin-top:0px;margin-bottom:0px;">
							<form action="test-profile.php" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
							<div class="card-body border-top-0 rounded-0 rounded-bottom tab-content mb-0">
								<div class="tab-pane fade active show" id="tab-dark-1">
									<fieldset>
										<div class="row">	
											<div class="col-md-12">
												<div class="form-group">
													<label>Name</label>
													<input type="text" name="name" value="<?=@$name;?>" class="form-control">
													<?php
														if(isset($_GET['edit_id']))
															{
																$edit_id=$_GET['edit_id'];
																echo "<input type='hidden' name='edit_id' value='$edit_id'>";
															}
													?>
												</div>	
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Tests</label>
													<select name="tests[]" id="tests" class="form-control select" multiple="multiple">
														<optgroup label="Select Tests">
														<?php
															$query2=mysqli_query($con,"select * from tests order by name");
															while($res2=mysqli_fetch_array($query2))
																{
																	$id2=$res2['id'];
																	$name2=$res2['name'];
																	$selected="";
																	if(in_array($id2,$tests))
																		{
																			$selected="selected";
																		}
																	echo "<option value='$id2' $selected>$name2</option>";
																}
														?>
													</select>
												</div>	
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Thumbnail</label>
													<input type="file" name="main_image" id="main_image" class="form-control">
													<div class="main_image img-thumbnail" onclick="test_profile.select_image()">
														<p style="font-size:24px;text-align:center;margin-bottom:0px;">
															<?php
																if(isset($_GET['edit_id']))
																	{
															?>
																		<img src="<?php echo 'upload/test_profile/'.$res['image'];?>" style="width:100px;object-fit:cover;">
															<?php
																	}
																else
																	{
															?>
																		<img src="img/icon/upload.png" style="width:120px;">
															<?php
																	}
															?>			
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
								<h6 class="card-title">Test Profile List</h6>
							</div>


							<div class="table-responsive">
								<table class="table datatable-save-state">
									<thead>
										<tr>
											<th style="width:15%">Image</th>
											<th style="width:25%">Name</th>
											<th style="width:50%">Tests</th>
											<th class="text-center" style="width:10%">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$query=mysqli_query($con,"select * from test_profile order by name");
											while($res=mysqli_fetch_array($query))
												{
													$test_text="";
													$name=$res['name'];
													$tests=unserialize($res['tests']);
													$image="upload/test_profile/".$res['image'];
													foreach($tests as $test)
														{
															$query2=mysqli_query($con,"select * from tests where id='$test'");
															$res2=mysqli_fetch_array($query2);
															$test_name=$res2['name'];
															$test_text.="<span class='block'>$test_name</span>";
														}
										?>
													<tr>
														<td><img src="<?=$image;?>" style="height:70px;object-fit:cover;"></td>
														<td><?=$name;?></td>
														<td><?=$test_text;?></td>
														<td class="text-center">
															<div class="list-icons">
																<div class="dropdown">
																	<a href="#" class="list-icons-item" data-toggle="dropdown">
																		<i class="icon-menu9"></i>
																	</a>

																	<div class="dropdown-menu dropdown-menu-right">
																		<a href="test-profile.php?edit_id=<?=$res['id'];?>" class="dropdown-item"><i class="fa fa-pencil-square-o"></i> Edit</a>
																		<a href="test-profile.php?delete_id=<?=$res['id'];?>" onclick="return confirm('Are you sure?')" class="dropdown-item"><i class="fa fa-trash-o"></i> Delete</a>
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
	<script src="js/test_profile.js"></script>
	<link rel="stylesheet" href="plugins/toast/toast.style.min.css">
	<script src="plugins/toast/toast.script.js"></script>
	<?php
		if($delete_status==1)
			{
				echo "<script>$.Toast('', 'Test profile deleted successfully.', 'success', {
										has_icon:false,
										has_close_btn:true,
										stack: true,
										fullscreen:true,
										timeout:2000,
										sticky:false,
										has_progress:true,
										rtl:false,
									});
								setTimeout(function(){window.location.href='test-profile.php';},1000);	
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
				echo "<script>$.Toast('', 'Test profile added successfully.', 'success', {
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
				echo "<script>$.Toast('', 'Test profile updated successfully.', 'success', {
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
