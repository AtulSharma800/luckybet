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
    <meta name="description" content="Checkout">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Checkout | <?=$co_name;?></title>
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
		.place-order
			{
				border: 1px solid #A7CC79;
				border-radius: 10px;
				color: #fff !important;
				font-size: 17px !important;
				padding: 8px 15px !important;
				text-decoration: none;
				background: transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box;
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
		#address-box
			{
				position:fixed;
				left:0px;
				top:0px;
				height:100%;
				width:100%;
				display:none;
				justify-content:center;
				align-items:center;
				z-index:9999;
				background:white;
				overflow-y:auto;
			}
		.address_type
			{
				border-radius:5px;
				background:lightgray;
				color:black;
				padding:8px 16px;
				margin-right:10px;
				letter-spacing:1px;
			}		
		.active_address_type
			{
				background:teal !important;
				color:white !important;
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
          <h6 class="mb-0">Checkout</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler"></div>
      </div>
    </div>
    <?php
		include("common/sidebar.php");
	?>
    <div class="page-content-wrapper">
		<div class="container">
			<form id="checkout-form" method="post" enctype="multipart/form-data">
				<input type="hidden" name="item_price" value="<?=$_GET['item_price'];?>">
				<input type="hidden" name="tax" value="<?=$_GET['tax'];?>">
				<input type="hidden" name="discount" value="<?=$_GET['discount'];?>">
				<input type="hidden" name="coupon_discount" value="<?=$_GET['coupon_discount'];?>">
				<input type="hidden" name="delivery_fee" value="<?=$_GET['delivery_fee'];?>">
				<input type="hidden" name="grand_total" value="<?=$_GET['grand_total'];?>">
				<input type="hidden" name="delivery_type" value="<?=$_GET['delivery_type'];?>">
				<!-- Checkout Wrapper-->
				<div class="checkout-wrapper-area py-3">
					<div class="row">
						<div class="col-12">
							<p style="font-size:17px;font-weight:500;letter-spacing:1px;"><span style='color:black; width:calc(100% - 60px);display:inline-block;'>Delivery Address</span><span onclick="open_add_order_box()" style="color:teal;width:60px;text-align:right;display:inline-block;">+ Add</span></p>
						</div>
						<div class="col-12" id="delivery_address_box">
							<?php
								$user_id=$_COOKIE['id'];
								$query2=mysqli_query($con,"select * from shipping_address where user_id='$user_id' order by id desc");
								$num2=mysqli_num_rows($query2);
								if($num2>0)
									{
										while($res2=mysqli_fetch_array($query2))
											{
							?>
												<div style="border-radius:10px;box-shadow:1px 1px 1px 1px lightgray;padding:10px;margin-bottom:12px;">
													<div style='display:inline-block;width:25px;vertical-align:top;'>
														<input type='radio' name="shipping_address" class="shipping_address" value="<?=$res2['id'];?>" style="transform:scale(1.1);">
													</div>
													<div style='display:inline-block;width:calc(100% - 35px)'>
														<p style="margin-bottom:0px;font-weight:bold"><?=$res2['address_type'];?></p>
														<p style="margin-bottom:0px;"><?=$res2['address'];?></p>
													</div>	
												</div>
							<?php
											}
									}
								else
									{
							?>
										<div style="border-radius:10px;box-shadow:1px 1px 1px 1px lightgray;padding:10px;">
											<p style="text-align:center;margin-bottom:0px;">No delivery address found.</p>
										</div>
							<?php
									}	
							?>			
						</div>
					</div>
					<div class="row" style="margin-top:40px;">
						<div class="col-12">
							<p style="font-size:17px;font-weight:500;letter-spacing:1px;"><span style='color:black; width:calc(100% - 60px);display:inline-block;'>Payment Method</span></p>
						</div>
						<div class="col-12" >
							<p style="margin-bottom:5px;font-size:16px;color:darkgray;"><input type="radio" name="payment_method" id="cod" value="cash_on_delivery" checked>&nbsp;&nbsp;&nbsp;&nbsp;Cash on delivery</p>	
							<p style="font-size:16px;color:darkgray;"><input type="radio" name="payment_method" id="digital_payment" value="digital_payment">&nbsp;&nbsp;&nbsp;&nbsp;Digital Payment</p>	
						</div>
					</div>
					<div class="row" style="margin-top:20px;">
						<div class="col-12">
							<textarea class="form-control" id="additional_note" name="additional_note" placeholder="Additional Note" style="height:120px;"></textarea>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-12" style="padding: 15px;position: fixed;bottom: 0px;background: white;z-index: 9999;left:0px;">
					<center><span class="place-order" onclick="place_order()">Place Order</span></center>
				</div>
			</form>
		</div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <div class="page-loader">
		<img src="img/icons/heart.gif" style="height:80px;border-radius:15px;">
	</div>
	
	<!--Add Address Box-->
	<div id="address-box">
		<div class="header-area" id="headerArea">
			<div class="container h-100 d-flex align-items-center justify-content-between">
				<div class="back-button"><a onclick="close_add_order_box()"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></div>
				<div class="page-heading">
					<h6 class="mb-0">Add New Address</h6>
				</div>
				<div class="suha-navbar-toggler"></div>
			</div>
		</div>
		
		<div class="page-content-wrapper">
			<div class="container ">
				<form id="address-form" method="post" enctype="multipart/form-data">
					<!-- Checkout Wrapper-->
					<div class="checkout-wrapper-area py-3" style="padding-bottom:20px;">
						<div class="row">
							<div class="col-12" style="margin-top:10px;">
								<label for="address">Address Type</label>
								<p style="margin-top:20px;"><span class="address_type active_address_type" id="home" onclick="change_address_type('home')">Home</span><span class="address_type" id="office" onclick="change_address_type('office')">Office</span><span class="address_type" id="other" onclick="change_address_type('other')">Other</span></p>
								<input type="hidden" name="address_type" id="address_type">
							</div>
							<div class="col-12" style="margin-top:20px;">
								<div class="form-group text-start mb-4">
									<label for="address">Address Line</label>
									<textarea class="form-control" id="address" name="address" placeholder="Address" style="height:80px;margin-top:10px;"></textarea>
								</div>
								
								<div class="form-group text-start mb-4">
									<label for="pincode">Pincode</label>
									<input class="form-control" id="pincode" name="pincode" type="text" placeholder="Enter Pincode" style="margin-top:10px;">
								</div>
								
								<div class="form-group text-start mb-4">
									<label for="near_by_location">Near By Location</label>
									<input class="form-control" id="near_by_location" name="near_by_location" type="text" placeholder="Enter Near By Location" style="margin-top:10px;">
								</div>
								
								<div class="form-group text-start mb-4">
									<label for="flat_no_house_no">Flat No/House  No</label>
									<input class="form-control" id="flat_no_house_no" name="flat_no_house_no" type="text" placeholder="Enter Flat No/House No" style="margin-top:10px;">
								</div>
								
								<div class="form-group text-start mb-4">
									<label for="contact_person_name">Contact Person Name</label>
									<input class="form-control" id="contact_person_name" name="contact_person_name" type="text" placeholder="Enter Contact Person Name" style="margin-top:10px;">
								</div>
								
								<div class="form-group text-start mb-4">
									<label for="contact_person_name">Contact Person Number</label>
									<input class="form-control" id="contact_person_number" name="contact_person_number" type="text" placeholder="Enter Contact Person Number" style="margin-top:10px;">
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-12" style="padding: 15px;position: fixed;bottom: 0px;background: white;z-index: 9999;left:0px;">
						<center><span class="place-order" onclick="add_address()">Add Address</span></center>
					</div>
				</form>
			</div>
		</div>
		
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
		function place_order()
			{
				var success=0;
				$("#page-loader").css("display","flex");
				$('.shipping_address').each(function() {
					if($(this).is(':checked'))
						{
							success++;
						}
				});
				if(success > 0)
					{
						var Form=$('#checkout-form')[0];
						$.ajax({
							url: "ajax/checkout/add-order.php",
							type: "POST",
							data:  new FormData(Form),
							contentType: false,
							cache: false,
							processData:false,
							success: function(data)
							{
								$("#page-loader").css("display","none");
								var a=JSON.parse(data);
								var order_id=a.order_id;
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
										setTimeout(function(){window.location.href='order-success.php?order_id='+order_id;},1000);
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
				else
					{
						$.Toast("", "<span style='font-size:16px;'><i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;Select a shipping address.</span>", "error", {
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
		function open_add_order_box()
			{
				$("#address-box").css("display","initial");
			}
		function close_add_order_box()
			{
				$("#address-box").css("display","none");
			}
		function add_address()
			{
				$("#page-loader").css("display","flex");
				var Form=$('#address-form')[0];
				$.ajax({
					url: "ajax/checkout/add-address.php",
					type: "POST",
					data:  new FormData(Form),
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
								$("#address-box").css("display","none");
								$("#address-form input").val("");
								$("#address-form textarea").val("");
								show_shipping_address();
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
		function show_shipping_address()
			{
				$("#page-loader").css("display","flex");
				$.ajax({
					url: "ajax/checkout/show-shipping-address.php",
					type: "POST",
					data:  "",
					contentType: false,
					cache: false,
					processData:false,
					success: function(data)
					{
						$("#page-loader").css("display","none");
						$("#delivery_address_box").html(data);
					},
					error: function() 
					{
					} 	        
			   });
			}
		function change_address_type(id)
			{
				$("#address_type").val(id);
				$(".address_type").removeClass("active_address_type");
				$("#"+id).addClass("active_address_type");
			}		
	</script>
  </body>
</html>