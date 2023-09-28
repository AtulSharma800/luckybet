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
	<title>Users :: <?=$co_name;?></title>

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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Users</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Users</span>
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
								<h6 class="card-title">Users</h6>
								<div class="header-elements">
									<a href="user-add.php"><span class="badge bg-success badge-pill">ADD NEW</span></a>
								</div>
							</div>


							<div class="table-responsive">
								<table class="table datatable-save-state">
									<thead>
										<tr>
										    <th>Image</th>
										    <th>User Id</th>
											<th>Name</th>
											<th>Mobile</th>
											<th>Pwd</th>
											<th>Fund</th>
											<th>Withdrawal</th>
											<th>Play</th>
											<th>Win</th>
											<th>Remaining</th>
											<th>Joining Date</th>
											<th class="text-center" style="width:8%">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										    $grand_total_fund=0;
										    $grand_total_withdrawal=0;
										    $grand_total_play=0;
										    $grand_total_win=0;
											$current_date=date("Y-m-d");
											$query=mysqli_query($con,"select * from users order by joining_date desc");
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
													
													$query2=mysqli_query($con,"select sum(amount) as fund from transactions where user_id='$id' and transaction_type='Fund' and status='Approved'");
                                        			$res2=mysqli_fetch_array($query2);
                                        			$total_fund = $res2['fund'];
                                        			
                                        			$query2=mysqli_query($con,"select sum(amount) as withdrawal from transactions where user_id='$id' and transaction_type='Withdrawal' and (status='Approved' or status='Pending')");
                                        			$res2=mysqli_fetch_array($query2);
                                        			$total_withdrawal = $res2['withdrawal'];
                                        			
                                        			$query2=mysqli_query($con,"select sum(amount) as play from transactions where user_id='$id' and transaction_type='Play'");
                                        			$res2=mysqli_fetch_array($query2);
                                        			$total_play = $res2['play'];
                                        			
                                        			$query2=mysqli_query($con,"select sum(amount) as win from transactions where user_id='$id' and transaction_type='Win'");
                                        			$res2=mysqli_fetch_array($query2);
                                        			$total_win = $res2['win'];
                                        			
                                        			$total=$total_fund+$total_win-$total_withdrawal-$total_play;
                                        			
                                        			$grand_total_fund+=$total_fund;
                                        			$grand_total_withdrawal+=$total_withdrawal;
                                        			$grand_total_win+=$total_win;
                                        			$grand_total_ply+=$total_play;
                                        			$grand_total+=$total;
                                        			
										?>
													<tr>
												    	<td><center><img src="<?=$image;?>" style="width:80px;object-fit:cover;"></center></td>
														<td><?=$user_id;?></td>
														<td><?=$name;?></td>
														<td><?=$mobile;?></td>
														<td><?=$res['password'];?></td>
														<td style='text-align:right'><?=number_format($total_fund,2);?></td>
														<td style='text-align:right'><?=number_format($total_withdrawal,2);?></td>
														<td style='text-align:right'><?=number_format($total_play,2);?></td>
														<td style='text-align:right'><?=number_format($total_win,2);?></td>
														<td style='text-align:right'><?=number_format($total,2);?></td>
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
									<tfoot>
									   <tr>
									        <td colspan='4'>Grand Total</td>
									        <td style='text-align:right'><?=number_format($grand_total_fund,0);?></td>
									        <td style='text-align:right'><?=number_format($grand_total_withdrawal,0);?></td>
									        <td style='text-align:right'><?=number_format($grand_total_play,0);?></td>
									        <td style='text-align:right'><?=number_format($grand_total_win,0);?></td>
									        <td style='text-align:right'><?=number_format($grand_total,0);?></td>
									        <td></td>
									        <td></td>
									   </tr>     
									</tfoot>    
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
