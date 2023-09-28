<?php

	include("db.php");

	include("function.php");

	include("common-details.php");

	include("check-login.php");

?>

<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">

    <meta name="description" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="theme-color" content="#100DD1">

    <meta name="apple-mobile-web-app-capable" content="yes">

    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->

    <!-- Title-->

    <title>Home || <?=$co_name;?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.googleapis.com">

	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Poppins:wght@500&display=swap" rel="stylesheet">

    <!-- Favicon-->

    <link rel="icon" href="<?=$co_favicon;?>">

    <!-- Apple Touch Icon-->

    <link rel="apple-touch-icon" href="<?=$co_favicon;?>">

    <link rel="apple-touch-icon" sizes="152x152" href="<?=$co_favicon;?>">

    <link rel="apple-touch-icon" sizes="167x167" href="<?=$co_favicon;?>">

    <link rel="apple-touch-icon" sizes="180x180" href="<?=$co_favicon;?>">

    <!-- CSS Libraries-->

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link rel="stylesheet" href="css/lineicons.min.css">

    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Stylesheet-->

    <link rel="stylesheet" href="style.css">

    <!-- Web App Manifest-->

    <link rel="manifest" href="manifest.json">

	<link rel="stylesheet" type="text/css" href="plugin/slick-master/slick/slick.css">

	<link rel="stylesheet" type="text/css" href="plugin/slick-master/slick/slick-theme.css">

	<link rel="stylesheet" href="plugin/toast/toast.style.min.css">

	<style>

		.user-id-block

			{

				border: 1px solid #ED0A0A;

				display: inline-block;

				font-size: 9px;

				line-height: 11px;

				padding: 1px 4px;

				border-radius: 4px;

				box-shadow:1px 1px 2px #ED0A0A;

			}

		.cash-block

			{

				display: inline-block;

				font-size: 9px;

				padding: 6px 4px;

				border-radius: 4px;

				background: white;

				margin-left: 5px;

				vertical-align:text-bottom;

			}

		.add-cash-button

			{

				display: inline-block;

				font-size: 9px;

				padding: 6px 9px;

				border-radius: 4px;

				background: linear-gradient(to bottom right, #ED0A0A,#F4B8B8);

				margin-left: 5px;

				vertical-align:text-bottom;

			}

		.nav-btn-text

			{

				display: inline-block;

				padding: 6px 9px;

				background: #FEF1F1;

				margin-left: 5px;

				vertical-align:text-bottom;

				color:black;

				width:100%;

				text-align:center;

				letter-spacing:1px;

			}

		.active-nav-btn-text

			{

				background: linear-gradient(to bottom right, #ED0A0A,#F4B8B8);

				color:white;

				position:relative;

			}

		.active-nav-btn-text:after

			{

				content:"";

				position: absolute;

				height: 0px;

				width: 0px;

				top: 33px;

				left: 10px;

				border-width: 8px;

				border-color: red transparent transparent transparent;

				border-style: solid;

			}

		.common-box

			{

				display:none;

			}

		.active-box

			{

				display:block !important;

			}

		option:checked

			{

			   background: green;

			   color: white;

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

		#open_play_bet_box .form-group, #cross_bet_box .form-group

			{

				border-bottom:1px solid black;padding:6px 10px;margin-bottom:10px;color:black;margin-top:10px;

			}

		#open_play_bet_box .form-group span:nth-child(1), #cross_bet_box .form-group span:nth-child(1)

			{

				display:inline-block;width:20%;

			}

		#open_play_bet_box .form-group span:nth-child(2), #cross_bet_box .form-group span:nth-child(2)

			{

				display:inline-block;width:15%;text-align:center;

			}

		#open_play_bet_box .form-group span:nth-child(3), #cross_bet_box .form-group span:nth-child(3)

			{

				display:inline-block;width:30%;

			}

		#open_play_bet_box .form-group span:nth-child(4), #cross_bet_box .form-group span:nth-child(4)

			{

				display:inline-block;width:30%;text-align:right;

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

    <!-- Preloader-->

    <div class="preloader" id="preloader">

      <div class="spinner-grow text-secondary" role="status">

        <div class="sr-only">Loading...</div>

      </div>

    </div>

    <!-- Header Area-->

    <div class="header-area" id="headerArea" style='background:#FEF1F1'>

      <div class="container h-100 d-flex align-items-center justify-content-between">

        <!-- Logo Wrapper-->

        <div class="logo-wrapper"><a href="home.php"><img src="img/long-logo.png" alt="<?=$co_name;?>" style="max-height:40px;"></a></div>

        <!-- Search Form-->

        <div class="top-search-form">

          &nbsp;

        </div>

		<?php

			$user_id=$_COOKIE['id'];

			$user_code=$_COOKIE['user_id'];

			$available_balance=get_available_amount($user_id,$con);

		?>

        <!-- Navbar Toggler-->

        <div><span class='user-id-block'><span style='color:#ED0A0A;display:block'>USER ID</span><?=$user_code;?></span><span class='cash-block'><img src="img/rupee-symbol2.png" style='height:13px'>&nbsp;&nbsp;<span style='color:#ED0A0A'><?=number_format($available_balance,2);?></span></span><a href="money.php"><span class='add-cash-button'><i class="fa fa-plus-circle" style='color:white' aria-hidden="true"></i></span></a></div>

      </div>

    </div>

    <?php

		include("common/sidebar.php");

	?>

    <!-- PWA Install Alert -->

    <!--<div class="toast pwa-install-alert shadow bg-white" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000" data-bs-autohide="true">

      <div class="toast-body">

        <div class="content d-flex align-items-center mb-2"><img src="<?=$co_favicon;?>" width="72" height="72" alt="">

          <h6 class="mb-0">Add to Home Screen</h6>

          <button class="btn-close ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>

        </div><span class="mb-0 d-block">Add <?=$co_name;?> on your mobile home screen. Click the<strong class="mx-1">Add to Home Screen</strong>button &amp; enjoy it like a regular app.</span>

      </div>

    </div>-->



    <div class="page-content-wrapper">

		<div class="container">

			<div class="pt-3">

				<div class="row g-3 upper-icons">

					<div class="col-4">

						<p class='nav-btn-text active-nav-btn-text' id='open-play-btn' onclick="show_box('open-play-btn','open-play-box')">OPEN PLAY</p>

					</div>

					<div class="col-4">

						<p class='nav-btn-text'  id='jantri-btn' onclick="show_box('jantri-btn','jantri-box')">JANTRI</p>

					</div>

					<div class="col-4">

						<p class="nav-btn-text"  id='cross-btn' onclick="show_box('cross-btn','cross-box')">CROSS</p>

					</div>

				</div>

			</div>

			<?php

			    $game_disabled="";

			    $lastday = date('t',strtotime('today'));

	            $today = date('d');

	            if($lastday == $today)

	                {

	                    $game_disabled = "disabled";

	                }

			?>

			<div class="pt-3">

				<div class="row g-3">

					<div class="col-12 common-box active-box" id="open-play-box" style="margin-top:0px;margin-bottom:60px;">

						<form method="post" id="open-play-form">

							<div class='form-group' style="position:relative">

								<select class='form-control' name="op_game_id" id="op_game_id" style="padding-left:45px;height:45px;border-color:#ED0A0A;" <?=$game_disabled;?>>

									<option value="">Select Game</option>

									<?php

										$query=mysqli_query($con,"select * from games");

										while($res=mysqli_fetch_array($query))

											{

												$id=$res['id'];

												$name=$res['name'];

												$a=date_create_from_format("H:i",$res['start_time']);

												$start_time=date_format($a,"h:i a");

												$a=date_create_from_format("H:i",$res['end_time']);

												$end_time=date_format($a,"h:i a");



												$query2=mysqli_query($con,"select * from game_play where game_id='$id' order by id desc limit 1");

												$res2=mysqli_fetch_array($query2);

												if($id==11)

												    {

												        $stop_date = date('Y-m-d', strtotime($res2['date'] . ' +1 day'));

												    }

												else

												    {

												        $stop_date = $res2['date'];

												    }

										        $t=$stop_date." ".$res['end_time'];

										        $tstamp=strtotime($t);



												$cstamp=strtotime(date("Y-m-d H:i"));

												$disabled="";

												if($tstamp<$cstamp)

												    {

												        $disabled="disabled";

												    }



												echo "<option value='$id' $disabled>$name ($start_time - $end_time)</option>";

											}

									?>

								</select>

								<img src="img/game-icon.png" style='width:25px; position:absolute;left:10px;top:12px;'>

							</div>

							<div class="row" style='margin-top:10px;'>

								<div class="col-7" style='padding-right:0px'>

									<div class="form-group" style='border:1px solid #ED0A0A'>

										<input type="text" name="op_number" id="op_number" inputmode="numeric" onkeyup="palti_bet()" style="height:45px;border:none;width:calc(100% - 50px);vertical-align:top;font-size:12px;padding-left:8px;" placeholder="ENTER NUMBERS">

										<span style='display: inline-block;width: 45px;border-left: 1px solid #ED0A0A;font-size: 10px;text-align: center;color: black;line-height:12px;height:45px;'>With</br>Palti</br> <i class="fa fa-circle" onclick="with_palti()" id="with-palti-btn" aria-hidden="true" style='color:#FEF1F1;font-size:14px;'></i></span>

										<input type="hidden" name='with_palti' id="with_palti" value="0">

									</div>

								</div>

								<div class='col-5'>

									<span style='display: inline-block;vertical-align: middle;margin-right: 5px;color: black;'>=</span>

									<input inputmode="numeric" name="op_amount" id="op_amount" style="height:45px;border:1px solid #ED0A0A;width:calc(100% - 22px);font-size:12px;padding-left:8px;" placeholder="ENTER AMOUNT" onkeyup="set_op_amount()">

								</div>

							</div>

							<div class="row" style='margin-top:10px;'>

								<div class="col-7" style='padding-right:0px'>

									<div class="form-group" style='border:1px solid #ED0A0A'>

										<input inputmode="numeric" name="op_harup_number" id="op_harup_number" onkeyup="harup_bet()" style="height:45px;border:none;width:calc(100% - 50px);vertical-align:top;font-size:12px;padding-left:8px;" placeholder="ENTER HARUP">

										<span style='    display: block;width: 20px;border-left: 1px solid #ED0A0A;font-size: 14px;text-align: center;color: black;height:45px;float:right'>B</br><i class="fa fa-circle" aria-hidden="true" style='color:#FEF1F1;font-size:14px;' id="baharI" onclick="baharIn()"></i></span>

										<span style='    display: block;width: 20px;border-left: 1px solid #ED0A0A;font-size: 14px;text-align: center;color: black;height:45px;float:right;'>A</br> <i class="fa fa-circle" aria-hidden="true" style='color:#FEF1F1;font-size:14px;' id="andarI" onclick="andarIn()"></i></span>

										<input type="hidden" name='andar' id="andar" value="0">

										<input type="hidden" name='bahar' id="bahar" value="0">

									</div>

									<span style='display:block;color:tomato;font-size:14px;' id="harup_error"></span>

								</div>

								<div class='col-5'>

									<span style='display: inline-block;vertical-align: middle;margin-right: 5px;color: black;'>=</span>

									<input inputmode="numeric" name="op_harup_amount" id="op_harup_amount" style="height:45px;border:1px solid #ED0A0A;width:calc(100% - 22px);font-size:12px;padding-left:8px;" placeholder="ENTER AMOUNT" onkeyup="set_op_harup_amount()">

								</div>

							</div>



							<div class="row" id="open_play_bet_box" style="margin-top:20px;padding:10px;">

								<div class="col-md-12" style="border: 1px solid #ED0A0A;border-radius: 5px;">

									<span id="open_play_bet_box_span"></span>

								</div>

							</div>



							<div class="form-group" style="position: fixed;width: 100%;bottom: 60px;left:0px;box-shadow:-2px -2px 4px lightgray">

								<span style="width:50%;display:block;background:white;text-align:center;float:left">

									<span style='color:#ED0A0A;font-weight:bold;'>Rs.<span id='op_total_amount'>0</span></span></br>

									<span style='color:black;font-weight:bold;'>Total Amount</span>

								</span>

								<span style="width:50%;display:inline-block;text-align:center;color:white;background:linear-gradient(to bottom right, #ED0A0A,#F4B8B8);padding-top:13px;letter-spacing:1px;height:48px" id="op-place-bet-btn" onclick="place_op_bet()">

									PLACE BET

								</span>

							</div>

						</form>

					</div>

					<!--Jantri starts-->

					<div class="col-12 common-box" id="jantri-box" style="padding-bottom:60px;">

						<form method="post" id="jantri-form" action="">

							<div class='form-group' style="position:relative">

								<select class='form-control' name="j_game_id" id="j_game_id" style="padding-left:45px;height:45px;border-color:#ED0A0A;" <?=$game_disabled;?>>

									<option value="">Select Game</option>

									<?php

										$query=mysqli_query($con,"select * from games");

										while($res=mysqli_fetch_array($query))

											{

												$id=$res['id'];

												$name=$res['name'];

												$a=date_create_from_format("H:i",$res['start_time']);

												$start_time=date_format($a,"h:i a");

												$a=date_create_from_format("H:i",$res['end_time']);

												$end_time=date_format($a,"h:i a");



												$query2=mysqli_query($con,"select * from game_play where game_id='$id' order by id desc limit 1");

												$res2=mysqli_fetch_array($query2);

												if($id==11)

												    {

												        $stop_date = date('Y-m-d', strtotime($res2['date'] . ' +1 day'));

												    }

												else

												    {

												        $stop_date = $res2['date'];

												    }

										        $t=$stop_date." ".$res['end_time'];

										        $tstamp=strtotime($t);



												$cstamp=strtotime(date("Y-m-d H:i"));

												$disabled="";

												if($tstamp<$cstamp)

												    {

												        $disabled="disabled";

												    }



												echo "<option value='$id' $disabled>$name ($start_time - $end_time)</option>";

											}

									?>

								</select>

								<img src="img/game-icon.png" style='width:25px; position:absolute;left:10px;top:12px;'>

							</div>

							<div class="row" style='margin-top:10px;'>

								<div class="col-md-12">

									<p style='color:black;letter-spacing:1px;margin-bottom:8px;'>Enter Amount Below</p>

								</div>

									<?php

										for($i=1;$i<=99;$i++)

											{

												$num_padded = sprintf("%02d", $i);

												if($i==1 || $i==11 || $i==21 || $i==31 || $i==41 || $i==51 || $i==61 || $i==71 || $i==81 || $i==91)

													{

														echo "<div class='col-12' style='display:flex;'>";

													}

									?>

												<span class='number-box'>

													<span class="number-sub-box"><?=$num_padded;?></span>

													<input inputmode="numeric" name="jantri_amount[]" class='jantri_amount' id="jantri_amount<?=$i;?>" style="height:30px;border:none;width:100%;" onkeyup="calculate_jantri_amount('jantri_amount<?=$i;?>')">

												</span>

									<?php

												if($i==10 || $i==20 || $i==30 || $i==40 || $i==50 || $i==60 || $i==70 || $i==80 || $i==90)

													{

														echo "</div>";

													}

											}

									?>

												<span class='number-box'>

													<span class="number-sub-box">00</span>

													<input inputmode="numeric" name="jantri_amount[]" class='jantri_amount' id="jantri_amount<?=$i;?>" style="height:30px;border:none;width:100%;" onkeyup="calculate_jantri_amount('jantri_amountB<?=$i;?>')">

												</span>

											</div>

								</div>



								<div class="row" style='margin-top:10px;'>

									<div class="col-md-12">

										<p style='color:black;letter-spacing:1px;margin-bottom:8px;'>Ander/A</p>

									</div>

									<div class='col-12' style='display:flex;'>

										<?php

											for($i=1;$i<=9;$i++)

												{

										?>

													<span class='number-box'>

														<span class="number-sub-box"><?=$i;?></span>

														<input inputmode="numeric" name="jantri_amount_a[]" class='jantri_amount_a' id="jantri_amountA<?=$i;?>" style="height:30px;border:none;width:100%;" onkeyup="calculate_jantri_amount('jantri_amountA<?=$i;?>')">

													</span>

										<?php

												}

										?>

										<span class='number-box'>

											<span class="number-sub-box">0</span>

											<input inputmode="numeric" name="jantri_amount_a[]" class='jantri_amount_a' id="jantri_amountA<?=$i;?>" style="height:30px;border:none;width:100%;" onkeyup="calculate_jantri_amount('jantri_amountA<?=$i;?>')">

										</span>

									</div>

								</div>



								<div class="row" style='margin-top:10px;'>

									<div class="col-md-12">

										<p style='color:black;letter-spacing:1px;margin-bottom:8px;'>Bahar/B</p>

									</div>

									<div class='col-12' style='display:flex;'>

										<?php

											for($i=1;$i<=9;$i++)

												{

										?>

													<span class='number-box'>

														<span class="number-sub-box"><?=$i;?></span>

														<input inputmode="numeric" name="jantri_amount_b[]" class='jantri_amount_b' id="jantri_amountB<?=$i;?>" style="height:30px;border:none;width:100%;" onkeyup="calculate_jantri_amount('jantri_amountB<?=$i;?>')">

													</span>

										<?php

												}

										?>

										<span class='number-box'>

											<span class="number-sub-box">0</span>

											<input  inputmode="numeric" name="jantri_amount_b[]" class='jantri_amount_b' id="jantri_amountB<?=$i;?>" style="height:30px;border:none;width:100%;" onkeyup="calculate_jantri_amount('jantri_amountB<?=$i;?>')">

										</span>

									</div>

								</div>







							<div class="form-group" style="position: fixed;width: 100%;bottom: 60px;left:0px;box-shadow:-2px -2px 4px lightgray">

								<span style="width:50%;display:block;background:white;text-align:center;float:left">

									<span style='color:#ED0A0A;font-weight:bold;'>Rs.<span id='jantri_total_amount'>0</span></span></br>

									<span style='color:black;font-weight:bold;'>Total Amount</span>

								</span>

								<span style="width:50%;display:inline-block;text-align:center;color:white;background:linear-gradient(to bottom right, #ED0A0A,#F4B8B8);padding-top:13px;letter-spacing:1px;height:48px" id="j-place-bet-btn" onclick="place_j_bet()">

									PLACE BET

								</span>

							</div>

						</form>

					</div>

					<div class="col-12 common-box" id="cross-box">

						<form method="post" id="cross-form" action="">

							<div class='form-group' style="position:relative">

								<select class='form-control' name="c_game_id" id="c_game_id" style="padding-left:45px;height:45px;border-color:#ED0A0A;" <?=$game_disabled;?>>

									<option value="">Select Game</option>

									<?php

										$query=mysqli_query($con,"select * from games");

										while($res=mysqli_fetch_array($query))

											{

												$id=$res['id'];

												$name=$res['name'];

												$a=date_create_from_format("H:i",$res['start_time']);

												$start_time=date_format($a,"h:i a");

												$a=date_create_from_format("H:i",$res['end_time']);

												$end_time=date_format($a,"h:i a");



												$query2=mysqli_query($con,"select * from game_play where game_id='$id' order by id desc limit 1");

												$res2=mysqli_fetch_array($query2);

												if($id==11)

												    {

												        $stop_date = date('Y-m-d', strtotime($res2['date'] . ' +1 day'));

												    }

												else

												    {

												        $stop_date = $res2['date'];

												    }

										        $t=$stop_date." ".$res['end_time'];

										        $tstamp=strtotime($t);



												$cstamp=strtotime(date("Y-m-d H:i"));

												$disabled="";

												if($tstamp<$cstamp)

												    {

												        $disabled="disabled";

												    }



												echo "<option value='$id' $disabled>$name ($start_time - $end_time)</option>";

											}

									?>

								</select>

								<img src="img/game-icon.png" style='width:25px; position:absolute;left:10px;top:12px;'>

							</div>



							<div class="row" style='margin-top:10px;'>

								<div class="col-7" style='padding-right:0px'>

									<div class="form-group" style='border:1px solid #ED0A0A'>

										<input inputmode="numeric" name="cross_number" id="cross_number" style="height:45px;border:none;width:calc(100% - 50px);vertical-align:top;font-size:12px;padding-left:8px;" onkeyup="cross_bet()" placeholder="ENTER NUMBERS">

										<span style='display: inline-block;width: 45px;border-left: 1px solid #ED0A0A;font-size: 10px;text-align: center;color: black;line-height:12px;height:45px;'>Without</br>Joda</br> <i class="fa fa-circle" aria-hidden="true" onclick="without_joda()" id="without-joda-btn" style='color:#FEF1F1;font-size:14px;'></i></span>

									</div>

								</div>

								<div class='col-5'>

									<span style='display: inline-block;vertical-align: middle;margin-right: 5px;color: black;'>=</span>

									<input inputmode="numeric" name="cross_amount" id="cross_amount" style="height:45px;border:1px solid #ED0A0A;width:calc(100% - 22px);font-size:12px;padding-left:8px;" onkeyup="set_cross_amount()" placeholder="ENTER AMOUNT">

								</div>

							</div>

							<p id="jodi-count"></p>

							<div class="row" id="cross_bet_box" style="margin-top:20px;padding:10px;">

								<div class="col-md-12" style="border: 1px solid #ED0A0A;border-radius: 5px;">

									<span id="cross_bet_box_span"></span>

								</div>

							</div>



							<div class="form-group" style="position: fixed;width: 100%;bottom: 60px;left:0px;box-shadow:-2px -2px 4px lightgray">

								<span style="width:50%;display:block;background:white;text-align:center;float:left">

									<span style='color:#ED0A0A;font-weight:bold;'>Rs.<span id="cross_total_amount">0</span></span></br>

									<span style='color:black;font-weight:bold;'>Total Amount</span>

								</span>

								<span style="width:50%;display:inline-block;text-align:center;color:white;background:linear-gradient(to bottom right, #ED0A0A,#F4B8B8);padding-top:13px;letter-spacing:1px;height:48px" id="c-place-bet-btn" onclick="place_c_bet()">

									PLACE BET

								</span>

							</div>

						</form>

					</div>

				</div>

			</div>

		</div>

    </div>



    <!-- Internet Connection Status-->

    <div class="internet-connection-status" id="internetStatus"></div>

    <!-- Footer Nav-->

    <?php

		include("common/footer.php");

	?>

	<div class="page-loader" id="page-loader"><img src="img/gif/page-loader.gif" width="100px;"></div>

    <!-- All JavaScript Files-->

    <script src="js/bootstrap.bundle.min.js"></script>

    <script src="js/jquery.min.js"></script>

    <script src="js/waypoints.min.js"></script>

    <script src="js/jquery.easing.min.js"></script>

    <script src="js/owl.carousel.min.js"></script>

    <script src="js/jquery.magnific-popup.min.js"></script>

    <script src="js/jquery.counterup.min.js"></script>

    <script src="js/jquery.countdown.min.js"></script>

    <script src="js/jquery.passwordstrength.js"></script>

    <script src="js/dark-mode-switch.js"></script>

    <script src="js/no-internet.js"></script>

    <script src="js/active.js"></script>

    <script src="js/pwa.js"></script>

	<script src="plugin/slick-master/slick/slick.js" type="text/javascript" charset="utf-8"></script>

	<script src="plugin/toast/toast.script.js"></script>

	<script type="text/javascript">

		$(document).on('ready', function() {

		  $(".vertical-center-4").slick({

			horizontal: true,

			slidesToShow: 5,

			infinite:false,

			slidesToScroll: 5,

			rows:2,

			autoplay: true,

			autoplaySpeed: 2000

		  });





		  $(".vertical-center-3").slick({

			horizontal: true,

				slidesToShow: 3,

				infinite:false,

				slidesToScroll: 3,

				rows:1,

				autoplay: true,

				autoplaySpeed: 2000

		  });

		});

		function show_box(btn_id,box_id)

			{

				$('.nav-btn-text').removeClass("active-nav-btn-text");

				$('#'+btn_id).addClass("active-nav-btn-text");



				$('.common-box').removeClass("active-box");

				$('#'+box_id).addClass("active-box");

			}



		//Palti Bet

		function palti_bet()

			{

				if($("#op_amount").val().length>0)

					{

						var amt=$("#op_amount").val();

					}

				else

					{

						var amt=0;

					}

				$(".palti").remove();

				$("#op_number").val($("#op_number").val().replace(/\D/, ""));

				var str=$("#op_number").val();

				var a = str.match(/.{1,2}/g);

				for(var i=0;i<a.length;i++)

					{

						if(a[i].length==2)

							{

							    var exist=0;

							    $(".op_game_number").each(function() {

                					if($(this).val()==a[i])

                						{

                							exist=1;

                						}

                				});

                				if(exist==0)

                				    {

        								if ($(".palti")[0])

        									{

        										$(".palti:last").after("<div class='form-group palti' id='palti"+i+"'><span><input type='hidden' name='op_game_amount[]' class='op_game_amount' value='"+amt+"'><input type='hidden' name='op_game_number[]' class='op_game_number' value='"+a[i]+"'>"+a[i]+"</span><span>=</span><span class='palti_amount'>"+amt+"</span><span><i class='fa fa-times-circle' style='color:tomato;' onclick=removePalti('palti"+i+"',"+a[i]+") aria-hidden='true'></i></span></div>");

        									}

        								else

        									{

        										$("#open_play_bet_box_span").before("<div class='form-group palti' id='palti"+i+"'><span><input type='hidden' name='op_game_amount[]' class='op_game_amount' value='"+amt+"'><input type='hidden' name='op_game_number[]' class='op_game_number'  value='"+a[i]+"'>"+a[i]+"</span><span>=</span><span class='palti_amount'>"+amt+"</span><span><i class='fa fa-times-circle' style='color:tomato;' onclick=removePalti('palti"+i+"',"+a[i]+") aria-hidden='true'></i></span></div>");

        									}

                				    }

							}

					}

				if($(".paltiP")[0])

					{

						var str=$("#op_number").val().split("").reverse().join("");

						var a = str.match(/.{1,2}/g);

						for(var i=0;i<a.length;i++)

							{

							    if(a[i].length==2)

									{

									    var exist=0;

        							    $(".op_game_number").each(function() {

                        					if($(this).val()==a[i])

                        						{

                        							exist=1;

                        						}

                        				});

                        				if(exist==0)

                        				    {

        										if(a[i].charAt(0) != a[i].charAt(1))

        											{

        												if ($(".palti")[0])

        													{

        														$(".palti:last").after("<div class='form-group palti' id='palti"+i+"'><span><input type='hidden' name='op_game_amount[]' class='op_game_amount' value='"+amt+"'><input type='hidden' name='op_game_number[]' class='op_game_number' value='"+a[i]+"'>"+a[i]+"</span><span>=</span><span class='palti_amount'>"+amt+"</span><span><i class='fa fa-times-circle' style='color:tomato;' onclick=removePalti('palti"+i+"',"+a[i]+") aria-hidden='true'></i></span></div>");

        													}

        												else

        													{

        														$("#open_play_bet_box_span").before("<div class='form-group palti' id='palti"+i+"'><span><input type='hidden' name='op_game_amount[]' class='op_game_amount' value='"+amt+"'><input type='hidden' name='op_game_number[]' class='op_game_number' value='"+a[i]+"'>"+a[i]+"</span><span>=</span><span class='palti_amount'>"+amt+"</span><span><i class='fa fa-times-circle' onclick=removePalti('palti"+i+"',"+a[i]+") style='color:tomato;' aria-hidden='true'></i></span></div>");

        													}

        											}

                        				    }

									}

							}

					}

				calculate_total_op_amount();

			}



		//Harup Bet

		//Palti Bet

		function harup_bet()

			{

				if($("#op_harup_amount").val().length>0)

					{

						var amt=$("#op_harup_amount").val();

					}

				else

					{

						var amt=0;

					}

				$("#op_harup_number").val($("#op_harup_number").val().replace(/\D/, ""));

				var str=$("#op_harup_number").val();

				var last_digit=str.charAt(str.length-1);

				var count = str.split(last_digit).length - 1;

				if(count>1)

					{

						$("#op_harup_number").val(str.slice(0,-1));

					}

				else

					{

						$(".harup").remove();

						if(($(".harupA")[0]) || ($(".harupB")[0]))

							{

								$("#harup_error").html("");



								var a = str.match(/.{1,1}/g);

								for(var i=0;i<a.length;i++)

									{

										if(($(".harupA")[0]) && ($(".harupB")[0]))

											{

												var amt2=amt*2;

												$("#open_play_bet_box_span").before("<div class='form-group harup' id='harup"+i+"'><span><input type='hidden' name='oph_game_amount[]' class='oph_game_amount' value='"+amt2+"'><input type='hidden' name='oph_game_number[]' value='"+a[i]+"'>"+a[i]+"AB</span><span>=</span><span class='harup_amount'>"+amt2+"</span><span><i class='fa fa-times-circle' style='color:tomato;' aria-hidden='true' onclick=removeHarup('harup"+i+"',"+a[i]+")></i></span></div>");

											}

										else if($(".harupA")[0])

											{

												$("#open_play_bet_box_span").before("<div class='form-group harup' id='harup"+i+"'><span><input type='hidden' name='oph_game_amount[]' class='oph_game_amount' value='"+amt+"'><input type='hidden' name='oph_game_number[]' value='"+a[i]+"'>"+a[i]+"A</span><span>=</span><span class='harup_amount'>"+amt+"</span><span><i class='fa fa-times-circle' style='color:tomato;' aria-hidden='true' onclick=removeHarup('harup"+i+"',"+a[i]+")></i></span></div>");

											}

										else if($(".harupB")[0])

											{

												$("#open_play_bet_box_span").before("<div class='form-group harup' id='harup"+i+"'><span><input type='hidden' name='oph_game_amount[]' class='oph_game_amount' value='"+amt+"'><input type='hidden' name='oph_game_number[]' value='"+a[i]+"'>"+a[i]+"B</span><span>=</span><span class='harup_amount'>"+amt+"</span><span><i class='fa fa-times-circle' style='color:tomato;' aria-hidden='true' onclick=removeHarup('harup"+i+"',"+a[i]+")></i></span></div>");

											}

									}

							}

						else

							{

								$("#harup_error").html("Please select a harup side.");

							}

					}

				calculate_total_op_amount();

			}



		function baharIn()

			{

				if($("#baharI").hasClass("fa-circle"))

					{

						$("#baharI").removeClass("fa-circle");

						$("#baharI").addClass("fa-check-circle");

						$("#baharI").addClass("harupB");

						$("#baharI").css("color","#ED0A0A");

						$("#bahar").val(1);

					}

				else

					{

						$("#baharI").addClass("fa-circle");

						$("#baharI").removeClass("fa-check-circle");

						$("#baharI").removeClass("harupB");

						$("#baharI").css("color","#FEF1F1");

						$("#bahar").val(0);

					}

				harup_bet();

			}



		function andarIn()

			{

				if($("#andarI").hasClass("fa-circle"))

					{

						$("#andarI").removeClass("fa-circle");

						$("#andarI").addClass("fa-check-circle");

						$("#andarI").addClass("harupA");

						$("#andarI").css("color","#ED0A0A");

						$("#andar").val(1);

					}

				else

					{

						$("#andarI").addClass("fa-circle");

						$("#andarI").removeClass("fa-check-circle");

						$("#andarI").removeClass("harupA");

						$("#andarI").css("color","#FEF1F1");

						$("#andar").val(0);

					}

				harup_bet();

			}

		function removeHarup(id,number)

			{

				$("#"+id).remove();

				var str=$("#op_harup_number").val();

				var newstr=str.replace(number,"");

				$("#op_harup_number").val(newstr);

				calculate_total_op_amount()

			}

		function removePalti(id,number)

			{

				$("#"+id).remove();

				var str=$("#op_number").val();

				var newstr=str.replace(number,"");

				$("#op_number").val(newstr);

				calculate_total_op_amount()

			}

		function with_palti()

			{

				if($("#with-palti-btn").hasClass("fa-circle"))

					{

						$("#with-palti-btn").removeClass("fa-circle");

						$("#with-palti-btn").addClass("fa-check-circle");

						$("#with-palti-btn").addClass("paltiP");

						$("#with-palti-btn").css("color","#ED0A0A");

						$("#with_palti").val(1);

					}

				else

					{

						$("#with-palti-btn").addClass("fa-circle");

						$("#with-palti-btn").removeClass("fa-check-circle");

						$("#with-palti-btn").removeClass("paltiP");

						$("#with-palti-btn").css("color","#FEF1F1");

						$("#with_palti").val(0);

					}

				palti_bet();

			}

		function set_op_amount()

			{

			    $("#op_amount").val($("#op_amount").val().replace(/\D/, ""));

				if($("#op_amount").val().length>0)

					{

					    if($("#op_amount").val()>=5)

					        {

						        $(".palti_amount").html($("#op_amount").val());

						        $(".op_game_amount").val($("#op_amount").val());

					        }

					}

				else

					{

						$(".palti_amount").html(0);

						$(".op_game_amount").val(0);

					}

				calculate_total_op_amount();

			}

		function set_op_harup_amount()

			{

			    $("#op_harup_amount").val($("#op_harup_amount").val().replace(/\D/, ""));

				if($("#op_harup_amount").val().length>0)

					{

					    if($("#op_harup_amount").val()>=5)

					        {

        					    var amt = $("#op_harup_amount").val();

        					    if(($(".harupA")[0]) && ($(".harupB")[0]))

        							{

        								var amt2=amt*2;

        							}

        						else

        						    {

        						        var amt2=amt;

        						    }

        						$(".harup_amount").html(amt2);

        						$(".oph_game_amount").val(amt2);

					        }

					}

				else

					{

						$(".harup_amount").html(0);

						$(".oph_game_amount").val(0);

					}

				calculate_total_op_amount();

			}

		function calculate_total_op_amount()

			{

				var total_amount=0;

				$(".palti_amount").each(function() {

					total_amount+=parseInt($(this).html());

				});

				$(".harup_amount").each(function() {

					total_amount+=parseInt($(this).html());

				});

				$("#op_total_amount").html(total_amount);

			}

		function calculate_jantri_amount(id)

			{

				var total_amount=0;

				$("#"+id).val($("#"+id).val().replace(/\D/, ""));

				$(".jantri_amount").each(function() {

					if($(this).val().length>0)

						{

							total_amount+=parseInt($(this).val());

						}

				});



				$(".jantri_amount_a").each(function() {

					if($(this).val().length>0)

						{

							total_amount+=parseInt($(this).val());

						}

				});



				$(".jantri_amount_b").each(function() {

					if($(this).val().length>0)

						{

							total_amount+=parseInt($(this).val());

						}

				});

				$("#jantri_total_amount").html(total_amount);

			}



		<!--Cross Function-->

		function without_joda()

			{

				if($("#without-joda-btn").hasClass("fa-circle"))

					{

						$("#without-joda-btn").removeClass("fa-circle");

						$("#without-joda-btn").addClass("fa-check-circle");

						$("#without-joda-btn").addClass("without_joda");

						$("#without-joda-btn").css("color","#ED0A0A");

					}

				else

					{

						$("#without-joda-btn").addClass("fa-circle");

						$("#without-joda-btn").removeClass("fa-check-circle");

						$("#without-joda-btn").removeClass("without_joda");

						$("#without-joda-btn").css("color","#FEF1F1");

					}

				cross_bet();

			}



		function cross_bet()

			{

				if($("#cross_amount").val().length>0)

					{

						var amt=$("#cross_amount").val();

					}

				else

					{

						var amt=0;

					}

				var with_jodi=0;

				var without_jodi=0;

				$(".cross").remove();

				$("#cross_number").val($("#cross_number").val().replace(/\D/, ""));

				$("#cross_number").val(removeRepeatedCharacters($("#cross_number").val()));



				var str=$("#cross_number").val();



				var a = str.match(/.{1,1}/g);

				for(var i=0;i<a.length;i++)

					{

						var b = str.match(/.{1,1}/g);

						for(var j=0;j<b.length;j++)

							{

							    var n=a[i]+""+b[j];

							    var exist=0;

							    $(".c_game_number").each(function() {

                					if($(this).val()==n)

                						{

                							exist=1;

                						}

                				});

                				if(exist==0)

                				    {

        								if($(".without_joda")[0])

        									{

        										if(i==j)

        											{

        											    continue;

        											}

        									}

        								if(i==j)

        									{

        									    with_jodi++;

        									}

        								else

        								    {

        								        without_jodi++;

        								    }

        								var k=i+""+j;

        								$("#cross_bet_box_span").before("<div class='form-group cross' id='cross"+k+"'><span><input type='hidden' name='c_game_amount[]' class='c_game_amount' value='"+amt+"'><input type='hidden' name='c_game_number[]' class='c_game_number' value='"+a[i]+""+b[j]+"'>"+a[i]+""+b[j]+"</span><span>=</span><span class='cross_amount'>"+amt+"</span><span><i class='fa fa-times-circle' style='color:tomato;' aria-hidden='true' onclick=removeCross('cross"+k+"',"+a[i]+")></i></span></div>");

                				    }

							}

					}

				$("#jodi-count").css("background","#FEF1F1");

				$("#jodi-count").css("color","black");

				$("#jodi-count").css("padding","5px");

				$("#jodi-count").css("margin-top","10px");

				$("#jodi-count").html("<span style='display:inline-block;width:48%;'>Jodi : "+with_jodi+"</span><span style='display:inline-block;width:48%;'>Without Jodi : "+without_jodi+"</span>");

				calculate_total_cross_amount();

			}

		function set_cross_amount()

			{

			    $("#cross_amount").val($("#cross_amount").val().replace(/\D/, ""));

				if($("#cross_amount").val().length>0)

					{

					    if($("#cross_amount").val()>=5)

					        {

						        $(".cross_amount").html($("#cross_amount").val());

						        $(".c_game_amount").val($("#cross_amount").val());

					        }

					}

				else

					{

						$(".cross_amount").html(0);

						$(".c_game_amount").val(0);

					}

				calculate_total_cross_amount();

			}

		function calculate_total_cross_amount()

			{

				var total_amount=0;

				$(".cross_amount").each(function() {

					if($(this).html().length>0)

						{

							total_amount+=parseInt($(this).html());

						}

				});

				$("#cross_total_amount").html(total_amount);

			}





		//Place Open Play Bet

		function place_op_bet()

			{

				var total_amount=parseInt($("#op_total_amount").html());

				if(total_amount >= 5)

					{

						$("#page-loader").css("display","flex");

						$("#op-place-bet-btn").html("Please Wait....");

						$("#op-place-bet-btn").removeAttr("onclick");

						var Form=$('#open-play-form')[0];

						$.ajax({

							url: "ajax/bet/open-play.php",

							type: "POST",

							data:  new FormData(Form),

							contentType: false,

							cache: false,

							processData:false,

							success: function(data)

							{

								$("#page-loader").css("display","none");

								$("#op-place-bet-btn").html("PLACE BET");

								$("#op-place-bet-btn").attr("onclick","place_op_bet()");

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

										var transaction_id = a.transaction_id;

										setTimeout(function(){window.location.href='receipt.php?transaction_id='+transaction_id;},1000);

									}

								else

									{

										$("#op-place-bet-btn").html("Place Bet");

										$("#op-place-bet-btn").attr("onclick","place_op_bet()");

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

						$.Toast("", "Place bet with some amount.", "error", {

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





		//Place Jantri Bet

		function place_j_bet()

			{

			    var success=0;

			    $(".jantri_amount").each(function() {

					if(($(this).val()<5) && ($(this).val().length>0))

						{

							success++;

						}

				});



				$(".jantri_amount_a").each(function() {

					if(($(this).val()<5) && ($(this).val().length>0))

						{

							success++;

						}

				});



				$(".jantri_amount_b").each(function() {

					if(($(this).val()<5) && ($(this).val().length>0))

						{

							success++;

						}

				});



			    if(success==0)

			        {

        				var total_amount=parseInt($("#jantri_total_amount").html());

        				if(total_amount >= 5)

        					{

        						$("#page-loader").css("display","flex");

        						$("#j-place-bet-btn").html("Please Wait....");

        						$("#j-place-bet-btn").removeAttr("onclick");

        						var Form=$('#jantri-form')[0];

        						$.ajax({

        							url: "ajax/bet/jantri.php",

        							type: "POST",

        							data:  new FormData(Form),

        							contentType: false,

        							cache: false,

        							processData:false,

        							success: function(data)

        							{

        								$("#page-loader").css("display","none");

        								$("#j-place-bet-btn").html("PLACE BET");

        								$("#j-place-bet-btn").attr("onclick","place_j_bet()");

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

        										var transaction_id = a.transaction_id;

        										setTimeout(function(){window.location.href='receipt.php?transaction_id='+transaction_id;},1000);

        									}

        								else

        									{

        										$("#j-place-bet-btn").html("Place Bet");

        										$("#j-place-bet-btn").attr("onclick","place_j_bet()");

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

        						$.Toast("", "Place bet with some amount.", "error", {

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

			     else

			        {

			            $.Toast("", "Place bet with amount >= 5.", "error", {

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



		//Place Cross Bet

		function place_c_bet()

			{

				var total_amount=parseInt($("#cross_total_amount").html());

				if(total_amount >= 5)

					{

						$("#page-loader").css("display","flex");

						$("#c-place-bet-btn").html("Please Wait....");

						$("#c-place-bet-btn").removeAttr("onclick");

						var Form=$('#cross-form')[0];

						$.ajax({

							url: "ajax/bet/cross.php",

							type: "POST",

							data:  new FormData(Form),

							contentType: false,

							cache: false,

							processData:false,

							success: function(data)

							{

								$("#page-loader").css("display","none");

								$("#c-place-bet-btn").html("PLACE BET");

								$("#c-place-bet-btn").attr("onclick","place_c_bet()");

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

										var transaction_id = a.transaction_id;

										setTimeout(function(){window.location.href='receipt.php?transaction_id='+transaction_id;},1000);

									}

								else

									{

										$("#c-place-bet-btn").html("Place Bet");

										$("#c-place-bet-btn").attr("onclick","place_c_bet()");

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

						$.Toast("", "Place bet with some amount.", "error", {

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

	<script>

	    function removeRepeatedCharacters(string) {

          return string

            .split('')

            .filter(function(item, pos, self) {

              return self.indexOf(item) == pos;

            })

            .join('');

        }

	</script>

	<!--<script>

	    $(document).ready(function()

    	    {

    	        $(document).on('keyup', "input",function () {

                   this.value = this.value.replace(/\D/, "")

                });

    	    });

    </script>-->

  </body>

</html>
