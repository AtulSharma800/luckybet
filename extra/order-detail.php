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
    <title>Order Details || <?=$co_name;?></title>
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
          <h6 class="mb-0">Order Details</h6>
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
				$order_no=sprintf("%05d", $order_id);
				$a=date_create_from_format("Y-m-d", $res['date']);
				$date=date_format($a, "d M Y");
				$shipping_address=json_decode($res['shipping_address']);
			?>
			<p>
				<span style="display:inline-block;width:49%;">Order Id : <b>#<?=$order_no;?></b></span>
				<span style="display:inline-block;width:49%;text-align:right;"><b><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<?=$date;?></b></span>
			</p>
			<p style='color:black;letter-spacing:1px;font-size:16px;'>Delivery Details</p>
			<p style="margin-bottom:7px;"><span style="display:inline-block;width:64%;"><i class="fa fa-user" aria-hidden="true" style="color:#ED0A0A;"></i>&nbsp;<?=$shipping_address->contact_person_name;?></span><span style="display:inline-block;width:35%;text-align:right;"><i class="fa fa-mobile" aria-hidden="true" style="color:#ED0A0A;"></i>&nbsp;<?=$shipping_address->contact_person_number;?></span></p>
			<p><i class="fa fa-map-marker" aria-hidden="true" style="color:#ED0A0A;"></i>&nbsp;<?=$shipping_address->address;?></p>
			<p style="border-top:2px dashed #ED0A0A;margin-bottom:0px;">&nbsp;</p>
			
			<!--Payment Details-->
			<p style='color:black;letter-spacing:1px;font-size:16px;'>Payment Info</p>
			<p style="margin-bottom:7px;"><span style='width:80px;display:inline-block;'>Status</span>  <span style='color:#ED0A0A;font-weight:bold;'><?=$res['payment_status'];?></span></p>
			<p style="margin-bottom:7px;"><span style='width:80px;display:inline-block;'>Method</span>  <span style='color:#ED0A0A;font-weight:bold;'><?=str_replace("_"," ",$res['payment_method']);?></span></p>
			<p style="border-top:2px dashed #ED0A0A;margin-bottom:0px;">&nbsp;</p>
			<div class="cart-table card mb-3">
				<div class="table-responsive card-body">
				  <table class="table mb-0">
					<tbody>
						<?php
							$i=0;
							$total_price=0;
							$query2=mysqli_query($con,"select * from order_details where order_id='$order_id'");
							while($res2=mysqli_fetch_array($query2))
								{
									$product_details=json_decode($res2['product_details']);
									$sub_price = $res2['price'] * $res2['quantity'];
									
						?>
									<tr>
										<td><img class="rounded" src="admin/upload/product/<?=$product_details->image; ?>" alt=""></td>
										<td><a href="product-detail.php?product_id=<?=$product_details->id;?>"><?=$product_details->name;?><span>₹<?=number_format($res2['price'],2);?> × <?=$res2['quantity'];?></span></a></td>
										<td style="vertical-align:top;text-align:right;font-size:16px;color:black;">
										  <div class="quantity">
												₹<?=number_format($sub_price,2);?>
										  </div>
										</td>
									</tr>
						<?php
								}
							$total_price=$res['item_price'];
							$tax=$res['tax'];
							$discount=$res['discount'];
							$coupon_discount=$res['coupon_discount'];
							$delivery_fee=$res['delivery_fee'];
							$grand_total=$res['grand_total'];	
						?>
					  
					</tbody>
				  </table>
				</div>
			  </div>
			  
			 
			  <!-- Cart Amount Area-->
			  <!--<div class="card cart-amount-area">
				<div class="card-body d-flex align-items-center justify-content-between">
				  <h5 class="total-price mb-0">₹<span class="counter" id="cart-total"><?=$total_price;?></span></h5><a class="btn btn-warning" href="checkout.php">Checkout Now</a>
				</div>
			  </div>-->
			  <div class="card cart-amount-area" id="total-box" style="padding:20px;">
				<div class="d-flex align-items-center justify-content-between" style="margin-bottom:10px;">
				  <h5 class="total-price mb-0" style="font-size:15px">Items Price</h5><span style='display:inline-block;font-size:15px;color:black;'>₹<?=number_format($total_price,2);?></span>
				</div>
				<div class="d-flex align-items-center justify-content-between" style="margin-bottom:10px;">
				  <h5 class="total-price mb-0" style="font-size:15px">Vat/Tax</h5><span style='display:inline-block;font-size:15px;color:black;'>(+)₹ <?=number_format($tax,2);?></span>
				</div>
				<div class="d-flex align-items-center justify-content-between" style="margin-bottom:10px;">
				  <h5 class="total-price mb-0" style="font-size:15px">Discount</h5><span style='display:inline-block;font-size:15px;color:black;'>(-)₹ <?=number_format($discount,2);?></span>
				</div>
				<div class="d-flex align-items-center justify-content-between" style="margin-bottom:10px;">
				  <h5 class="total-price mb-0" style="font-size:15px">Coupon Discount</h5><span style='display:inline-block;font-size:15px;color:black;'>(-)₹ <?=number_format($coupon_discount,2);?></span>
				</div>
				<div class="d-flex align-items-center justify-content-between" style="margin-bottom:10px;">
				  <h5 class="total-price mb-0" style="font-size:15px">Delivery Fee</h5><span style='display:inline-block;font-size:15px;color:black;'>(+)₹ <span id='delivery_fee_text'><?=number_format($delivery_fee,2);?></span></span>
				</div>
				<hr style="margin-top: 5px; margin-bottom: 5px;border: 2px dashed #ED0A0A;background-color:transparent;opacity:1;">
				<div class="d-flex align-items-center justify-content-between" style="margin-bottom:10px;">
				  <h5 class="total-price mb-0" style="font-size:18px;color:#ED0A0A;">Total Amount</h5><span style='display:inline-block;font-size:18px;color:#ED0A0A;'>₹ <span id='grand_total_text'><?=number_format($grand_total,2);?></span></span>
				</div>
			  </div>
		</div>
		<?php
			if($order_status=='Pending')
				{
		?>
					<div class="col-lg-12 col-12" style="padding: 15px;position: fixed;bottom: 0px;background: white;z-index: 9999;left:0px;">
						<center><span class="cancel-order" id="cancel-order" onclick="cancel_order(<?=$order_id;?>)">Cancel Order</span></center>
					</div>
		<?php			
				}
			else
				{
		?>
					<div class="col-lg-12 col-12" style="padding: 15px;position: fixed;bottom: 0px;background: white;z-index: 9999;left:0px;">
						<center><span class="cancel-order" id="cancel-order">Order <?=$order_status;?></span></center>
					</div>
		<?php
				}	
		?>
		
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