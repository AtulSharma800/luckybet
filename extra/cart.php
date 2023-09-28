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
    <meta name="description" content="Cart">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Cart || <?=$co_name;?></title>
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
          <h6 class="mb-0">Cart</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas"><span></span><span></span><span></span></div>
      </div>
    </div>
    <?php
		include("common/sidebar.php");
	?>
    <div class="page-content-wrapper">
      <div class="container">
        <!-- Cart Wrapper-->
        <div class="cart-wrapper-area py-3" id="cart-box">
		<?php
			if(count(unserialize($_COOKIE['product_quantitys']))>0)
				{
		?>	
				  <div class="cart-table card mb-3">
					<div class="table-responsive card-body">
					  <table class="table mb-0">
						<tbody>
							<?php
								$i=0;
								$total_price=0;
								$product_ids=unserialize($_COOKIE['product_ids']);
								$product_quantitys=unserialize($_COOKIE['product_quantitys']);
								foreach($product_ids as $product_id)
									{
										$query=mysqli_query($con,"select * from products where id='$product_id'");
										$res=mysqli_fetch_array($query);
										$final_price=$res['price'];
										$price=$res['price'];
										if($res['discount']>0)
											{
												$discount_percent=$res['discount'];   //Percent Discount
												$discount_amount=$price*$discount_percent/100;
												$final_price=$price-$discount_amount;
											}
							?>
										<tr id="row<?=$product_id;?>">
											<th scope="row">
												<a class="remove-product" href="javascript:void(0)" data-id="<?=$product_id;?>"><i class="lni lni-close"></i></a>
											</th>
											<td><img class="rounded" src="admin/upload/product/<?=$res['image'];?>" alt=""></td>
											<td><a href="product-detail.php?product_id=<?=$product_id;?>"><?=$res['name'];?><span>₹<?=number_format($final_price,2);?> × <?=$product_quantitys[$product_id];?></span></a></td>
											<td>
											  <div class="quantity">
												<input class="qty-text" id="input<?=$product_id;?>" type="text" value="<?=$product_quantitys[$product_id];?>" onchange="add_to_cart2(<?=$product_id;?>)">
											  </div>
											</td>
										</tr>
							<?php
													
										$sub_price=$product_quantitys[$product_id]*$final_price;		
										$total_price+=$sub_price;
										$tax=0;
										$discount=0;
										$coupon_discount=0;
										$delivery_fee=100;
										$grand_total=$total_price+$tax-$discount-$coupon_discount+$delivery_fee;
									}
							?>
						  
						</tbody>
					  </table>
					</div>
				  </div>
				  
				  <!-- Coupon Area-->
				  <div class="card coupon-card mb-3">
					<div class="card-body">
					  <div class="apply-coupon">
						<h6 class="mb-0">Have a coupon?</h6>
						<p class="mb-2">Enter your coupon code here &amp; get awesome discounts!</p>
						<div class="coupon-form">
						  <form action="#">
							<input class="form-control" type="text" placeholder="MUDRA">
							<button class="btn btn-primary" type="submit" style="background: transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box;border-color:#ED0A0A;">Apply</button>
						  </form>
						</div>
					  </div>
					</div>
				  </div>
				  <div class="card coupon-card mb-3">
					<div class="card-body">
					  <div class="apply-coupon">
						<h6 class="mb-3">Delivery Option</h6>
						<div class="coupon-form">
						  <div class="coupon-form">
						  <p style="font-size:15px;margin-bottom:8px;"><input type='radio' name="delivery_method" id="delivery" style="transform:scale(1.1);vertical-align:middle;margin-top:-4px;" onchange="check_delivery_method()" value="delivery" checked>&nbsp;&nbsp;&nbsp;&nbsp;Delivery Fee(₹<?=number_format($delivery_fee,2);?>)</p>
						  <p style="font-size:15px;"><input type='radio' name="delivery_method" id="self_pickup" style="transform:scale(1.1);vertical-align:middle;margin-top:-4px;" value="self_pickup" onchange="check_delivery_method()">&nbsp;&nbsp;&nbsp;&nbsp;Self Pickup(Free)</p>
						</div>
						</div>
					  </div>
					</div>
				  </div>
				  <!-- Cart Amount Area-->
				  <!--<div class="card cart-amount-area">
					<div class="card-body d-flex align-items-center justify-content-between">
					  <h5 class="total-price mb-0">₹<span class="counter" id="cart-total"><?=$total_price;?></span></h5><a class="btn btn-warning" href="checkout.php">Checkout Now</a>
					</div>
				  </div>-->
				  <input type="hidden" id="delivery_type" value="delivery">
				  <div class="card cart-amount-area" id="total-box" style="padding:20px;">
					<input type="hidden" id="item_price" value="<?=$total_price;?>">
					<input type="hidden" id="tax" value="<?=$tax;?>">
					<input type="hidden" id="discount" value="<?=$discount;?>">
					<input type="hidden" id="coupon_discount" value="<?=$coupon_discount;?>">
					<input type="hidden" id="delivery_fee" value="<?=$delivery_fee;?>">
					<input type="hidden" id="grand_total" value="<?=$grand_total;?>">
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
		  <?php
				}
			else
				{
					echo "<img src='img/icons/no-product.png' style='width:100%;margin-top:35px;'>";
				}				
		  ?>
        </div>
		<div class="col-lg-12 col-12" style="padding: 15px;position: fixed;bottom: 0px;background: white;z-index: 9999;left:0px;">
			<center><span class="continue-checkout" onclick="continue_checkout()">Continue Checkout</span></center>
		</div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
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
	<script>
		function check_delivery_method()
			{
				if($('#delivery').is(':checked')) 
					{ 
						var delivery_fee=100;
						var delivery_type="delivery";
					}
				else if($('#self_pickup').is(':checked')) 
					{ 
						var delivery_fee=0;
						var delivery_type="self_pickup";
					}
				$("#delivery_type").val(delivery_type);	
				var item_price=parseFloat($("#item_price").val());	
				var tax=parseFloat($("#tax").val());	
				var discount=parseFloat($("#discount").val());	
				var coupon_discount=parseFloat($("#coupon_discount").val());	
				var grand_total = item_price + tax - discount - coupon_discount + delivery_fee;	
				$("#delivery_fee").val(delivery_fee);
				$("#grand_total").val(grand_total);
				$("#grand_total_text").html(round2Fixed(grand_total));
				$("#delivery_fee_text").html(round2Fixed(delivery_fee));
			}
		function continue_checkout()
			{
				var item_price=$("#item_price").val();
				var tax=$("#tax").val();
				var discount=$("#discount").val();
				var coupon_discount=$("#coupon_discount").val();
				var delivery_fee=$("#delivery_fee").val();
				var grand_total=$("#grand_total").val();
				var delivery_type=$("#delivery_type").val();
				window.location.href="checkout.php?item_price="+item_price+"&tax="+tax+"&discount="+discount+"&coupon_discount="+coupon_discount+"&delivery_fee="+delivery_fee+"&grand_total="+grand_total+"&delivery_type="+delivery_type;
			}		
	</script>
  </body>
</html>