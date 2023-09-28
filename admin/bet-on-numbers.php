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

	<title>Bet On Numbers :: <?=$co_name;?></title>



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

		.number-box

			{

				width: 10%;

				display: block;

			}

		.number-sub-box

			{

				background:#ED0A0A;

				color:white;

				text-align:center;

				border-right:1px solid #E3E0E0;

				display:block;

			}

		.number-box input

			{

				background:#FEF1F1;

				border-right:1px solid #E3E0E0;

				text-align:center;

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

						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Bet on Numbers</h4>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>

					</div>

				</div>



				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">

					<div class="d-flex">

						<div class="breadcrumb">

							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>

							<span class="breadcrumb-item active">Bet on Numbers</span>

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



							<?php

							    $total_amount=0;

								if(isset($_GET['game_id']))

									{

										$date=$_GET['date'];

										$game_id=$_GET['game_id'];

										$query=mysqli_query($con,"select * from game_play where date='$date' and game_id='$game_id' order by id desc limit 1");

										$res=mysqli_fetch_array($query);

										$game_play_id=@$res['id'];

										$result=@$res['result'];

							?>

							<div class="form-group" style="background:beige;padding:5px 20px;">

								<div class='col-md-8' >

									<div class="row" style='margin-left:0px;margin-right:0px;'>

										<div class="col-md-2">

											<h5 style="margin-bottom:0px;margin-top:4px;">Result</h5>

										</div>

										<div class="col-md-3">

											<input type="text" name="result" id="result" class="form-control" value="<?=$result;?>">

										</div>

										<div class="col-md-2">

											<button type="button" onclick="declare_result(<?=$game_play_id;?>)" id="submit-button"  class="btn btn-info">DECLARE</button>

										</div>

									</div>

								</div>

							</div>

							<div class="table-responsive" style="padding:40px 20px;">

								<div class="row" style='margin-top:10px;margin-right:0px;margin-left:0px;'>

								<div class="col-md-12">

									<h4 style='color:black;letter-spacing:1px;margin-bottom:8px;'>Enter Amount Below</h4>

								</div>
								<?php

								     $game_date =  $_GET['date'];
									$query_game=mysqli_query($con,"select * from games where id='$game_id'");
									$resquery_game=mysqli_fetch_array($query_game);
								     $game_name =  $resquery_game['name'];
									?>
									<div class="game_record" style="margin-left: 10px">
									<h6>Date: <?php echo $game_date;?>	</h6>
                                    <h5>Game Name:  <?php echo $game_name ; ?></h5>
									</div>

									<?php

										for($i=1;$i<=99;$i++)

											{

												$num_padded = sprintf("%02d", $i);

												if($i==1 || $i==11 || $i==21 || $i==31 || $i==41 || $i==51 || $i==61 || $i==71 || $i==81 || $i==91)

													{

														echo "<div class='col-12' style='display:flex;'>";

													}

												$query2=mysqli_query($con,"select sum(amount) as total from game_history where game_play_id='$game_play_id' and number='$num_padded'");

												$res2=mysqli_fetch_array($query2);

												$total+=$res2['total'];

									?>

												<span class='number-box'>

													<span class="number-sub-box"><?=$num_padded;?></span>

													<input name="jantri_amount[]" class='jantri_amount' id="jantri_amount<?=$i;?>" style="height:30px;border:none;width:100%;" value="<?=$res2['total'];?>" readonly>

												</span>

									<?php

												if($i==10 || $i==20 || $i==30 || $i==40 || $i==50 || $i==60 || $i==70 || $i==80 || $i==90)

													{

														echo "</div>";

													}

											}

										$query2=mysqli_query($con,"select sum(amount) as total from game_history where game_play_id='$game_play_id' and number='00'");

										$res2=mysqli_fetch_array($query2);

										$total+=$res2['total'];

									?>

												<span class='number-box'>

													<span class="number-sub-box">00</span>

													<input name="jantri_amount[]" class='jantri_amount' id="jantri_amount<?=$i;?>" style="height:30px;border:none;width:100%;" value="<?=$res2['total'];?>" readonly>

												</span>

											</div>

								</div>



								<div class="row" style='margin-top:10px;margin-left:0px;margin-right:0px;'>

									<div class="col-md-12">

										<h4 style='color:black;letter-spacing:1px;margin-bottom:8px;'>Ander/A</h4>

									</div>

									<div class='col-12' style='display:flex;'>

										<?php

											for($i=1;$i<=9;$i++)

												{

													$a="$i"."A";

													$b="$i"."AB";

													$query2=mysqli_query($con,"select sum(amount) as total from game_history where game_play_id='$game_play_id' and number='$a'");

													$res2=mysqli_fetch_array($query2);

													$total2=$res2['total'];

													$total+=$res2['total'];



													$query2=mysqli_query($con,"select sum(amount) as total from game_history where game_play_id='$game_play_id' and number='$b'");

													$res2=mysqli_fetch_array($query2);

													$total3=$res2['total']/2;

													$total2+=$total3;

													$total+=$total3;

										?>

													<span class='number-box'>

														<span class="number-sub-box"><?=$i;?></span>

														<input name="jantri_amount_a[]" class='jantri_amount_a' id="jantri_amountA<?=$i;?>" style="height:30px;border:none;width:100%;" value="<?=$total2;?>" readonly>

													</span>

										<?php

												}

											$query2=mysqli_query($con,"select sum(amount) as total from game_history where game_play_id='$game_play_id' and number='0A'");

											$res2=mysqli_fetch_array($query2);

											$total2=$res2['total'];

											$total+=$total2;



											$query2=mysqli_query($con,"select sum(amount) as total from game_history where game_play_id='$game_play_id' and number='0AB'");

											$res2=mysqli_fetch_array($query2);

											$total3=$res2['total']/2;

											$total2+=$total3;

											$total+=$total3;

										?>

										<span class='number-box'>

											<span class="number-sub-box">0</span>

											<input name="jantri_amount_a[]" class='jantri_amount_a' id="jantri_amountA<?=$i;?>" style="height:30px;border:none;width:100%;" value="<?=$total2;?>" readonly>

										</span>

									</div>

								</div>



								<div class="row" style='margin-top:10px;margin-left:0px;margin-right:0px;'>

									<div class="col-md-12">

										<h4 style='color:black;letter-spacing:1px;margin-bottom:8px;'>Bahar/B</h4>

									</div>

									<div class='col-12' style='display:flex;'>

										<?php

											for($i=1;$i<=9;$i++)

												{

													$a="$i"."B";

													$b="$i"."AB";

													$query2=mysqli_query($con,"select sum(amount) as total from game_history where game_play_id='$game_play_id' and number='$a'");

													$res2=mysqli_fetch_array($query2);

													$total2=$res2['total'];

													$total+=$res2['total'];



													$query2=mysqli_query($con,"select sum(amount) as total from game_history where game_play_id='$game_play_id' and number='$b'");

													$res2=mysqli_fetch_array($query2);

													$total3=$res2['total']/2;

													$total2+=$total3;

													$total+=$total3;

										?>

													<span class='number-box'>

														<span class="number-sub-box"><?=$i;?></span>

														<input name="jantri_amount_b[]" class='jantri_amount_b' id="jantri_amountB<?=$i;?>" style="height:30px;border:none;width:100%;" value="<?=$total2;?>" readonly>

													</span>

										<?php

												}

											$query2=mysqli_query($con,"select sum(amount) as total from game_history where game_play_id='$game_play_id' and number='0B'");

											$res2=mysqli_fetch_array($query2);

											$total2=$res2['total'];

											$total+=$total2;



											$query2=mysqli_query($con,"select sum(amount) as total from game_history where game_play_id='$game_play_id' and number='0AB'");

											$res2=mysqli_fetch_array($query2);

											$total3=$res2['total']/2;

											$total2+=$total3;

											$total+=$total3;

										?>

										<span class='number-box'>

											<span class="number-sub-box">0</span>

											<input name="jantri_amount_b[]" class='jantri_amount_b' id="jantri_amountB<?=$i;?>" style="height:30px;border:none;width:100%;" value="<?=$total2;?>" readonly>

										</span>

									</div>

								</div>

								<div class="row" style="margin-left:0px;margin-right:0px">

								    <div class='col-md-12'>

								        <p style="background: beige;padding: 5px;font-size: 18px;margin-top: 10px;">Total Bet In This Game is <b>₹ <?=number_format($total,2);?></b></p>

								    </div>

								</div>

							</div>

							<?php

									}

							?>

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

	<script>

		function filter_game()

			{

				var date=$("#date").val();

				var game_id=$("#game_id").val();

				window.location.href="bet-on-numbers.php?date="+date+"&game_id="+game_id;

			}

		function declare_result(game_play_id)

			{

				var result=$("#result").val();

				if(result.length>0)

					{

						$("#submit-button").html("Please Wait....");

						$("#submit-button").removeAttr("onclick");

						$.ajax({

							url: "ajax/declare-result.php?result="+result+"&game_play_id="+game_play_id,

							type: "POST",

							data:  "",

							contentType: false,

							cache: false,

							processData:false,

							success: function(data)

							{

								$("#submit-button").html("Declare");

								$("#submit-button").attr("onclick","declare_result("+game_play_id+")");

								var a=JSON.parse(data);

								if(a.status=='Success')

									{

										$.Toast("", a.message, "success", {

											has_icon:false,

											has_close_btn:true,

											stack: true,

											fullscreen:true,

											timeout:2000,

											sticky:false,

											has_progress:true,

											rtl:false,

										});

									}

								else

									{

										$("#submit-button").html("DECLARE");

										$("#submit-button").attr("onclick","declare_result("+game_play_id+")");

										$.Toast("", a.message, "error", {

											has_icon:false,

											has_close_btn:true,

											stack: true,

											fullscreen:true,

											timeout:2000,

											sticky:false,

											has_progress:true,

											rtl:false,

										});

									}

							},

							error: function()

							{

							}

					   });

					}

				else

					{

						$.Toast("", "Enter a number first", "error", {

							has_icon:false,

							has_close_btn:true,

							stack: true,

							fullscreen:true,

							timeout:2000,

							sticky:false,

							has_progress:true,

							rtl:false,

						});

					}

			}

	</script>

</body>



<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jan 2021 12:21:06 GMT -->

</html>
