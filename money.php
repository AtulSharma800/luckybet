<?php
	include("db.php");
	include("function.php");
	include("common-details.php");
	include("check-login.php");
	$user_id=$_COOKIE['id'];
	$query=mysqli_query($con,"select * from add_money where user_id='$user_id' and status='Pending' order by id desc ");
	$num=mysqli_num_rows($query);
	
	$query22=mysqli_query($con,"select * from add_withdrawal where user_id='$user_id' and status='Pending' order by id desc ");
	$num22=mysqli_num_rows($query22);
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
    <title>Add Money || <?=$co_name;?></title>
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
		.add-amount-btn
			{
				background: linear-gradient(to bottom right, #ED0A0A,#F4B8B8);
				color:white;
				padding:8px 15px;
				border-radius:5px;
			}
		.copy-btn
			{
				background: linear-gradient(to bottom right, #ED0A0A,#F4B8B8);
				color: white;
				padding: 12px 16px;
				border-radius: 0px 5px 5px 0px;
			}

		.next-btn
			{
				background: linear-gradient(to bottom right, #ED0A0A,#F4B8B8);
				color:white;
				padding:8px 15px;
				border-radius:5px;
				letter-spacing:1px;
			}
		.back-btn
			{
				background: black;
				color:white;
				padding:8px 15px;
				border-radius:5px;
				margin-right:10px;
				letter-spacing:1px;
			}	
		.steps,.withdrawal-step
			{
				display:none;
				padding-bottom:20px;
			}
		.active-step
			{
				display:initial;
			}	
		.payment-box
			{
				width:100%;
				height:100px;
				display:flex;
				justify-content:center;
				align-items:center;
				background:white;
				border-radius:15px;
				position:relative;
				margin-top:20px;
			}
		#bank-box,#upi-box,#withdrawal-bank-box
			{
				display:none;
			}		
		.manual-text
			{
				background:#ED0A0A;
				color:white;
				padding:2px 4px;
				border-radius:5px 0px 5px 0px;
				position:absolute;
				right:8px;
				top:8px;
				font-size:9px;
			}
		#error-text, #withdrawal-error-text
			{
				text-align:center;
				color:#ED0A0A;
				letter-spacing:1px;
			}
		#step-3 .payment-box
			{
				width:100%;
				background:white;
				border-radius:15px;
				margin-top:20px;
				padding:10px;
				display:block;
				height:auto;
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
    	
    <div class="page-content-wrapper">
		<div class="container">
			<div class="pt-3">
				<div class="row g-3 upper-icons">
					<div class="col-6">
						<p class='nav-btn-text active-nav-btn-text' id='add-money-btn' onclick="show_box('add-money-btn','add-money-box')">ADD MONEY</p>
					</div>
					<div class="col-6">
						<p class='nav-btn-text'  id='withdrawal-btn' onclick="show_box('withdrawal-btn','withdrawal-box')">WITHDRAWAL MONEY</p>
					</div>
				</div>	
			</div>
			
			<div class="pt-3">
				<div class="row g-3">
					<!--AddMoney-->
					<div class="col-12 common-box active-box" id="add-money-box" style="margin-top:0px;background:#FEF1F1">
						<div class="row" style='margin-top:10px;'>
							<div class="col-12 steps active-step" id="step-1">
								<div class='form-group' style="text-align:center;">
									<img src="img/add-money.png" style='width:100%;max-width:190px;'>
									<h5 style='text-align:center; color:#ED0A0A;margin-top:15px;'>ADD AMOUNT</h5>
								</div>
								<div class='form-group' style="position:relative">
									<input type='text' inputmode="numeric" class='form-control' name="amount" id="amount" style="height:45px;border-color:#ED0A0A;text-align:center;" onkeyup="validate_amount('amount')" placeholder="Enter Amount">
								</div>
								<p id="error-text"></p>
								<p style='background:floralwhite;padding:4px 10px;color:black;margin-top:10px;margin-bottom:30px;letter-spacing:1px;text-align:center;'> <span style='color:#ED0A0A'>Note : </span> Minimum Add Amount is <span style='color:#ED0A0A'>₹ 100</span></p>
								<center><span class="add-amount-btn" onclick="step2()"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;&nbsp;ADD CASH</span></center>
								
								<h4 style="color:#ED0A0A;text-align:center;margin-top:40px;"><img src="img/24x7.png" style="width:40px;">&nbsp;&nbsp; Help & Support</h4>
								
								<p><center><a href="https://wa.me/17073350576"><span style='display: inline-block;position: relative;background: green;color: white;padding: 4px 18px;border-radius: 50px;'><img src="img/whatsapp.png" style="width:50px;position:absolute;left:0px;top:0px;"><span style="display: inline-block;padding-left: 41px;">+1-17073350576</br>Click To Whatsapp</span></span></center></a></p>
							</div>
							
							<div class="col-12 steps" id="step-2">
								<h4 style="color:#ED0A0A;text-align:center;">SELECT PAYMENT METHOD</h4>
								<div class="row">
									<?php
										$query=mysqli_query($con,"select * from payment_methods where status='enable'");
										while($res=mysqli_fetch_array($query))
											{
												$name=$res['name'];
												$mobile_number=$res['mobile_number'];
												$method_id=$res['id'];
												$image=$res['image'];
												$payment_method=$res['payment_method'];
												$bank_name=$res['bank_name'];
												$account_name=$res['account_name'];
												$account_no=$res['account_no'];
                                                $ifsc_code=$res['ifsc_code'];
									?>
												<div class="col-6">
													<div class='form-group payment-box' onclick="step3('<?=$mobile_number;?>',<?=$method_id;?>,'<?=$name;?>','<?=$image;?>','<?=$payment_method;?>','<?=$bank_name;?>','<?=$account_no;?>','<?=$ifsc_code;?>','<?=$account_name;?>')">
														<span class='manual-text'>MANUAL</span>
														<img src="admin/upload/payment_methods/<?=$res['image'];?>" style="height:30px;object-fit:contain;">
													</div>
												</div>
									<?php
											}
									?>									
								</div>	
							</div>
							
							<div class="col-12 steps" id="step-3">
								<h4 style="color:#ED0A0A;text-align:center;">HOW TO MAKE A DEPOSITE</h4>
								<div class="row">
									<div class="col-12">
										<div class='form-group payment-box'>
											<center><img src="img/paytm.png" id="method_image" style="height:40px;object-fit:contain;"></center>
											<p style='text-align:center;margin-top:10px;'>Niche diye gaye detail par <span style='color:#ED0A0A'>₹ <span id='amount_text'></span></span> pay kare, Phir next button par click kare. </p>
										</div>
										<div class='form-group' style="position:relative;margin-top:20px;" id='other-box'>
											<input type='text' class='form-control' name="mobile_number" id="mobile_number" style="height:45px;border-color:#ED0A0A;text-align:center;display:inline-block;width:calc(100% - 95px);background:white;border-radius:5px 0px 0px 5px;" value="9999999999" readonly><span class="copy-btn"id="copy-btn" onclick="copy()">Copy</span>
										</div>
										
										<div class='form-group' style="position:relative;margin-top:20px;" id='bank-box'>
											<input type='text' class='form-control' name="bank_name" id="bank_name" style="height:45px;border-color:#ED0A0A;text-align:center;display:inline-block;width:100%;background:white;border-radius:5px;" readonly>
											<input type='text' class='form-control' name="account_no" id="account_no" style="height:45px;border-color:#ED0A0A;text-align:center;display:inline-block;width:calc(100% - 95px);background:white;border-radius:5px 0px 0px 5px;margin-top:10px;" readonly><span class="copy-btn" id="copy-btn2" onclick="copy2()">Copy</span>
										    <input type='text' class='form-control' name="ifsc_code" id="ifsc_code" style="height:45px;border-color:#ED0A0A;text-align:center;display:inline-block;width:calc(100% - 95px);background:white;border-radius:5px 0px 0px 5px;margin-top:10px;" readonly><span class="copy-btn" id="copy-btn3" onclick="copy3()">Copy</span>
										    <input type='text' class='form-control' name="account_name" id="account_name" style="height:45px;border-color:#ED0A0A;text-align:center;display:inline-block;width:100%;background:white;border-radius:5px;margin-top:10px;" readonly>
										</div>
										
										<p style='background:floralwhite;padding:4px 10px;color:black;margin-top:10px;margin-bottom:30px;letter-spacing:1px;text-align:center;font-size:9px;'> <span style='color:#ED0A0A'>Alert : </span> यहाँ से डिटेल्स देख कर ही पेमेन्ट करें यहाँ डिटेल्स बदलते रहते हैं | </p>
										<center><span class="back-btn" onclick="back_step2()">BACK</span><span class="next-btn" onclick="step4()">NEXT</span></center>
									</div>
																		
								</div>	
							</div>
							
							<div class="col-12 steps" id="step-4">
								<p style="color:#ED0A0A;text-align:center;">₹ <span id="amount_text2"></span> payment ka clear screenshot upload kare phir confirm par click kare.</p>
								<div class="row">
									<div class="col-12">
										<form method="post" id='transaction-form'>
											<div class='form-group' style="position:relative;margin-top:10px;margin-bottom:30px;">
												<input type="hidden" name="payment_method_name" id="payment_method_name">
												<input type='text' class='form-control' name="cash_amount" id="cash_amount" style="height:45px;border-color:#ED0A0A;text-align:center;background:white"  placeholder="" value="500" readonly>
												<input type='text' class='form-control' name="cash_name" id="cash_name" style="height:45px;border-color:#ED0A0A;text-align:center;background:white;margin-top:15px;"  placeholder="Enter Your Name">
												<input type='file' class='form-control' name="cash_screen_shot" id="cash_screen_shot" style="height:45px;border-color:#ED0A0A;text-align:center;background:white;margin-top:15px;color:#ED0A0A"  placeholder="Upload Screenshot">
												<p style='color:black;margin-top:5px;margin-bottom:0px;text-align:center;'>OR</p>
												<input type='text' class='form-control' name="cash_txn_id" id="cash_txn_id" style="height:45px;border-color:#ED0A0A;text-align:center;background:white;margin-top:5px;"  placeholder="Enter Your TXN/ID">
											</div>
										</form>	
										<center><span class="back-btn" onclick="back_step3()">BACK</span><span class="next-btn" id="confirm-btn" onclick="confirm()">CONFIRM</span></center>
									</div>
																		
								</div>	
							</div>
							
							<div class="col-12 steps" id="step-5">
								<h4 style="color:#ED0A0A;text-align:center;">VERIFY PAYMENT</h4>
								<div class="row">
									<div class="col-12">
										<div class='form-group' style="position:relative;margin-top:10px;margin-bottom:30px;">
											<center><img src="img/center-loader2.gif" style="width:100%"></center>
										</div>
										<p style="color:#ED0A0A;text-align:center;">This might take few seconds. So please wait for moment!</p>
										<center><span class="back-btn" onclick="exit()">EXIT</span></center>
									</div>
																		
								</div>	
							</div>
						</div>	
					</div>
					<!--Withdrawalmoney-->
					<div class="col-12 common-box" id="withdrawal-box" style="background:#FEF1F1;padding-bottom:50px;margin-top:0px;">
						<form method="post" id="withdrawal-form">
							<div class="col-12 withdrawal-step active-step" id="withdrawal-step1">
								<div class='form-group' style="text-align:center;">
									<img src="img/withdrawal.png" style='width:100%;max-width:190px;'>
									<h5 style='text-align:center; color:#ED0A0A;margin-top:15px;'>WITHDRAWAL AMOUNT</h5>
								</div>
								<div class='form-group' style="position:relative">
									<input inputmode="numeric" type='text' class='form-control' name="withdrawal_amount" id="withdrawal_amount" style="height:45px;border-color:#ED0A0A;text-align:center;" onkeyup="validate_amount('withdrawal_amount')" placeholder="Enter Amount">
									<input type="hidden" name="max_amount" id="max_amount" value="<?=$available_balance;?>">
								</div>
								<p id="withdrawal-error-text"></p>
								<center><span class="add-amount-btn" onclick="withdrawal_step2()">NEXT</span></center>
							</div>
							
							<div class="col-12 withdrawal-step" id="withdrawal-step2">
								<div class='form-group' style="text-align:center;margin-bottom:20px;">
									<h5 style='text-align:center; color:#ED0A0A;margin-top:15px;'>SELECT WITHDRAWAL METHOD</h5>
								</div>
								<div class='form-group' style="position:relative">
									<label>Payment Method</label>
									<select class='form-control' name="withdrawal_method" id="withdrawal_method" style="height:45px;border-color:#ED0A0A;" onchange="show_method()">
										<option value="">Select Method</option>
										<option value="bank">Bank</option>
										<option value="upi">UPI ID</option>
									</select>	
								</div>
								<?php
								    $query=mysqli_query($con,"select * from add_withdrawal where user_id='$user_id' and withdrawal_method='bank' order by id desc limit 1");
								    $res=mysqli_fetch_array($query);
								    
								    $query2=mysqli_query($con,"select * from add_withdrawal where user_id='$user_id' and withdrawal_method='upi' order by id desc limit 1");
								    $res2=mysqli_fetch_array($query2);
								?>
								<div class='form-group' id="withdrawal-bank-box">
									<label style="margin-top:10px;">Bank Name</label>
									<input type="text" class='form-control' name="bank_name" id="bank_name" value="<?=@$res['bank_name'];?>" style="height:45px;border-color:#ED0A0A;" placeholder="Bank Name">
									<label style="margin-top:10px;">IFSC Code</label>
									<input type="text" class='form-control' name="ifsc_code" id="ifsc_code" value="<?=@$res['ifsc_code'];?>" style="height:45px;border-color:#ED0A0A;" placeholder="IFSC Code">
									<label style="margin-top:10px;">Account No.</label>
									<input type="text" class='form-control' name="account_no" id="account_no" value="<?=@$res['account_no'];?>" style="height:45px;border-color:#ED0A0A;" placeholder="Account Number">
									<label style="margin-top:10px;">Account Name</label>
									<input type="text" class='form-control' name="account_name" id="account_name" value="<?=@$res['account_name'];?>" style="height:45px;border-color:#ED0A0A;" placeholder="Account Name">
								</div>
								
								<div class='form-group' id="upi-box">
									<label style="margin-top:10px;">UPI Id</label>
									<input type="text" class='form-control' name="upi_id" id="upi_id" value="<?=@$res2['upi_id'];?>" style="height:45px;border-color:#ED0A0A;" placeholder="UPI ID">
								</div>
								<p style="margin-top:20px;">&nbsp;</p>
								<center><span class="back-btn" onclick="back_withdrawal_step1()">BACK</span><span class="next-btn" id="withdrawal-confirm-btn" onclick="confirm_withdrawal()">CONFIRM</span></center>
							</div>
							<div class="col-12 steps" id="withdrawal-step3">
								<h4 style="color:#ED0A0A;text-align:center;">VERIFY WITHDRAWAL</h4>
								<div class="row">
									<div class="col-12">
										<div class='form-group' style="position:relative;margin-top:10px;margin-bottom:30px;">
											<center><img src="img/center-loader2.gif" style="width:100%"></center>
										</div>
										<p style="color:#ED0A0A;text-align:center;">This might take few seconds. So please wait for moment!</p>
										<center><span class="back-btn" onclick="withdrawal_exit()">EXIT</span></center>
									</div>
																		
								</div>	
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
	<script src="plugin/toast/toast.script.js"></script>
	<script src="plugin/slick-master/slick/slick.js" type="text/javascript" charset="utf-8"></script>
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
		  
		  /*$(".vertical-center-2").slick({
			dots: true,
			vertical: true,
			centerMode: true,
			slidesToShow: 2,
			slidesToScroll: 2
		  });
		  $(".vertical-center").slick({
			dots: true,
			vertical: true,
			centerMode: true,
		  });
		  $(".vertical").slick({
			dots: true,
			vertical: true,
			slidesToShow: 3,
			slidesToScroll: 3
		  });
		  $(".regular").slick({
			dots: true,
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 3
		  });
		  $(".center").slick({
			dots: true,
			infinite: true,
			centerMode: true,
			slidesToShow: 5,
			slidesToScroll: 3
		  });
		  $(".variable").slick({
			dots: true,
			infinite: true,
			variableWidth: true
		  });
		  $(".lazy").slick({
			lazyLoad: 'ondemand', // ondemand progressive anticipated
			infinite: true
		  });*/
		});
		function show_box(btn_id,box_id)
			{
				$('.nav-btn-text').removeClass("active-nav-btn-text");
				$('#'+btn_id).addClass("active-nav-btn-text");
				
				$('.common-box').removeClass("active-box");
				$('#'+box_id).addClass("active-box");
			}
		function step2()
			{
				if(parseInt($("#amount").val()) >= 100)
					{
						$("#step-1").removeClass("active-step");
						$("#step-2").addClass("active-step");
						$("#error-text").html("");
					}
				else
					{
						$("#error-text").html("Minimum add cash is ₹ 100");
					}	
			}

		function step3(mobile_number,id,name,image,payment_method,bank_name,account_no,ifsc_code,account_name)
			{
				$("#step-2").removeClass("active-step");
				$("#step-3").addClass("active-step");
				if(payment_method=='other')
				    {
				        $("#other-box").css("display","block");
				        $("#bank-box").css("display","none");
        				$("#mobile_number").val(mobile_number);
        				$("#payment_method_name").val(name);
        				$("#method_text").html(name);
				    }
				else
				    {
				        $("#bank-box").css("display","block");
				        $("#other-box").css("display","none");
				        $("#bank_name").val(bank_name);
				        $("#account_no").val(account_no);
				        $("#ifsc_code").val(ifsc_code);
				        $("#account_name").val(account_name);
        				$("#payment_method_name").val(bank_name);
        				$("#method_text").html(bank_name);
				    }
				$("#amount_text").html($("#amount").val());
				$("#amount_text2").html($("#amount").val());
				$("#cash_amount").val($("#amount").val());
				
				$("#method_image").attr("src","admin/upload/payment_methods/"+image);
				
			}
		function back_step2()
			{
				$("#step-3").removeClass("active-step");
				$("#step-2").addClass("active-step");	
			}
		function step4()
			{
				$("#step-3").removeClass("active-step");
				$("#step-4").addClass("active-step");	
			}
		function back_step3()
			{
				$("#step-4").removeClass("active-step");
				$("#step-3").addClass("active-step");	
			}
		function confirm()
			{
				var success=0;
				if($("#cash_name").val().length<2)
					{
						success++;
					}
				if(success==0)
					{					
						$(".page-loader").css("display","flex");
						$("#confirm-btn").removeAttr("onclick");
						var Form=$('#transaction-form')[0];
						$.ajax({
							url: "ajax/add-money.php",
							type: "POST",
							data:  new FormData(Form),
							contentType: false,
							cache: false,
							processData:false,
							success: function(data)
							{
								$(".page-loader").css("display","none");
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
										$("#step-4").removeClass("active-step");
										$("#step-5").addClass("active-step");
									}
								else	
									{
									    $("#confirm-btn").attr("onclick","confirm()");
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
						$.Toast("", "<span style='font-size:15px;'><i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;Please fill all the required field.</span>", "error", {
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
		
		function copy()
			{
				const Code = document.getElementById("mobile_number");
				Code.select();
				document.execCommand("copy", false);
				$("#copy-btn").html("Copied");
				setTimeout(function(){$("#copy-btn").html("Copy");},2000);
			}
			
		function copy2()
			{
				const Code = document.getElementById("account_no");
				Code.select();
				document.execCommand("copy", false);
				$("#copy-btn2").html("Copied");
				setTimeout(function(){$("#copy-btn2").html("Copy");},2000);
			}
		
		function copy3()
			{
				const Code = document.getElementById("ifsc_code");
				Code.select();
				document.execCommand("copy", false);
				$("#copy-btn3").html("Copied");
				setTimeout(function(){$("#copy-btn3").html("Copy");},2000);
			}	

		function withdrawal_step2()
			{
			    if(parseInt($("#withdrawal_amount").val()) >= 500)
					{
						if(parseInt($("#withdrawal_amount").val()) <= parseInt($("#max_amount").val()))
        					{
        						$("#withdrawal-step1").removeClass("active-step");
        						$("#withdrawal-step2").addClass("active-step");
        						$("#withdrawal-error-text").html("");
        					}
        				else
        					{
        						var max_amt=$("#max_amount").val();
        						$("#withdrawal-error-text").html("Max available balance is ₹ "+max_amt);
        					}
					}
				else
				    {
				        $("#withdrawal-error-text").html("Min withdrawal amount is ₹500");
				    }
			}	
		function show_method()
			{
				var payment_method=$("#withdrawal_method").val();
				$("#withdrawal-bank-box").css("display","none");
				$("#upi-box").css("display","none");
				if(payment_method=='bank')
					{
						$("#withdrawal-bank-box").css("display","block");
						$("#upi-box").css("display","none");
					}
				else if(payment_method=='upi')
					{
						$("#withdrawal-bank-box").css("display","none");
						$("#upi-box").css("display","block");
					}	
			}
		function back_withdrawal_step1()
			{
				$("#withdrawal-step2").removeClass("active-step");
				$("#withdrawal-step1").addClass("active-step");
			}
		function confirm_withdrawal()
			{
			    $("#withdrawal-confirm-btn").removeAttr("onclick");
				$(".page-loader").css("display","flex");
				var Form=$('#withdrawal-form')[0];
				$.ajax({
					url: "ajax/add-withdrawal.php",
					type: "POST",
					data:  new FormData(Form),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data)
					{
						$(".page-loader").css("display","none");
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
								$("#withdrawal-step2").removeClass("active-step");
								$("#withdrawal-step3").addClass("active-step");
							}
						else	
							{
							    $("#withdrawal-confirm-btn").attr("onclick","confirm_withdrawal()");
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
		
		function withdrawal_exit()
			{
				window.location.href="home.php";
			}
			
		function exit()
			{
				window.location.href="home.php";
			}
		function validate_amount(id)
		    {
		        $("#"+id).val($("#"+id).val().replace(/\D/, ""));
		    }
	</script>
	<?php
		if($num>0)
			{
				echo "<script>$('#step-1').removeClass('active-step');$('#step-5').addClass('active-step');</script>";
			}
		if($num22>0)
			{
				echo "<script>$('#withdrawal-step1').removeClass('active-step');$('#withdrawal-step3').addClass('active-step');</script>";
			}	
	?>
  </body>
</html>