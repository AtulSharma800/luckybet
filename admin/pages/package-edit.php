<?php
	session_start();
	include("../db.php");
	include("common/check_login.php");
	if(isset($_POST['submit']))
		{
			$package_id=$_GET['id'];
			//$member_id=$_SESSION['member_id'];
			$date_added=date("Y-m-d");
			$title=$_POST['title'];
			$days=$_POST['days'];
			$nights=$_POST['nights'];
			$persons=$_POST['persons'];
			$age=$_POST['age'];
			$price=$_POST['price'];
			$offer_price=$_POST['offer_price'];
			$city=mysqli_real_escape_string($con,$_POST['city']);
			$departure=$_POST['departure'];
			$departure_date=$_POST['departure_date'];
			$departure_time=$_POST['departure_time'];
			$arrival_date=$_POST['arrival_date'];
			$arrival_time=$_POST['arrival_time'];
			$description=mysqli_real_escape_string($con,$_POST['description']);
			$includes=mysqli_real_escape_string($con,serialize($_POST['price_includes']));
			$excludes=mysqli_real_escape_string($con,serialize($_POST['price_excludes']));
			$main_image="";
			//Main Image Upload	
			if(!empty($_FILES['main_image']['name']))
				{
					$a=explode(".",$_FILES['main_image']['name']);
					$extension=$a[1];
					$main_image="main".time().".".$extension;
					move_uploaded_file($_FILES['main_image']['tmp_name'],"../member/upload/main_image/$main_image");
					$query=mysqli_query($con,"update package set image='$main_image' where id='$package_id'");
				}
			
			//update package details
			$query=mysqli_query($con,"update package set title='$title',days='$days',nights='$nights',persons='$persons',age='$age',price='$price',offer_price='$offer_price',city='$city',departure='$departure',departure_date='$departure_date',departure_time='$departure_time',arrival_date='$arrival_date',arrival_time='$arrival_time',description='$description',price_includes='$includes',price_excludes='$excludes',date_added='$date_added',status='Disabled' where id='$package_id'");
			//Delete other records
			$query=mysqli_query($con,"delete from package_faq where package_id='".$_GET['id']."'");
			$query=mysqli_query($con,"delete from package_schedule where package_id='".$_GET['id']."'");
			
			$query2=mysqli_query($con,"select * from package order by id desc limit 1");
			$res2=mysqli_fetch_array($query2);
			$package_id=$res2['id'];
			//Schedule
			$i=0;
			$schedule_day=$_POST['schedule_day'];
			$schedule_title=$_POST['schedule_title'];
			$schedule_description=$_POST['schedule_description'];
			foreach($schedule_day as $day)
				{
					$a=mysqli_real_escape_string($con,$schedule_title[$i]);
					$b=mysqli_real_escape_string($con,$schedule_description[$i]);
					mysqli_query($con,"insert into package_schedule(package_id,day,title,description) values('$package_id','$day','$a','$b')");
					$i++;
				}
			//FAQ	
			$faq_question=$_POST['faq_question'];
			$faq_answer=$_POST['faq_answer'];
			$i=0;
			foreach($faq_question as $question)
				{
					$a=mysqli_real_escape_string($con,$question);
					$b=mysqli_real_escape_string($con,$faq_answer[$i]);
					mysqli_query($con,"insert into package_faq(package_id,question,answer) values('$package_id','$a','$b')");
					$i++;
				}
			//Gallery Upload
			$gallery=$_FILES['gallery']['name'];
			$i=0;
			foreach($gallery as $image)
				{
					if(!empty($_FILES['gallery']['name'][$i]))
						{
							$a=explode(".",$_FILES['gallery']['name'][$i]);
							$extension=$a[1];
							$main_image="gallery-$i".time().".".$extension;
							move_uploaded_file($_FILES['gallery']['tmp_name'][$i],"../member/upload/gallery/$main_image");
							mysqli_query($con,"insert into package_gallery(package_id,image) values('$package_id','$main_image')");
							$i++;
						}
				}
			echo "<script>alert('This Tour Package Updated Successfully.It will be shown on website when it is approved by admin.');</script>";	
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
	<title>Edit Tour Packages :: Brij Dham Yatra</title>

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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Add Tour Package</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Add Tour Package</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

				</div>
			</div>
			<!-- /page header -->
			<?php
				$package_id=$_GET['id'];
				$query=mysqli_query($con,"select * from package where id='$package_id'");
				$res=mysqli_fetch_array($query);
			?>

			<!-- Content area -->
			<div class="content">
				<!-- Dashboard content -->
				<div class="row">
					<div class="col-xl-12">

						<!-- Marketing campaigns -->
						<div class="card">
							<div class="card-header header-elements-sm-inline">
								<h6 class="card-title">Add Tour Package</h6>
								
								<div class="header-elements">
									<a onclick="add_package.update()"><span class="badge bg-info badge-pill" style="cursor:pointer;font-size:14px;">UPDATE</span></a><a href="package-all.php"><span class="badge bg-success badge-pill" style="font-size:14px;">PACKAGE LIST</span></a>
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
												<i class="fa fa-inr mr-2" aria-hidden="true"></i>
												Price Includes
											</a>
										</li>

										<li class="nav-item dropdown">
											<a href="#tab-dark-3" class="navbar-nav-link" data-toggle="tab">
												<i class="fa fa-inr mr-2" aria-hidden="true"></i>
												Price Excludes
											</a>
										</li>

										<li class="nav-item dropdown">
											<a href="#tab-dark-4" class="navbar-nav-link" data-toggle="tab">
												<i class="fa fa-calendar mr-2" aria-hidden="true"></i>
												Schedule
											</a>
										</li>
										
										<li class="nav-item dropdown">
											<a href="#tab-dark-5" class="navbar-nav-link" data-toggle="tab">
												<i class="fa fa-question-circle mr-2" aria-hidden="true"></i>
												FAQS
											</a>
										</li>
										
										<li class="nav-item dropdown">
											<a href="#tab-dark-6" class="navbar-nav-link" data-toggle="tab">
												<i class="fa fa-picture-o mr-2" aria-hidden="true"></i>
												Photos
											</a>
										</li>
									</ul>
								</div>
							</div>
						<form action="package-edit.php?id=<?=$_GET['id'];?>" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
							<div class="card card-body border-top-0 rounded-0 rounded-bottom tab-content mb-0">
								<div class="tab-pane fade active show" id="tab-dark-1">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="file" name="main_image" id="main_image" class="form-control">
												<div class="main_image img-thumbnail" onclick="add_package.select_image()">
													<p style="font-size:24px;text-align:center;">
														<?php
															if(!empty($res['image']))
																{
														?>
																	<img src="<?php echo '../member/upload/main_image/'.$res['image'];?>" style="width:100%;display:block">
														<?php
																}
															else
																{															
														?>	
																	<img src="../../assets/images/icon/upload.png" style="width:150px;display:block"></br>
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
													<label>Tour Title</label>
													<input type="text" name="title" value="<?=$res['title'];?>" class="form-control">
												</div>	
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Days</label>
													<input type="number" name="days" value="<?=$res['days'];?>" class="form-control">
												</div>	
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Nights</label>
													<input type="number" name="nights" value="<?=$res['nights'];?>" class="form-control">
												</div>	
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Persons</label>
													<input type="number" name="persons" value="<?=$res['persons'];?>" class="form-control">
												</div>	
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Min. Age</label>
													<input type="number" name="age" value="<?=$res['age'];?>" class="form-control">
												</div>	
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Price</label>
													<input type="number" name="price" value="<?=$res['price'];?>" class="form-control">
												</div>	
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Offer Price</label>
													<input type="number" name="offer_price" value="<?=$res['offer_price'];?>" class="form-control">
												</div>	
											</div>
										</div>	
									</fieldset>
									
									<fieldset>
										<legend>Destination Details</legend>
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label>City</label>
													<input type="text" name="city" value="<?=$res['city'];?>" class="form-control">
												</div>	
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Departure</label>
													<input type="text" name="departure" value="<?=$res['departure'];?>" class="form-control">
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Departure Date</label>
													<input type="date" name="departure_date" value="<?=$res['departure_date'];?>" class="form-control">
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Departure Time</label>
													<input type="time" name="departure_time" value="<?=$res['departure_time'];?>" class="form-control">
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Arrival Date</label>
													<input type="date" name="arrival_date" value="<?=$res['arrival_date'];?>" class="form-control">
												</div>	
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Arrival Time</label>
													<input type="time" name="arrival_time" value="<?=$res['arrival_time'];?>" class="form-control">
												</div>	
											</div>
										</div>	
									</fieldset>
									<fieldset>
										<legend>Destination Description</legend>
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
								<div class="tab-pane fade" id="tab-dark-2">
									<div class="col-md-12">
										<div class="form-group">
											<label>Price Includes</label>
											<select class="form-control select-multiple-tags" name="price_includes[]" multiple="multiple" data-fouc>
												<option value="AZ">Arizona</option>
												<option value="CO">Colorado</option>
												<option value="ID">Idaho</option>
												<option value="WY">Wyoming</option>
												<option value="AL">Alabama</option>
												<option value="IA">Iowa</option>
												<option value="KS">Kansas</option>
												<option value="KY">Kentucky</option>
												<?php
													$price_includes=unserialize($res['price_includes']);
													foreach($price_includes as $a)
														{
															echo "<option value='$a' selected>$a</option>";
														}
													
												?>
											</select>
										</div>	
									</div>
								</div>
								
								<div class="tab-pane fade" id="tab-dark-3">
									<div class="col-md-12">
										<div class="form-group">
											<label>Price Excludes</label>
											<select class="form-control select-multiple-tags" name="price_excludes[]" multiple="multiple" data-fouc>
												<option value="AZ">Arizona</option>
												<option value="CO">Colorado</option>
												<option value="ID">Idaho</option>
												<option value="WY">Wyoming</option>
												<option value="AL">Alabama</option>
												<option value="IA">Iowa</option>
												<option value="KS">Kansas</option>
												<option value="KY">Kentucky</option>
												<?php
													$price_excludes=unserialize($res['price_excludes']);
													foreach($price_excludes as $a)
														{
															echo "<option value='$a' selected>$a</option>";
														}
													
												?>
											</select>
										</div>	
									</div>
								</div>
								<div class="tab-pane fade" id="tab-dark-4">
									<div class="bor">
									<table class="schedule-list-table " id="schedule-list-table" style="margin:0px;width:100%;" border='1'>
										<tr class="schedule-head-row" style="border:none;background:#26A69A">
											<td style="width:10%;"><p style="text-align:left;padding-left:5px;color:white;">Day</p></td>
											<td style="width:20%;"><p style="text-align:left;padding-left:5px;color:white;">Title</p></td>
											<td style="width:64%;"><p style="text-align:left;padding-left:10px;color:white;">Description</p></td>
											<td style="width:6%;"><p>&nbsp;</p></td>
										</tr>
										<?php
											$i=1;
											$query2=mysqli_query($con,"select * from package_schedule where package_id='$package_id'");
											while($res2=mysqli_fetch_array($query2))
												{
													$j=$i+1;
										?>
													<tr class="schedule-item-list" id="schedule-item-list<?=$i;?>" style="border:none;">
														<td>
															<input type="text" name='schedule_day[]' id="schedule_day<?=$i;?>" value="<?=$res2['day'];?>" class="form-control shedule_day" >
														</td>
														<td><input type='text' name='schedule_title[]' id="schedule_title<?=$i;?>" value="<?=$res2['title'];?>" class="form-control" onkeydown="schedule.focus_description(event,<?=$i;?>)"></td>
														<td><textarea name='schedule_description[]' id="schedule_description<?=$i;?>" onkeydown="schedule.add_next_day(event,<?=$j;?>)" class="form-control" style="height:150px"><?=$res2['description'];?></textarea></td>
														<td id="schedule_action<?=$i;?>"><div class='breadcrumb button btn-primary delete-btn' style='display:inline-block;' onclick='schedule.delete_day("<?=$i;?>")'><a style='color:white;' > <i class='fa fa-trash-o' title='Delete Day' aria-hidden='true'></i> </a></div></td>
													</tr>
										<?php
													$i++;
												}
										?>
									</table>
								</div>
								</div>
								<div class="tab-pane fade" id="tab-dark-5">
									<div class="col-md-12">
										<table class="faq-list-table " id="faq-list-table" style="margin:0px;width:100%;" border='1'>
											<tr class="faq-head-row" style="border:none;background:#26A69A">
												<td style="width:10%;"><p style="text-align:left;padding-left:5px;color:white">S.No.</p></td>
												<td style="width:40%;"><p style="text-align:left;padding-left:5px;color:white;">Question</p></td>
												<td style="width:44%;"><p style="text-align:left;padding-left:10px;color:white;">Answer</p></td>
												<td style="width:6%;"><p>&nbsp;</p></td>
											</tr>
											<?php
											$i=1;
											$query2=mysqli_query($con,"select * from package_faq where package_id='$package_id'");
											while($res2=mysqli_fetch_array($query2))
												{
													$j=$i+1;
										?>
													<tr class="faq-item-list" id="faq-item-list<?=$i;?>" style="border:none;">
														<td>
															<input type="text" name='faq_no[]' id="faq_no<?=$i;?>" class="form-control faq_no" value='<?=$i;?>'>
														</td>
														<td><input type='text' name='faq_question[]' id="faq_question<?=$i;?>" value="<?=$res2['question'];?>" class="form-control" onkeydown="faq.focus_answer(event,<?=$i;?>)"></td>
														<td><textarea name='faq_answer[]' id="faq_answer<?=$i;?>" onkeydown="faq.add_next_faq(event,<?=$j;?>)" class="form-control" style="height:150px"><?=$res2['answer'];?></textarea></td>
														<td id="faq_action<?=$i;?>"><div class='breadcrumb button btn-primary delete-btn' style='display:inline-block;' onclick='faq.delete("<?=$i;?>")'><a style='color:white;' > <i class='fa fa-trash-o' title='Delete FAQ' aria-hidden='true'></i> </a></div></td>
													</tr>
										<?php
													$i++;
												}
										?>
									
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="tab-dark-6">
									<div class="col-md-12">
										<div class="gallery2 row" >
											<?php
												$query2=mysqli_query($con,"select * from package_gallery where package_id='$package_id'");
												while($res2=mysqli_fetch_array($query2))
													{
														$image=$res2['image'];
														$id=$res2['id'];
														echo "<div class='col s3' id='gallery_photo$id'><div class='row'><img class='img-thumbnail img-responsive' src='../member/upload/gallery/$image'><span class='btn btn-danger' style='position: absolute;right: 28px;padding: 2px 10px 0px 10px;margin-top: 0px;margin-top: 22px;' onclick='add_package.delete_photo($id)'><i class='fa fa-trash-o'></i></span></div></div>";
													}
											?>
										</div>
										<input type="file" name="gallery[]" multiple id="gallery-photo-add">
										<div class="gallery"></div>
									</div>
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
	<script src="js/package.js"></script>
	 <script>
        	$(function () {
				//Add text editor
				$("#description").Editor();
			});
			
			$(document).ready(function() {
				var description=$("#description").val();
				$("#description").Editor("setText", description);
			});
	</script>
</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jan 2021 12:21:06 GMT -->
</html>
