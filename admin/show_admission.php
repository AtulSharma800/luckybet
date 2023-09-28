<?php
	session_start();
	include("../db.php");
	include("common/check_login.php");
	include("image_resize/resize_tool2.php");
	if(isset($_GET['course_id']))
		{
			$query=mysqli_query($con,"delete from courses where id='".$_GET['course_id']."'");
			$res=mysqli_affected_rows($con);
			if($res)
				{
					echo "<script>alert('This course deleted successfully.');window.location.href='courses.php';</script>";
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
	<title>Admissions :: SBLGEI</title>

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
		#main_image,.near_by_image_file
			{
				position:fixed;
				left:-2000px;
			}
		.main_image,.near-by-place-image
			{
				width:100%;
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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Edit Admissions</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Edit Admissions</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

				</div>
			</div>
			<!-- /page header -->
            <?php
                $admission_id=$_GET['id'];
                $query=mysqli_query($con,"select * from admission_details where id='$admission_id'");
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
								<h6 class="card-title">Edit Admission</h6>
								<!--<div class="header-elements">
									<a href="course-add.php"><span class="badge bg-success badge-pill">ADD NEW</span></a>
								</div>-->
							</div>


							<form id="contact_form" action="apply-now.php" method="POST" enctype="multipart/form-data" style="padding:20px;">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row" style="margin-left:0px;margin-right:0px;">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" id="first_name" class="form-control" value="<?=$res['first_name'];?>" placeholder="First Name"  required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" id="last_name" class="form-control" value="<?=$res['last_name'];?>" placeholder="Last Name" required>
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label>Date Of Birth</label>
                                            <div class="row">
                                                <div class='col-12 col-md-4'>
                                                    <input type="text" name="dob" id="dob" class="form-control" placeholder="DOB" value="<?=$res['dob'];?>" required>
                                                </div>    
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left:0px;margin-right:0px;">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Email Id</label>
                                                <input type="email" name="email_id" id="email_id" class="form-control" value="<?=$res['email_id'];?>" placeholder="Email Id" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Mobile No</label>
                                                <input type="text" name="mobile_no" id="mobile_no" class="form-control" pattern="[0-9]{10}" placeholder="Email Id" value="<?=$res['mobile_no'];?>" required>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-md-3">
											<div class="form-group">
											    <label>&nbsp;</label>
												<input type="file" name="main_image" id="main_image" class="form-control" required>
												<div class="main_image img-thumbnail" onclick="select_image()">
												    <p style="text-align:center"><center><img src="upload/student/<?=$res['image'];?>" style="width:150px;display:block"></center></p>
													
												</div>
											</div>
										</div>
                            </div>    
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <div class="row">
                                        <div class="col-md-4 col-4">
                                            <input type="radio" name="gender"  value="Male" <?php if($res['gender']=='Male'){echo 'checked';} ?> required>&nbsp;&nbsp;Male
                                        </div>
                                        <div class="col-md-4 col-4">
                                            <input type="radio" name="gender"  value="Female" <?php if($res['gender']=='Female'){echo 'checked';} ?> required>&nbsp;&nbsp;Female
                                        </div>
                                        <div class="col-md-4 col-4">
                                            <input type="radio" name="gender"  value="Other" <?php if($res['gender']=='Other'){echo 'checked';} ?> required>&nbsp;&nbsp;Other
                                        </div>
                                    </div>    
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="address" id="address" placeholder="Your complete address" style="height:100px;" class="form-control" required><?=$res['address'];?></textarea>
                                </div>
                            </div>
                            <div class="row" style="margin-left:0px;margin-right:0px;">
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label>Pincode</label>
                                        <input type="text" name="pincode" id="pincode" pattern="[0-9]{6}"  placeholder="Pincode" class="form-control" value="<?=$res['pincode'];?>" required>
                                    </div>
                                    
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" name="city" id="city" placeholder="City" value="<?=$res['city'];?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" name="state" id="state" placeholder="State" value="<?=$res['state'];?>" class="form-control" required>
                                    </div>
                                </div>
                            </div>    
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Course Applied For</label>
                                    <select name="course" id="course" class="form-control" required>
                                        <option value="">----Select Any Course----</option>
                                        <?php
                                            $query2=mysqli_query($con,"select * from courses order by title");
                                            while($res2=mysqli_fetch_array($query2))
                                                {
                                                    $selected="";
                                                    $title=$res2['title'];
                                                    $id=$res2['id'];
                                                    if($res['course']==$id)
                                                        {
                                                            $selected="selected";
                                                        }
                                                    
                                                    echo "<option value='$id' $selected>$title</option>";
                                                }
                                        ?>
                                    </select>    
                                </div>
                            </div>
                                
                            <div id="msg"></div>
                        </form>
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
	<script src="js/course.js"></script>
</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jan 2021 12:21:06 GMT -->
</html>
