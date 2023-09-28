<?php
	include("../db.php");
	include("common/check_login.php");
	include("../common-details.php");
	if(isset($_GET['id']))
		{
			$query=mysqli_query($con,"delete from products where id='".$_GET['id']."'");
			$res=mysqli_affected_rows($con);
			if($res)
				{
					echo "<script>alert('This product deleted successfully.');window.location.href='product.php';</script>";
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
	<title>Products :: <?=$co_name;?></title>

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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Products</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Products</span>
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
								<h6 class="card-title">Products</h6>
								<div class="header-elements">
									<a href="product-add.php"><span class="badge bg-success badge-pill">ADD PRODUCT</span></a>
								</div>
							</div>


							<div class="table-responsive">
								<table class="table datatable-save-state">
									<thead>
										<tr>
											<th style="width:15%">Image</th>
											<th style="width:28%">Name</th>
											<th style="width:14%">Price</th>
											<th style="width:25%">Category</th>
											<th style="width:10%">Status</th>
											<th class="text-center" style="width:8%">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$query=mysqli_query($con,"select * from products");
											while($res=mysqli_fetch_array($query))
												{
													$price=$res['price'];
													$price_text="<b>₹".number_format($price)."</b>";
													if($res['discount']>0)
														{
															$discount_percent=$res['discount'];   //Percent Discount
															$discount_amount=$price*$discount_percent/100;
															$final_price=$price-$discount_amount;
															$price_text="<b>₹".number_format($final_price)."</b>&nbsp;<del>₹".number_format($price)."</del>";
														}
													$category_text="";
													$category_ids=unserialize($res['category_ids']);	
													foreach($category_ids as $category_id)
														{
															$query2=mysqli_query($con,"select * from product_category where id='$category_id'");
															$res2=mysqli_fetch_array($query2);
															$category_text.=$res2['name'].", ";
														}
													$category_text=trim($category_text,", ");	
													
										?>
													<tr>
														<td><img src="upload/product/<?=$res['image'];?>" class="img-thumbnail rounded" alt="" style="height:80px;width:100%;object-fit:cover;"></td>
														<td><?=$res['name'];?></td>
														<td><?=$price_text;?></td>
														<td><?=$category_text;?></td>
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
																		<a href="product-edit.php?id=<?=$res['id'];?>" class="dropdown-item"><i class="fa fa-pencil-square-o"></i> Edit</a>
																		<a onclick="product.delete(<?=$res['id'];?>)" class="dropdown-item"><i class="fa fa-trash-o"></i> Delete</a>
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
