<?php
	include("db.php");
	include("function.php");
	include("common-details.php");
	include("check-login.php");
	$product_id=$_GET['product_id'];
	$query=mysqli_query($con,"select * from products where id='$product_id'");
	$res=mysqli_fetch_array($query);
	$p_product_image="admin/upload/product/".$res['image'];
	$p_product_id=$product_id;
	$p_product_name=$res['name'];
	$p_product_short_description=substr(strip_tags($res['description']),0,200);
	$p_product_description=$res['description'];
	$p_product_link=$co_website_url."product-detail.php?product_id=$product_id";
	$p_product_price=$res['price'];
	$p_product_price_text="<p class='sale-price mb-0'>₹".number_format($p_product_price)."</p>";
	if($res['discount']>0)
		{
			$discount_percent=$res['discount'];   //Percent Discount
			$discount_amount=$p_product_price*$discount_percent/100;
			$final_price=$p_product_price-$discount_amount;
			$p_product_price_text="<p class='sale-price mb-0'>₹".number_format($p_product_price)."<span>₹".number_format($final_price)."</span></p>";
		}
	$p_related_products=unserialize($res['related_products']);	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="<?=$p_product_description;?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title><?=$p_product_name;?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Poppins:wght@500&display=swap" rel="stylesheet">
    <!-- Favicon-->
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?=$p_product_name; ?>" />
	<meta property="og:description" content="<?=$p_product_short_description; ?>" />
	<meta property="og:url" content="<?=$p_product_link;?>" />
	<meta property="og:site_name" content="<?=$co_name;?>" />
	<meta property="og:image" content="<?=$co_website_url;?><?=$p_product_image; ?>" />

	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@MudraSwasthayaSeva">
	<meta name="twitter:title" content="<?=$p_product_name; ?>">
	<meta name="twitter:description" content="<?=$p_product_short_description; ?>">
	<meta name="twitter:creator" content="@<?=$co_name;?>">
	<meta name="twitter:image" content="<?=$co_website_url;?><?=$p_product_image; ?>">
	<meta name="twitter:domain" content="<?=$p_product_link;?>">
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
		.product-slides
			{
				margin-bottom:0px;
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
        <div class="back-button">
			<a onclick="history.back()">
				<svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
				</svg>
			</a>
		</div>
        <!-- Page Title-->
        <div class="page-heading">
			<h6 class="mb-0">Product Detail</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas"><span></span><span></span><span></span></div>
      </div>
    </div>
    <?php
		include("common/sidebar.php");
	?>
    <div class="page-content-wrapper">
		<div class="product-slide-wrapper">
			<!-- Product Slides-->
			<div class="product-slides owl-carousel">
				<!-- Single Hero Slide-->
				<div class="single-product-slide" style="background-image: url('<?=$p_product_image;?>');background-size:contain;background-position:center;background-repeat:no-repeat;"></div>
				<!-- Single Hero Slide-->
				<!--<div class="single-product-slide" style="background-image: url('img/bg-img/10.jpg')"></div>-->
				<!-- Single Hero Slide-->
				<!--<div class="single-product-slide" style="background-image: url('img/bg-img/11.jpg')"></div>-->
			</div>
			<!--<a class="video-btn shadow-sm" id="singleProductVideoBtn" href="https://www.youtube.com/watch?v=lFGvqvPh5jI">
				<svg class="bi bi-play text-dark" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
					<path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"></path>
				</svg>
			</a>-->
      </div>
	  <?php
		$query2=mysqli_query($con,"select sum(rating) as total_rating from product_reviews where product_id='$product_id' and status='Enable'");
		$res2=mysqli_fetch_array($query2);
		$total_rating=$res2['total_rating'];
		
		$query2=mysqli_query($con,"select * from product_reviews where product_id='$product_id' and status='Enable'");
		$num2=mysqli_num_rows($query2);
		$rating=0;
		if($num2>0)
			{
				$rating=$total_rating/$num2;
			}
	  ?>
      <div class="product-description pb-3">
        <!-- Product Title & Meta Data-->
        <div class="product-title-meta-data bg-white mb-3 py-3">
          <div class="container d-flex justify-content-between">
            <div class="p-title-price">
              <h6 class="mb-1"><?=$p_product_name;?></h6>
              <?=$p_product_price_text;?>
            </div>
            <div class="p-wishlist-share"><a href="wishlist-grid.html"><i class="lni lni-heart"></i></a></div>
          </div>
          <!-- Ratings-->
          <div class="product-ratings">
            <div class="container d-flex align-items-center justify-content-between">
              <div class="ratings"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><span class="ps-1"><?=@$num2;?> ratings</span></div>
              <div class="total-result-of-ratings"><span><?=@round($rating,1);?></span><span>Very Good                                </span></div>
            </div>
          </div>
        </div>
        <!-- Flash Sale Panel-->
        <div class="flash-sale-panel bg-white mb-3 py-3" style="display:none">
          <div class="container">
            <!-- Sales Offer Content-->
            <div class="sales-offer-content d-flex align-items-end justify-content-between">
              <!-- Sales End-->
              <div class="sales-end">
                <p class="mb-1 font-weight-bold"><i class="lni lni-bolt"></i> Flash sale end in</p>
                <!-- Please use event time this format: YYYY/MM/DD hh:mm:ss-->
                <ul class="sales-end-timer ps-0 d-flex align-items-center" data-countdown="2022/01/01 14:21:37">
                  <li><span class="days">0</span>d</li>
                  <li><span class="hours">0</span>h</li>
                  <li><span class="minutes">0</span>m</li>
                  <li><span class="seconds">0</span>s</li>
                </ul>
              </div>
              <!-- Sales Volume-->
              <div class="sales-volume text-end">
                <p class="mb-1 font-weight-bold">82% Sold Out</p>
                <div class="progress" style="height: 6px;">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 82%;" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Selection Panel-->
        <div class="selection-panel bg-white mb-3 py-3" style="display:none">
          <div class="container d-flex align-items-center justify-content-between">
            <!-- Choose Color-->
            <div class="choose-color-wrapper">
              <p class="mb-1 font-weight-bold">Color</p>
              <div class="choose-color-radio d-flex align-items-center">
                <!-- Single Radio Input-->
                <div class="form-check mb-0">
                  <input class="form-check-input blue" id="colorRadio1" type="radio" name="colorRadio" checked>
                  <label class="form-check-label" for="colorRadio1"></label>
                </div>
                <!-- Single Radio Input-->
                <div class="form-check mb-0">
                  <input class="form-check-input yellow" id="colorRadio2" type="radio" name="colorRadio">
                  <label class="form-check-label" for="colorRadio2"></label>
                </div>
                <!-- Single Radio Input-->
                <div class="form-check mb-0">
                  <input class="form-check-input green" id="colorRadio3" type="radio" name="colorRadio">
                  <label class="form-check-label" for="colorRadio3"></label>
                </div>
                <!-- Single Radio Input-->
                <div class="form-check mb-0">
                  <input class="form-check-input purple" id="colorRadio4" type="radio" name="colorRadio">
                  <label class="form-check-label" for="colorRadio4"></label>
                </div>
              </div>
            </div>
            <!-- Choose Size-->
            <div class="choose-size-wrapper text-end">
              <p class="mb-1 font-weight-bold">Size</p>
              <div class="choose-size-radio d-flex align-items-center">
                <!-- Single Radio Input-->
                <div class="form-check mb-0 me-2">
                  <input class="form-check-input" id="sizeRadio1" type="radio" name="sizeRadio">
                  <label class="form-check-label" for="sizeRadio1">S</label>
                </div>
                <!-- Single Radio Input-->
                <div class="form-check mb-0 me-2">
                  <input class="form-check-input" id="sizeRadio2" type="radio" name="sizeRadio" checked>
                  <label class="form-check-label" for="sizeRadio2">M</label>
                </div>
                <!-- Single Radio Input-->
                <div class="form-check mb-0">
                  <input class="form-check-input" id="sizeRadio3" type="radio" name="sizeRadio">
                  <label class="form-check-label" for="sizeRadio3">L</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Add To Cart-->
        <div class="cart-form-wrapper bg-white mb-3 py-3">
          <div class="container">
            <form class="cart-form" action="#" method="">
              <div class="order-plus-minus d-flex align-items-center">
                <div class="quantity-button-handler">-</div>
                <input class="form-control cart-quantity-input" type="text" step="1" name="quantity" id="product-quantity" value="1">
                <div class="quantity-button-handler">+</div>
              </div>
				<?php
					$product_ids=@unserialize($_COOKIE['product_ids']);
					if(@in_array($product_id, $product_ids))
						{
				?>
							<button class="btn btn-danger ms-3" type="button">Already Added</button>
				<?php
						}
					else
						{
				?>
							<button class="btn btn-success ms-3" type="button" onclick="add_to_cart2(<?=$product_id;?>)">Add To Cart</button>
				<?php
						}						
				?>			
            </form>
          </div>
        </div>
        <!-- Product Specification-->
        <div class="p-specification bg-white mb-3 py-3">
          <div class="container">
            <?=$p_product_description;?>
          </div>
        </div>
        <!-- Product Video -->
        
        <div class="pb-3"></div>
		<?php
			if(!empty($p_related_products))
				{
		?>
        <!-- Related Products Slides-->
        <div class="related-product-wrapper py-3 mb-3">
          <div class="container">
            <div class="section-heading d-flex align-items-center justify-content-between">
              <h6>Related Products</h6><a class="btn" href="related-products.php?product_id=<?=$p_product_id;?>">View All</a>
            </div>
            <div class="related-product-slide owl-carousel">
				<?php
					$i=0;
					foreach($p_related_products as $product_id)
						{
							if($i==6)
								{
									break;
								}
							$query=mysqli_query($con,"select * from products where id='$product_id'");
							$res=mysqli_fetch_array($query);
							
							$product_id=$res['id'];
							$name=$res['name'];
							$image="admin/upload/product/".$res['image'];
							$price=$res['price'];
							$price_text="<p class='sale-price'>₹".number_format($price)."</p>";
							if($res['discount']>0)
								{
									$discount_percent=$res['discount'];   //Percent Discount
									$discount_amount=$price*$discount_percent/100;
									$final_price=$price-$discount_amount;
									$price_text="<p class='sale-price'>₹".number_format($price)."<span>₹".number_format($final_price)."</span></p>";
								}
				?>
							<!-- Single Product Slide -->
								<div class="single-related-product-slide">
									<div class="card product-card">
										<div class="card-body">
											<span class="badge rounded-pill badge-warning">Sale</span>
											<a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a>
											<a class="product-thumbnail d-block" href="product-detail.php?product_id=<?=$product_id;?>">
												<img class="mb-2" src="<?=$image;?>" style="height:142px;object-fit:contain" alt="">
												<ul class="offer-countdown-timer d-flex align-items-center shadow-sm" data-countdown="2022/10/25 23:59:59">
													<li><span class="days">0</span>d</li>
													<li><span class="hours">0</span>h</li>
													<li><span class="minutes">0</span>m</li>
													<li><span class="seconds">0</span>s</li>
												</ul>
											</a>
											<a class="product-title d-block" href="product-detail.php?product_id=<?=$product_id;?>"><?=$name;?></a>
											<?=$price_text;?>
											<div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
											<?php
												$product_ids=@unserialize($_COOKIE['product_ids']);
												if(@in_array($product_id, $product_ids))
													{
											?>
														<a class="btn btn-success btn-sm cart-btn" style="background-color:tomato;border-color:tomato;" data-id="<?=$product_id;?>" data-quantity="1" data-added="1" href="#"><i class="lni lni-minus"></i></a>
											<?php
													}
												else
													{
											?>
														<a class="btn btn-success btn-sm cart-btn" data-id="<?=$product_id;?>" data-quantity="1" data-added="0" href="#"><i class="lni lni-plus"></i></a>		
											<?php
													}								
											?>
										</div>		
									</div>
								</div>
							  <!-- Single Product Slide -->
				<?php
							$i++;
						}
				?>			  
            </div>
		</div>
	</div>
	<?php
				}
	?>
        <!-- Rating & Review Wrapper -->
        <div class="rating-and-review-wrapper bg-white py-3 mb-3" >
          <div class="container">
            <h6>Ratings &amp; Reviews</h6>
            <div class="rating-review-content">
              <ul class="ps-0">
				<?php
					$query=mysqli_query($con,"select * from product_reviews where product_id='$product_id' and status='Enable'");
					while($res=mysqli_fetch_array($query))
						{
							$user_id=$res['user_id'];
							$query2=mysqli_query($con,"select * from users where id='$user_id'");
							$res2=mysqli_fetch_array($query2);
							$name=$res2['name'];
							$a=date_create_from_format("Y-m-d",$res['date_added']);
							$date=date_format($a,"d M Y");
							$review=$res['review'];
							$rating=$res['rating'];
							$image="img/icons/user-icon.png";
							if(!empty($res2['profile']))
								{
									$image="images/profile/".$res2['profile'];
								}
				?>
							<!-- Single User Review -->
							<li class="single-user-review d-flex">
							  <div class="user-thumbnail">
							  <img src="img/icons/user-icon.png" style="box-shadow:1px 1px 1px 1px lightgrey;" alt="">
							  </div>
							  <div class="rating-comment">
								<span class="name-date" style="font-size:15px;color:#ED0A0A;"><?=$name;?> </span>
								<div class="rating">
								<?php
									for($i=1;$i<=5;$i++)
										{
											if($i<=$rating)
												{
													echo "<i class='lni lni-star-filled'></i>";
												}
											else
												{
													echo "<i class='lni lni-star'></i>";
												}												
										}
								?>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:black;'><?=$date;?></span></div>
								<p class="comment mb-0"><?=$review;?></p>
							  </div>
							</li>
				<?php
						}
				?>			
                
              </ul>
            </div>
          </div>
        </div>
        <!-- Ratings Submit Form-->
        <div class="ratings-submit-form bg-white py-3" style="padding-bottom:65px !important;">
          <div class="container">
            <h6>Submit A Review</h6>
            <form action="#" id="review-form" method="post">
              <div class="stars mb-3">
                <input class="star-1" type="radio" name="star" id="star1" value="1">
                <label class="star-1" for="star1"></label>
                <input class="star-2" type="radio" name="star" id="star2" value="2">
                <label class="star-2" for="star2"></label>
                <input class="star-3" type="radio" name="star" id="star3" value="3">
                <label class="star-3" for="star3"></label>
                <input class="star-4" type="radio" name="star" id="star4" value="4">
                <label class="star-4" for="star4"></label>
                <input class="star-5" type="radio" name="star" id="star5" value="5">
                <label class="star-5" for="star5"></label><span></span>
              </div>
              <textarea class="form-control mb-3" id="comments" name="comment" cols="30" rows="10" data-max-length="200" placeholder="Write your review..."></textarea>
              <button class="btn btn-sm btn-primary" type="button" onclick="save_review(<?=$product_id;?>)" style="background:#ED0A0A;border-color:#ED0A0A;">Save Review</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
	<div class="page-loader" id="page-loader">
		<img src="img/icons/heart.gif" style="height:80px;border-radius:15px;">
	</div>
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
	<script>
		function save_review(product_id)
			{
				var Form=$('#review-form')[0];
				$.ajax({
					url: "ajax/product/save-review.php?product_id="+product_id,
					type: "POST",
					data:  new FormData(Form),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data)
						{
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
									$("#comments").val("");
									$("#star1").removeAttr("checked");
									$("#star2").removeAttr("checked");
									$("#star3").removeAttr("checked");
									$("#star4").removeAttr("checked");
									$("#star5").removeAttr("checked");
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