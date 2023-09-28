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
    <meta name="description" content="Order Detail">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Order History || <?=$co_name;?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Poppins:wght@500&display=swap" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" href="img/icons/icon-72x72.png">
    <!-- Apple Touch Icon-->
    <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png">
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
	<style>
		.continue-checkout
			{
				border: 1px solid #ED0A0A;
				border-radius: 10px;
				color: #ED0A0A !important;
				font-size: 17px !important;
				padding: 8px 15px !important;
				text-decoration: none;
				box-shadow: 0 3px 6px #00000029;
				width:98%;
				display:inline-block;
				text-align:center;
				letter-spacing:1px;
			}
		.desoslide-wrapper img
			{
				width:100% !important;
			}
		.active-btn
			{
				width: 48%;
				background: transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box;
				color: white;
			}
		.inactive
			{
				width: 48%;
				background: aliceblue;
				color: black;
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
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a onclick="history.back()"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Order History</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler" ></div>
      </div>
    </div>
    <?php
		include("common/sidebar.php");
	?>
    <div class="page-content-wrapper">
      <div class="container">
        <!-- Cart Wrapper-->
        <div class="cart-wrapper-area py-3">
			<?php
				$user_id=$_COOKIE['id'];
				$type="Pending";
				if(isset($_GET['type']))
					{
						$type=$_GET['type'];
					}
				$query=mysqli_query($con,"select * from orders where user_id='$user_id' and (order_status='Pending' or order_status='Dispatched')");
				$pending_orders=mysqli_num_rows($query);
				
				$query=mysqli_query($con,"select * from orders where user_id='$user_id' and (order_status='Delivered' or order_status='Cancelled')");
				$delivered_orders=mysqli_num_rows($query);
			?>
			<p style="width:100%">
                <a href="my-orders.php?type=Pending"><span class="btn <?php if($type=='Pending'){echo 'active-btn';}else{echo 'inactive';} ?>" style="width:48%;margin-right:2%;font-weight:500;">Active(<?=$pending_orders;?>)</span></a>
                <a href="my-orders.php?type=Delivered"><span class="btn <?php if($type=='Pending'){echo 'inactive';}else{echo 'active-btn';} ?>" style="width:46%;margin-left:2%;font-weight:500;">Past Order(<?=$delivered_orders;?>)</span></a>
            </p>
		</div>
		<?php
			$current_date=date("Y-m-d");
			if($type=='Pending')
				{
					$query=mysqli_query($con,"select * from orders where user_id='$user_id' and (order_status='Pending' or order_status='Dispatched') order by id desc");
				}
			else
				{
					$query=mysqli_query($con,"select * from orders where user_id='$user_id' and (order_status='Delivered' or order_status='Cancelled') order by id desc");
				}
			while($res=mysqli_fetch_array($query))
				{
					$a=date_create_from_format("Y-m-d",$res['date']);
					$date=date_format($a,"D, M d, Y");
		?>
					<div class='row'  style='margin-left: 0px;margin-right: 0px;background: white;padding: 10px;border-radius:10px;margin-bottom:15px;box-shadow:1px 1px 1px 1px lightgrey;margin-top:0px;'>
						<h6 style="width:100%;font-weight:500;margin-top:10px;"><?=$date;?><span style="float:right;">₹ <?=number_format($res['grand_total'],2);?></span></h6>
						<p style="margin-bottom:5px;width:100%">Order Id #<?=sprintf("%03d", $res['id']);?></p>
						<h6 style="width:100%;font-weight:500;color:#ED0A0A"><i class="fa fa-circle" aria-hidden="true"></i>&nbsp;Order is <?=$res['order_status'];?></h6>
						<p style="width:100%;margin-top:10px">
							<a href="order-detail.php?order_id=<?=$res['id'];?>"><span class="btn" style="background:#D8F0C2;font-weight:500">View Details</span></a>
							<a href="track-order.php?order_id=<?=$res['id'];?>"><span class="btn" style="border:2px solid #ED0A0A;float:right;font-weight:500">Track Orders</span></a>
						</p>
					</div> 
		<?php
				}
		?>
		</br>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
	<?php
		include("common/footer.php");
	?>
    <!-- Footer Nav-->
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
	
  </body>
</html>