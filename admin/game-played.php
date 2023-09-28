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
	<title>Game Played :: <?=$co_name;?></title>

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
		.number-history-box
			{
				background:#FEF1F1;
				border-radius:5px;
				box_shadow:4px 4px 8px gray;
				text-align:center;
			}
		.number-history-box .number-box
			{
				padding:2px 2px;
				width:60px;
				display:inline-block;
				text-align:center;
				color:black;
				font-size:12px;
				border-bottom:1px solid white;
				border-right:1px solid white;
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
		<?php
			if(isset($_GET['date']))
				{
					$date=$_GET['date'];
				}
			else	
				{
					$date=date("Y-m-d");
				}
		?>

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Game Played</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Game Played</span>
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
								<h6 class="card-title">Game Played</h6>
								<div class="breadcrumb">
									<input type='date' name="date" id="date" value="<?=@$date;?>" class="form-control" style='display:inline-block;width:150px;margin-right:20px;'>
									<select name="game_id" id="game_id" class="form-control"style='display:inline-block;width:200px;margin-right:20px;'>
										<option value="">Select Game</option>
										<?php
											$query=mysqli_query($con,"select * from games");
											while($res=mysqli_fetch_array($query))
												{
													$id2=$res['id'];
													$name2=$res['name'];
													$a=date_create_from_format("H:i",$res['start_time']);
													$start_time=date_format($a,"h:i a");
													$a=date_create_from_format("H:i",$res['end_time']);
													$end_time=date_format($a,"h:i a");
													$selected="";
													if(@$_GET['game_id']==$id2)
														{
															$selected="selected";
														}
													echo "<option value='$id2' $selected>$name2 ($start_time - $end_time)</option>";
												}
										?>
									</select>
									<button type="button" class="btn btn-info" onclick="filter_game()">SEARCH</button>
								</div>
							</div>


							<div class="table-responsive">
								<table class="table datatable-save-state">
									<thead>
										<tr>
										    <th style="width:15%">Name</th>
										    <th style="width:10%">Mobile</th>
											<th style="width:10%">User Id</th>
											<th style="width:15%">Game</th>
											<th style="width:15%">Time</th>
											<th style="width:10%;text-align:right;">Amount</th>
											<th style="width:17%">Numbers</th>
											<th class="text-center" style="width:8%">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$date=date("Y-m-d");
											$where="where transaction_type='Play'";
											if(isset($_GET['date']))
												{
													if(!empty($_GET['date']))
														{
															$date=$_GET['date'];
														}
												}
											if(isset($_GET['game_id']))
												{
												    $total=0;	
                									$game_id=$_GET['game_id'];
													$query2=mysqli_query($con,"select * from game_play where game_id='$game_id' and date='$date' order by id desc limit 1");
													$num2=mysqli_num_rows($query2);
													if($num2>0)
													    {
        										            $res2=mysqli_fetch_array($query2);
        										            $game_play_id=@$res2['id'];
        										           	$query=mysqli_query($con,"select * from transactions where game_play_id='$game_play_id' and transaction_type='Play'");
                											while($res=mysqli_fetch_array($query))
                												{
                													$transaction_id=$res['id'];
                													$game_id=$res['game_id'];
                													$amount=$res['amount'];
                													$a=date_create_from_format("Y-m-d",$res['play_date']);
                													$play_date=date_format($a,"d M Y");
                													$transaction_type=$res['transaction_type'];
                													$status=$res['status'];
                													
                													
                													$a=date_create_from_format("Y-m-d H:i:s",$res['date_and_time']);
                													$date_and_time=date_format($a,"d M Y, h:i a");
                													$open_play=$res['game_type'];
                													
                													$query2=mysqli_query($con,"select * from games where id='$game_id'");
                													$res2=mysqli_fetch_array($query2);
                													$game_name=@$res2['name'];
                													
                													$user_id=$res['user_id'];
                													$query2=mysqli_query($con,"select * from users where id='$user_id'");
                													$res2=mysqli_fetch_array($query2);
                													$name=$res2['name'];
                													$mobile=$res2['mobile'];
                													$user_id=$res2['user_id'];
                													$total+=$amount;
										?>
                													<tr>
                												    	<td><?=$name;?></td>
                														<td><?=$mobile;?></td>
                														<td><?=$user_id;?></td>
                														<td><?=$game_name;?></td>
                														<td><?=$date_and_time;?></td>
                														<td style='text-align:right;'><?=number_format($amount,2);?></td>
                														<td><p class='number-history-box'>
                															<?php
                																$query2=mysqli_query($con,"select * from game_history where transaction_id='$transaction_id'");
                																while($res2=mysqli_fetch_array($query2))
                																	{
                																		$amount=$res2['amount'];
                																		$number=$res2['number'];
                																		echo "<span class='number-box'>$number = <span style='color:#ED0A0A'>₹$amount</span></span>";
                																	}
                															?>
                															
                														</p></td>
                														<td class="text-center">
                															<div class="list-icons">
                																<div class="dropdown">
                																	<a href="#" class="list-icons-item" data-toggle="dropdown">
                																		<i class="icon-menu9"></i>
                																	</a>
                																	<div class="dropdown-menu dropdown-menu-right">
                																		<a href="#" class="dropdown-item"><i class="fa fa-trash-o"></i>Edit</a>
                																	</div>
                																</div>
                															</div>
                														</td>
                													</tr>
										<?php
											        	        }
													    }
												}
										?>										
							
									</tbody>
									<tfoot>
										<tr>
											<td colspan='5' style='text-align:right'>Total</td>
											<td style='text-align:right;'><?=number_format($total,2);?></td>
											<td colspan='2'></td>
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
	<script>
		function filter_game()
			{
				var date=$("#date").val();	
				var game_id=$("#game_id").val();
				if(game_id.length>0)
					{
						window.location.href="game-played.php?date="+date+"&game_id="+game_id;	
					}
				else
					{
						window.location.href="game-played.php?date="+date;
					}					
			}
	</script>	
</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jan 2021 12:21:06 GMT -->
</html>
