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
    <title>Result And Rules || <?=$co_name;?></title>
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

	<style>
		#custome-box
			{
				position:fixed;
				left:0px;
				top:0px;
				height:100%;
				width:100%;
				display:none;
				justify-content:center;
				align-items:center;
				background:rgba(0,0,0,0.5);
			}
		#custome-box .col-10
			{
				background:white;
				padding:20px 10px;
				background-radius:10px;
				position:relative;
			}
		#custome-box .close-btn
			{
				position:absolute;
				right:10px;
				top:10px;
				color:tomato;
			}		
	
		.wrap 
			{		
				height: 100%;
				display: flex;
				align-items: center;
				justify-content: center;
				position:absolute;
				
			}

		.wrap button 
			{
				padding: 8px 13px;
				font-family: 'Nunito', sans-serif;
				font-size: 22px;
				text-transform: uppercase;
				letter-spacing: 1.3px;
				font-weight: 700;
				color: white;
				background: #4FD1C5;
				background: linear-gradient(90deg, rgba(237,10,10,0.4) 0%, rgba(237,10,10,1) 100%);
				border: none;
				border-radius: 1000px;
				box-shadow: 12px 12px 24px rgba(237,10,10,.64);
				transition: all 0.3s ease-in-out 0s;
				cursor: pointer;
				outline: none;
				position: relative;
				bottom: 31px;
				left: 32px;
		  }

		

		.wrap .button:hover, .wrap .button:focus 
			{
				color: white;
				transform: translateY(-6px);	
			}

		.wrap button:hover::before, .wrap button:focus::before 
			{
				opacity: 1;
			}

		.wrap button::after 
			{
				content: '';
				width: 30px; height: 30px;
				border-radius: 100%;
				border: 6px solid #ED0A0A;
				position: absolute;
				z-index: -1;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				animation: ring 1.5s infinite;
			}

		.wrap button:hover::after, .wrap button:focus::after 
			{
				animation: none;
				display: none;
			}

		@keyframes ring 
			{
				0% 
					{
						width: 30px;
						height: 30px;
						opacity: 1;
					}
				100% 
					{
						width: 120px;
						height: 120px;
						opacity: 0;
					}
			}
		
		
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
				padding: 6px 4px;
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
				top: 28px;
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
		.rules ul li::before 
			{
				content: "\2022";
				color: red;
				font-weight: bold;
				display: inline-block; 
				width: 1em;
				margin-left: -1em;
				font-size:16px;
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
		$yesterday=date('Y-m-d',strtotime("-1 days"));
		$today=date("Y-m-d");
	?>
    <div class="page-content-wrapper">
		<div class="container">
			<div class="pt-3">
				<div class="row g-3 upper-icons">
					<div class="col-4">
						<p class='nav-btn-text <?php if(@$_GET['date']==$yesterday){echo 'active-nav-btn-text';}?>' style='font-size:11px;' id='open-play-btn' onclick="show_result('<?=$yesterday;?>')"><i class="fa fa-calendar-minus-o" aria-hidden="true"></i>&nbsp;YESTERDAY</p>
					</div>
					<div class="col-4">
						<p class='nav-btn-text <?php if(!isset($_GET['date'])){echo 'active-nav-btn-text';}?>' style='font-size:11px;'  id='jantri-btn' onclick="show_today_result()"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;TODAY</p>
					</div>
					<div class="col-4">
						<p class="nav-btn-text <?php if(isset($_GET['date'])){if((@$_GET['date']!=$yesterday) && (@$_GET['date']!=$today)){echo 'active-nav-btn-text';}}?>" style='font-size:11px;'  id='cross-btn' onclick="open_custome_box()"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i>&nbsp;<?php if(isset($_GET['date'])){if((@$_GET['date']!=$yesterday) && (@$_GET['date']!=$today)){$a=date_create_from_format("Y-m-d",$_GET['date']);$show_date=date_format($a,"d-m-Y");echo $show_date;}else{echo 'CUSTOME';}}else{echo "CUSTOME";}?></p>
					</div>
				</div>	
			</div>
			
			<div class="pt-3">
				<div class="row g-3">
					<div class="col-12" id="result-box" style="margin-top:0px;margin-bottom:60px;">
						<div class="row">
							<?php
								$query=mysqli_query($con,"select * from games order by start_time");
								while($res=mysqli_fetch_array($query))
									{
										$name=$res['name'];
										$start_time=$res['start_time'];
										$end_time=$res['end_time'];
										$a=date_create_from_format("H:i", $end_time);
										$end_time=date_format($a, "h:i a");
										$game_id=$res['id'];
										if(isset($_GET['date']))
        									{
        										$date=$_GET['date'];
        									}
        								else
        									{
        										$date=date("Y-m-d");
        									}	
										if($game_id==11)
										    {
										        $date=date('Y-m-d', strtotime('-1 day', strtotime($date)));
										    }
										
										
										$query2=mysqli_query($con,"select * from game_play where date='$date' and game_id='$game_id'");
										$res2=mysqli_fetch_array($query2);
										
										if(empty(@$res2['result']))
											{
												$result="__";
											}
										else
											{											
												$result=@$res2['result'];
										
											}
										echo "<div class='col-6'><div class='form-group' style='background:#FEF1F1;padding:24px;margin-bottom:45px;border-radius:5px;position:relative;'><center><span style='background:#ED0A0A;color:white;border-radius:4px;display:inline-block;width:100%'>$name</span></center><h5 style='text-align:center;margin-top:15px;'>$end_time</h5><div class='wrap'><button class='button'><span style='font-size:18px;'>$result</span></button></div></div></div>";
									}
							?>
						</div>	
					</div>
					<div class="col-12">
						<p style='background:#ED0A0A;color:white;letter-spacing:1px;padding:8px 10px;border-radius:5px 5px 0px 0px'>RULES</p>
						<div class="form-group rules">
							<ul style="font-size:13px;color:black;">
								<li>Jodi Rate - 10 ka 950</li>
								<li>Harup Rate - 100 ka 950</li>
								<li>Minimum add money 100. INR 24X7 available.</li>
								<li>Minimum widthdrawal money 500. INR 24X7 available.</li>
							</ul>
							<p style="margin-top:20px;">
								<span style='color:#ED0A0A'>Jodi Rules - </span>Example Apne Faridabad Game pe 10rs ka 59 Jodi Lagaya Aur result open hojata h *59* Toh Apke wallet mai instant 950 credit hojayega jo ap kabhi bhi withdrwal kar skte ho apne Bank account mai.
							</p>
							
							<p>
								<span style='color:#ED0A0A'>Harup Rules - </span>Harup hote h 0 se 9 tak aur yeh ander bahr dono side laga skte hai example apne Faridabad game pr 9B 100rs Ka harup lagaya aur Result aaya 59 to apko 950 milega aur agr ap 9AB 100 ka dono side lagate hai to apka total amount 200 banega or result aajata h 99 to apko 1900 instant apke wallet m credit hojayega.
							</p>
						</div>	
					</div>
				</div>	
			</div>
		</div>	
    </div>
	<div id="custome-box">
		<div class="col-10">
			<span class="close-btn" onclick="close_filter_box()"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
			<div class="form-group">
				<label>Select Date</label>
				<input type='date' id="date" name="date" class="form-control" value="<?=$date;?>">
			</div>
			<div class="form-group" style="margin-top:10px;">
				<button type="button" class="btn btn-danger" onclick="filter_custome_date()">Filter</button>
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
				var str=$("#op_number").val();
				var a = str.match(/.{1,2}/g);
				for(var i=0;i<a.length;i++)
					{
						if(a[i].length==2)
							{
								if ($(".palti")[0])
									{
										$(".palti:last").after("<div class='form-group palti' id='palti"+i+"'><span>"+a[i]+"</span><span>=</span><span class='palti_amount'>"+amt+"</span><span><i class='fa fa-times-circle' style='color:tomato;' onclick=removePalti('palti"+i+"',"+a[i]+") aria-hidden='true'></i></span></div>");
									} 
								else 
									{
										$("#open_play_bet_box_span").before("<div class='form-group palti' id='palti"+i+"'><span>"+a[i]+"</span><span>=</span><span class='palti_amount'>"+amt+"</span><span><i class='fa fa-times-circle' style='color:tomato;' onclick=removePalti('palti"+i+"',"+a[i]+") aria-hidden='true'></i></span></div>");
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
										if ($(".palti")[0])
											{
												$(".palti:last").after("<div class='form-group palti' id='palti"+i+"'><span>"+a[i]+"</span><span>=</span><span class='palti_amount'>"+amt+"</span><span><i class='fa fa-times-circle' style='color:tomato;' onclick=removePalti('palti"+i+"',"+a[i]+") aria-hidden='true'></i></span></div>");
											} 
										else 
											{
												$("#open_play_bet_box_span").before("<div class='form-group palti' id='palti"+i+"'><span>"+a[i]+"</span><span>=</span><span class='palti_amount'>"+amt+"</span><span><i class='fa fa-times-circle' onclick=removePalti('palti"+i+"',"+a[i]+") style='color:tomato;' aria-hidden='true'></i></span></div>");
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
				$(".harup").remove();
				if(($(".harupA")[0]) || ($(".harupB")[0]))
					{
						$("#harup_error").html("");
						var str=$("#op_harup_number").val();
						var a = str.match(/.{1,1}/g);
						for(var i=0;i<a.length;i++)
							{
								if(($(".harupA")[0]) && ($(".harupB")[0]))
									{
										$("#open_play_bet_box_span").before("<div class='form-group harup' id='harup"+i+"'><span>"+a[i]+"AB</span><span>=</span><span class='harup_amount'>0</span><span><i class='fa fa-times-circle' style='color:tomato;' aria-hidden='true' onclick=removeHarup('harup"+i+"',"+a[i]+")></i></span></div>");
									}
								else if($(".harupA")[0])
									{
										$("#open_play_bet_box_span").before("<div class='form-group harup' id='harup"+i+"'><span>"+a[i]+"A</span><span>=</span><span class='harup_amount'>0</span><span><i class='fa fa-times-circle' style='color:tomato;' aria-hidden='true' onclick=removeHarup('harup"+i+"',"+a[i]+")></i></span></div>");
									}
								else if($(".harupB")[0])
									{
										$("#open_play_bet_box_span").before("<div class='form-group harup' id='harup"+i+"'><span>"+a[i]+"B</span><span>=</span><span class='harup_amount'>0</span><span><i class='fa fa-times-circle' style='color:tomato;' aria-hidden='true' onclick=removeHarup('harup"+i+"',"+a[i]+")></i></span></div>");
									}		
							}
					}
				else
					{
						$("#harup_error").html("Please select a harup side.");
					}					
			}
			
		function baharIn()
			{
				if($("#baharI").hasClass("fa-circle"))
					{
						$("#baharI").removeClass("fa-circle");
						$("#baharI").addClass("fa-check-circle");
						$("#baharI").addClass("harupB");
						$("#baharI").css("color","#ED0A0A");
					}
				else
					{
						$("#baharI").addClass("fa-circle");
						$("#baharI").removeClass("fa-check-circle");
						$("#baharI").removeClass("harupB");
						$("#baharI").css("color","#FEF1F1");
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
					}
				else
					{
						$("#andarI").addClass("fa-circle");
						$("#andarI").removeClass("fa-check-circle");
						$("#andarI").removeClass("harupA");
						$("#andarI").css("color","#FEF1F1");
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
					}
				else
					{
						$("#with-palti-btn").addClass("fa-circle");
						$("#with-palti-btn").removeClass("fa-check-circle");
						$("#with-palti-btn").removeClass("paltiP");
						$("#with-palti-btn").css("color","#FEF1F1");
					}	
				palti_bet();	
			}
		function set_op_amount()
			{
				if($("#op_amount").val().length>0)
					{
						$(".palti_amount").html($("#op_amount").val());
					}
				else
					{
						$(".palti_amount").html(0);
					}
				calculate_total_op_amount();	
			}
		function set_op_harup_amount()
			{
				if($("#op_harup_amount").val().length>0)
					{
						$(".harup_amount").html($("#op_harup_amount").val());
					}
				else
					{
						$(".harup_amount").html(0);
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
		function calculate_jantri_amount()
			{
				var total_amount=0;
				$(".jantri_amount").each(function() {
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
				$(".cross").remove();
				var str=$("#cross_number").val();
				var a = str.match(/.{1,1}/g);
				for(var i=0;i<a.length;i++)
					{
						var b = str.match(/.{1,1}/g);
						for(var j=0;j<b.length;j++)
							{
								if($(".without_joda")[0])
									{
										if(i==j)
											{
												continue;
											}
									}
								var k=i+""+j;
								$("#cross_bet_box_span").before("<div class='form-group cross' id='cross"+k+"'><span>"+a[i]+""+b[j]+"</span><span>=</span><span class='cross_amount'>"+amt+"</span><span><i class='fa fa-times-circle' style='color:tomato;' aria-hidden='true' onclick=removeCross('cross"+k+"',"+a[i]+")></i></span></div>");
							}
					}
				calculate_total_cross_amount();	
			}
		function set_cross_amount()
			{
				if($("#cross_amount").val().length>0)
					{
						$(".cross_amount").html($("#cross_amount").val());
					}
				else
					{
						$(".cross_amount").html(0);
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
		
		function show_today_result()
			{
				window.location.href="result_and_rules.php";
			}
		function show_result(a)
			{
				window.location.href="result_and_rules.php?date="+a;
			}
		function filter_custome_date()
			{
				var date=$("#date").val();
				window.location.href="result_and_rules.php?date="+date;
			}

		function open_custome_box()
			{
				$("#custome-box").slideDown(500);
				$("#custome-box").css("display","flex");
			}
		function close_filter_box()
			{
				$("#custome-box").slideUp(500);
			}		
	</script>
  </body>
</html>

