<?php
	include("db.php");
	include("function.php");
	include("common-details.php");
	include("check-login.php");
	if(isset($_GET['category_id']))
		{
			$category_id=$_GET['category_id'];
			$query=mysqli_query($con,"select * from product_category where id='$category_id'");
			$res=mysqli_fetch_array($query);
			$page_title=$res['name'];
		}
	else
		{
			$page_title="Products";
		}		
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="<?=$page_title;?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title><?=$page_title;?></title>
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
	<link rel="stylesheet" type="text/css" href="plugin/slick-master/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="plugin/slick-master/slick/slick-theme.css">
	<style>
		.active-category
			{
				background: transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box !important;
				color:white !important;
			}
		#bottom-loader
			{
				display:none;
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
        <div class="back-button"><a onclick="history.back()">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0"><?=$page_title;?></h6>
        </div>
        <!-- Filter Option-->
        <div class="filter-option" data-bs-toggle="offcanvas" data-bs-target="#suhaFilterOffcanvas" aria-controls="suhaFilterOffcanvas">
          <svg class="bi bi-sliders" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"></path>
          </svg>
        </div>
      </div>
    </div>
    <?php
		include("common/sidebar2.php");
	?>
    <div class="page-content-wrapper">
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>All Products</h6>
            <!-- Select Product Catagory-->
            <div class="select-product-catagory">
              <select class="form-select" id="selectProductCatagory" name="selectProductCatagory" aria-label="Default select example">
                <option selected>Short by</option>
                <option value="1">Newest</option>
                <option value="2">Popular</option>
                <option value="3">Ratings</option>
              </select>
            </div>
          </div>
          <div class="product-catagories">
            <div class="row g-3">
				<section class="vertical-center-4 slider">	
					<!-- Single Catagory-->
					<?php
						if(isset($_GET['category_id']))
							{
								$category_id=$_GET['category_id'];
								$query2=mysqli_query($con,"select * from product_category where id='$category_id' order by sort_order");
								$res2=mysqli_fetch_array($query2);
								$id=$res2['id'];
								$name=$res2['name'];
								echo "<div class='col-4' style='padding:0px 5px;'><a class='shadow-sm active-category' style='background:#EBF9DA;height:48px;font-weight:500;' href='product.php?category_id=$id'><span class='two-line' style='overflow-x:hidden'>$name</span></a></div>";
								$query=mysqli_query($con,"select * from product_category where id!='$category_id' order by sort_order");
							}
						else
							{
								$query=mysqli_query($con,"select * from product_category order by sort_order");
							}
						while($res=mysqli_fetch_array($query))
							{
								$id=$res['id'];	
					?>
								<div class="col-4" style="padding:0px 5px;"><a class="shadow-sm" style="background:#EBF9DA;height:48px;font-weight:500" href="product.php?category_id=<?=$id;?>"><span class="two-line" style="overflow-x:hidden"><?=$res['name'];?></span></a></div>
					<?php
							}
					?>			
				</section>	  
            </div>
          </div>
          <div class="row g-3" id="product-box">
			<input type="hidden" name='category_id' id='category_id' value="<?=@$_GET['category_id'];?>">
			<?php
				if(isset($_GET['category_id']))
					{
						$category_id=$_GET['category_id'];
						$a='i:.*;s:.*:"'.$category_id.'";';
						$query=mysqli_query($con,"select * from products where category_ids REGEXP '$a' limit 0,20");
					}
				else
					{
						$query=mysqli_query($con,"select * from products limit 0,20");
					}
				$num=mysqli_num_rows($query);
				if($num>0)
					{					
						while($res=mysqli_fetch_array($query))
							{
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
										$price_text="<p class='sale-price'>₹".number_format($final_price)."<span class='real-price'>₹".number_format($price)."</span></p>";
									}
			?>
								<!-- Single Top Product Card -->
								<div class="col-6 col-md-4 col-lg-3">
									<div class="card product-card">
										<div class="card-body count">
											<?php
												if(!empty(!empty($res['discount'])))
													{
														$discount=$res['discount'];
														echo "<span class='badge rounded-pill badge-warning'>$discount%</span>";
													}
											?>
											<a class="wishlist-btn" href="#">
												<i class="lni lni-heart"></i>
											</a>
											<a class="product-thumbnail d-block" href="single-product.html">
												<img class="mb-2" src="<?=$image;?>" alt="">
												<!--<ul class="offer-countdown-timer d-flex align-items-center shadow-sm" data-countdown="2021/12/31 23:59:59">
												  <li><span class="days">0</span>d</li>
												  <li><span class="hours">0</span>h</li>
												  <li><span class="minutes">0</span>m</li>
												  <li><span class="seconds">0</span>s</li>
												</ul>-->
											</a>
											<a class="product-title d-block" href="product-detail.php?product_id=<?=$res['id'];?>"><?=$res['name'];?></a>
											<?=$price_text;?>
											<!-- Rating -->
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
								<!-- Single Top Product Card -->
			<?php
							}
					}
				else
					{
			?>
						<center><img src="img/no-product.png" style="width:100%"></center>
			<?php
					}					
			?>			
          </div>
		  <div class="row" id="bottom-loader" style="padding:20px;">
				<div class="col-md-12">
					<center><img src="img/icons/bottom-loader.gif" style="width:50px;"></center>
				</div>
		  </div>
		  <p id='no_more_product' style="font-size:18px;letter-spacing:1px;text-align:center;padding:10px;"></p>
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
			slidesToShow: 3,
			infinite:false,
			slidesToScroll: 3,
			rows:1,
			autoplay: false,
			autoplaySpeed: 2000
		  });
		});
		$(window).scroll(function() 
			{
				if($(window).scrollTop() + $(window).height() > $(document).height() - 3) 
					{
						var count = $('.count').length;
						var category_id = $('#category_id').val();
						$("#bottom-loader").css("display","block");
						$.ajax({
							url: "ajax/show-more-product.php?count="+count+"&category_id="+category_id,
							type: "POST",
							data:  "",
							contentType: false,
							cache: false,
							processData:false,
							success: function(data)
							{
								$("#bottom-loader").css("display","none");
								var a=JSON.parse(data);
								if(a.status=='Success')
									{
										$("#product-box").append(a.message);
									}
								else
									{
										$("#no_more_product").html('No more product to show');
									}
							},
							error: function() 
							{
							} 	        
					   });
					}
			});
	</script>
  </body>
</html>