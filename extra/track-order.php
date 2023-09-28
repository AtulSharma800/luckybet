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
    <title>Track Order || <?=$co_name;?></title>
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
	<link rel="stylesheet" href="plugin/toast/toast.style.min.css">
	<style>
		.cancel-order
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
		.page-loader
			{
				position:fixed;
				left:0px;
				top:0px;
				height:100%;
				width:100%;
				background:rgba(0,0,0,0.5);
				display:none;
				justify-content:center;
				align-items:center;
			}
		thead tr
			{
				background:#ED0A0A;
				color:white;
			}
		thead tr th
			{
				font-weight:500;
				padding:2px 4px !important;
			}
		tbody tr td
			{
				font-size:12px;
				padding:4px 4px !important;
			}
		.Pending
			{
				background:#ffac00;
				padding: 1px 4px !important;
				color: white !important;
				font-weight: 500 !important;
				font-size:12px !important;
			}
		.Dispatched
			{
				background:#4a8ddc;
				padding: 1px 4px !important;
				color: white !important;
				font-weight: 500 !important;
				font-size:12px !important;
			}
		.Delivered
			{
				background:#73b761;
				padding: 1px 4px !important;
				color: white !important;
				font-weight: 500 !important;
				font-size:12px !important;
			}
		.Cancelled
			{
				background:#ec5656;
				padding: 1px 4px !important;
				color: white !important;
				font-weight: 500 !important;
				font-size:12px !important;
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
          <h6 class="mb-0">Track Order</h6>
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
				$order_id=$_GET['order_id'];
				$query=mysqli_query($con,"select * from orders where id='$order_id'");
				$res=mysqli_fetch_array($query);
				$order_id=$res['id'];
				$order_status=$res['order_status'];
				$grand_total=$res['grand_total'];
				$order_no=sprintf("%05d", $order_id);
				$a=date_create_from_format("Y-m-d", $res['date']);
				$date=date_format($a, "d M Y");
				$shipping_address=json_decode($res['shipping_address']);
			?>
			<p style="box-shadow: 1px 1px 1px 1px lightgrey;padding: 10px;border-radius: 5px;">
				<span style="display:inline-block;width:49%;">Order Id : <b>#<?=$order_no;?></b></span>
				<span style="display:inline-block;width:49%;text-align:right;"><b>Amount</b> : <?=$grand_total;?></span>
			</p>
			<p style="box-shadow: 1px 1px 1px 1px lightgrey;padding: 10px;border-radius: 5px;"><i class="fa fa-map-marker" aria-hidden="true" style="color:#ED0A0A;"></i>&nbsp;<?=$shipping_address->address;?></p>
			<!--Payment Details-->
			<p style='color:black;letter-spacing:1px;font-size:16px;margin-top:30px;'>Order History</p>
			<div class="card mb-3">
				<div class="table-responsive">
				  <table class="table mb-0" border='1'>
					<thead>
						<tr>
							<th style="width:27%;">Date</th>
							<th style="width:25%;text-align:center;">Status</th>
							<th style="width:48%;">Remark</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query2=mysqli_query($con,"select * from order_history where order_id='$order_id'");
							while($res2=mysqli_fetch_array($query2))
								{
									$a=date_create_from_format("Y-m-d",$res2['date']);
									$date=date_format($a,"d M Y");
									$status=$res2['status'];
									$remark=$res2['remark'];
						?>
									<tr>
										<td><?=$date;?></td>
										<td style="text-align:center;"><span class="btn <?=$status;?>"><?=$status;?></span></td>
										<td><?=$remark;?></td>
									</tr>
						<?php
								}
						?>			
					</tbody>
				  </table>
				</div>
			  </div>
			  
			 
			  
		</div>
	  </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
	<div class="page-loader">
		<img src="img/icons/heart.gif" style="height:80px;border-radius:15px;">
	</div>
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
	<script>
		function cancel_order(order_id)
			{
				$("#page-loader").css("display","flex");
				$.ajax({
					url: "ajax/checkout/cancel-order.php?order_id="+order_id,
					type: "POST",
					data:  "",
					contentType: false,
					cache: false,
					processData:false,
					success: function(data)
					{
						$("#page-loader").css("display","none");
						alert(data);
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
								$("#cancel-order").html("Order "+a.order_status);
							}
						else	
							{
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
	</script>
  </body>
</html>