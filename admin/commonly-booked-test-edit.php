<?php
	include("../db.php");
	include("common/check_login.php");
	include("../common-details.php");
	$insert_status=2;
	if(isset($_POST['submit']))
		{
			$id=$_GET['id'];
			$name=mysqli_real_escape_string($con,$_POST['name']);
			$price=$_POST['price'];
			$offer_price=$_POST['offer_price'];
			$status=$_POST['status'];
			$tests_included=serialize($_POST['tests_included']);
			$date=date("Y-m-d");
			$time=date("H:i a");
			$main_image="";
			//Main Image Upload	
			if(!empty($_FILES['main_image']['name']))
				{
					$a=explode(".",$_FILES['main_image']['name']);
					$extension=$a[1];
					$main_image="main".time().".".$extension;
					move_uploaded_file($_FILES['main_image']['tmp_name'],"upload/commonly_booked_test/$main_image");
					$query2=mysqli_query($con,"update commonly_booked_test set image='$main_image' where id='$id'");
					$res2=mysqli_affected_rows($con);
				}
			$banner_image="";
			//Main Image Upload	
			if(!empty($_FILES['banner']['name']))
				{
					$a=explode(".",$_FILES['banner']['name']);
					$extension=$a[1];
					$banner_image="banner".time().".".$extension;
					move_uploaded_file($_FILES['banner']['tmp_name'],"upload/commonly_booked_test/$banner_image");
					$query2=mysqli_query($con,"update commonly_booked_test set background_image='$banner_image' where id='$id'");
					$res2=mysqli_affected_rows($con);
				}	
			
			//insert package details
			$query=mysqli_query($con,"update commonly_booked_test set name='$name',price='$price',offer_price='$offer_price',tests_included='$tests_included',status='$status',date_added='$date' where id='$id'");
			$res=mysqli_affected_rows($con);
			$remove_package_covers_ids=explode(',',$_POST['remove_package_covers_id']);
			$remove_package_ids=explode(',',$_POST['remove_book_package_id']);
			foreach($remove_package_covers_ids as $remove_id)
				{
					mysqli_query($con,"delete from cbt_covers where id='$remove_id'");
				}
				
			foreach($remove_package_ids as $remove_id)
				{
					mysqli_query($con,"delete from cbt_why where id='$remove_id'");
				}
			//CBT Covers
			$i=0;
			$package_cover_ids=$_POST['package_cover_id'];
			$texts=$_POST['this_package_covers_text'];
			foreach($texts as $text)
				{
					if($package_cover_ids[$i]>0)
						{
							mysqli_query($con,"update cbt_covers set covers='$text' where id='".$package_cover_ids[$i]."'");	
						}
					else
						{
							$query2=mysqli_query($con,"insert into cbt_covers(cbt_id,covers) values('$id','$text')");
						}
					$i++;
				}
			
			//Why CBT			
			$book_package_ids=$_POST['book_package_id'];
			$content=$_POST['book_package_content'];
			$images=$_FILES['book_package_image']['name'];	
			$i=0;
			foreach($images as $image)
				{
					if(@$package_cover_ids[$i]>0)
						{
							if(!empty($_FILES['book_package_image']['name'][$i]))
								{
									$a=explode(".",$_FILES['book_package_image']['name'][$i]);
									$extension=$a[1];
									$main_image="cbt-image-$i".time().".".$extension;
									move_uploaded_file($_FILES['book_package_image']['tmp_name'][$i],"upload/commonly_booked_test/$main_image");
									mysqli_query($con,"update cbt_why set image='$main_image' where cbt_id='".$book_package_ids[$i]."'");
								}
							mysqli_query($con,"update cbt_why set content='".$content[$i]."' where cbt_id='".$book_package_ids[$i]."'");	
						}
					else
						{
							if(!empty($_FILES['book_package_image']['name'][$i]))
								{
									$a=explode(".",$_FILES['book_package_image']['name'][$i]);
									$extension=$a[1];
									$main_image="cbt-image-$i".time().".".$extension;
									move_uploaded_file($_FILES['book_package_image']['tmp_name'][$i],"upload/commonly_booked_test/$main_image");
									mysqli_query($con,"insert into cbt_why(cbt_id,image,content) values('$id','$main_image','".$content[$i]."')");
								}
						}
					$i++;
				}
			$insert_status="1";					
						
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
	<title>Edit Commonly Booked Test :: <?=$co_name;?></title>

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
		#main_image, #banner, .book_package_image_file 
			{
				position:fixed;
				left:-2000px;
			}
		.main_image, .banner, .book_package_image
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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Edit Commonly Booked Test</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Edit Commonly Booked Test</span>
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
								<h6 class="card-title">Edit Commonly Booked Test</h6>
								
								<div class="header-elements">
									<a onclick="commonly_booked_test.update()"><span class="badge bg-info badge-pill" style="cursor:pointer;font-size:14px;">UPDATE</span></a><a href="commonly-booked-test.php"><span class="badge bg-success badge-pill" style="font-size:14px;">COMMONLY BOOKED TEST LIST</span></a>
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
												<i class="fa fa-info-circle mr-2" aria-hidden="true"></i>
												This Package Covers
											</a>
										</li>
										<li class="nav-item dropdown">
											<a href="#tab-dark-3" class="navbar-nav-link" data-toggle="tab">
												<i class="fa fa-info-circle mr-2" aria-hidden="true"></i>
												Why should you book this package?
											</a>
										</li>
									</ul>
								</div>
							</div>
						<?php
							$tests=array();
							$id=$_GET['id'];
							$query=mysqli_query($con,"select * from commonly_booked_test where id='$id'");
							$res=mysqli_fetch_array($query);
							$tests=unserialize($res['tests_included']);
						?>	
						<form action="commonly-booked-test-edit.php?id=<?=$id;?>" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
							<div class="card card-body border-top-0 rounded-0 rounded-bottom tab-content mb-0">
								<div class="tab-pane fade active show" id="tab-dark-1">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<input type="file" name="main_image" id="main_image" class="form-control">
												<div class="main_image img-thumbnail" onclick="commonly_booked_test.select_image()">
													<p style="font-size:24px;text-align:center;">
														<?php
															if(!empty($res['image']))
																{
														?>
																	<img src="<?php echo 'upload/commonly_booked_test/'.$res['image'];?>" style="width:100%;max-height:200px;object-fit:contain;display:block">
														<?php
																}
															else
																{															
														?>	
																	<img src="img/icon/upload.png" style="width:100%;max-height:200px;object-fit:contain;display:block">
														<?php
																}
														?>
														
													</p>
												</div>
											</div>
										</div>
										<div class="col-md-8">
											<div class="form-group">
												<input type="file" name="banner" id="banner" class="form-control">
												<div class="banner img-thumbnail" onclick="commonly_booked_test.select_banner()">
													<p style="font-size:24px;text-align:center;">
														<?php
															if(!empty($res['background_image']))
																{
														?>
																	<img src="<?php echo 'upload/commonly_booked_test/'.$res['background_image'];?>" style="width:100%;max-height:200px;object-fit:contain;display:block">
														<?php
																}
															else
																{															
														?>	
																	<img src="img/icon/upload.png" style="width:100%;max-height:200px;object-fit:contain;display:block">
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
													<label>Name</label>
													<input type="text" name="name" value="<?=$res['name'];?>" class="form-control">
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Price (₹)</label>
													<input type="text" name="price" value="<?=$res['price'];?>" class="form-control">
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Offer Price (₹)</label>
													<input type="text" name="offer_price" value="<?=$res['offer_price'];?>" class="form-control">
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Status</label>
													<select name="status" id="status" class="form-control">
														<option value="Active" <?php if($res['status']=='Active'){echo 'selected';} ?>>Active</option>
														<option value="Inactive" <?php if($res['status']=='Inactive'){echo 'selected';} ?>>Inactive</option>
													</select>
												</div>	
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Tests Included</label>
													<select name="tests_included[]" id="tests_included" class="form-control select" multiple="multiple">
														<optgroup label="Select Tests">
														<?php
															$query2=mysqli_query($con,"select * from test_profile order by name");
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
											
										</div>	
									</fieldset>
									
									<div class="row" style="position:fixed;left:-2000px;">
										<div class="input-field col s12">
											<input type="submit" class="waves-effect waves-light btn-large" id="submit" name="submit" value="Submit">
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="tab-dark-2">
									<fieldset>
										<div class="row">	
											<div class="input-field col-md-12">
												<label for='description'>This package covers ?</label>
												<input type="hidden" name="remove_package_covers_id">
											</div>
											<div class="col-md-12">
												<table class="table table-striped table-bordered" id='this-package-covers'>
													<tr>
														<td class="text-left" style='width:90%;'>This package covers</td>
														<td style='width:10%'></td>
													</tr>
													
													<?php
														$j=0;
														$query2=mysqli_query($con,"select * from cbt_covers where id='".$_GET['id']."'");
														while($res2=mysqli_fetch_array($query2))
															{
																$cover_id=$res2['id'];
													?>
																<tr class='row-body' id='this_package_covers<?=$j;?>'>
																	<td><input type='hidden' value='<?=$cover_id;?>' name='package_cover_id[]'><input type='text' name='this_package_covers_text[]' value="<?=$res2['covers'];?>" class='form-control this_package_covers_text' ></td>
																	<td style='border-right:1px solid #CDCDCD;'><a class='btn btn-sm btn-primary' style='cursor:pointer;background:tomato;padding:0px 8px;' title='' onclick='this_package_covers.remove2(<?=$j;?>,<?=$cover_id;?>)'><i class='fa fa-minus' style='font-weight:bold;margin-right:0px;color:white;'></i></a></span></td>
																</tr>
													<?php
																$j++;
															}
													?>
													<tr>
														<td></td>
														<td class="text-left"><button type="button" onclick="this_package_covers.add(<?=$j;?>)" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="This package covers" style="padding:0px 12px;" id="this_package_covers_add_btn"><i class="fa fa-plus-circle" style="margin-right:0px;"></i></button></td>
													</tr>
												</table>
											</div>
										</div>
										
									</fieldset>
								</div>
								<div class="tab-pane fade" id="tab-dark-3">
									<fieldset>
										<div class="row">	
											<div class="input-field col-md-12">
												<label for='description'>Why should you book this package?</label>
												<input type="hidden" name="remove_book_package_id">
											</div>
											<div class="col-md-12">
												<table class="table table-striped table-bordered" id='book_package'>
													<tr>
														<td class="text-left" style='width:30%;'>Image</td>
														<td class="text-left" style='width:60%;'>Content</td>
														<td style='width:10%'></td>
													</tr>
													
													<?php
														$j=0;
														$query2=mysqli_query($con,"select * from cbt_why where cbt_id='".$_GET['id']."'");
														while($res2=mysqli_fetch_array($query2))
															{
																$j++;
																$book_package_id=$res2['id'];
																$image=$res2['image'];
																$content=$res2['content'];
													?>
																<tr class='row-body' id='book_package<?=$j;?>'>
																	<td><input type='hidden' value='<?=$book_package_id;?>' name='book_package_id[]'><input type='file' name='book_package_image[]' id="book_package_image<?=$j;?>" onchange="book_package.choose_image(<?=$j;?>)" class='form-control book_package_image_file'>
																		<div class="book_package_image img-thumbnail" id="book_package_image_box<?=$j;?>" onclick="book_package.select_image(<?=$j;?>)">
																			<p style="text-align:center;margin-bottom:0px;">
																				<?php
																					if(!empty($image))
																						{
																							echo "<image src='upload/commonly_booked_test/$image' style='height:80px;object-fit:contain;'>";
																						}
																					else
																						{
																							echo "<img src='img/icon/upload.png' style='width:80px;display:block'>";
																						}																						
																				?>
																				
																			</p>
																		</div>	
																	</td>
																	<td><textarea name='book_package_content[]' class='form-control book_package_content' ><?=$content;?></textarea></td>
																	<td style='border-right:1px solid #CDCDCD;'><a class='btn btn-sm btn-primary' style='cursor:pointer;background:tomato;padding:0px 8px;' title='' onclick='book_package.remove2(<?=$j;?>,<?=$book_package_id;?>)'><i class='fa fa-minus' style='font-weight:bold;margin-right:0px;color:white;'></i></a></span></td>
																</tr>
													<?php
															}
														 $j++;   
													?>
													<tr>
														<td colspan='2'></td>
														<td class="text-left"><button type="button" onclick="book_package.add(<?=$j;?>)" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Why should you book this package?" style="padding:0px 12px;" id="book_package_add_btn"><i class="fa fa-plus-circle" style="margin-right:0px;"></i></button></td>
													</tr>
												</table>
											</div>
										</div>
										
									</fieldset>
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
	<link rel="stylesheet" href="plugins/toast/toast.style.min.css">
	<script src="plugins/toast/toast.script.js"></script>
	<script src="js/commonly-booked-test.js"></script>
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
		if($insert_status==1)
			{
				echo "<script>$.Toast('', 'Test updated successfully.', 'success', {
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
	?>
</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jan 2021 12:21:06 GMT -->
</html>
