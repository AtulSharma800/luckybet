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
    <meta name="description" content="<?=$co_name;?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Health Package || <?=$co_name;?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
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
        <div class="back-button"><a href="home.html">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Health Packages</h6>
        </div>
		<div class="filter-option" data-bs-toggle="offcanvas" data-bs-target="#suhaFilterOffcanvas" aria-controls="suhaFilterOffcanvas">
          &nbsp;
        </div>
        <!-- Filter Option-->
        
      </div>
    </div>
    <div class="page-content-wrapper">
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>All Health Package</h6>
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
          
          <div class="row g-3">
			<?php
				$query=mysqli_query($con,"select * from health_package where status='Active' order by id desc");
				while($res=mysqli_fetch_array($query))
					{
						$price=$res['price'];
						$offer_price=$res['offer_price'];
						if(!empty($offer_price))
							{
								$discount=ceil(($price-$offer_price)*100/$price);
								$price_text="<p class='sale-price'><i class='lni lni-rupee'></i>₹$offer_price<span>₹$price</span></p>";
								$discount_badge="<span class='badge badge-danger'>-$discount%</span>";
							}
						else
							{
								$price_text="<p class='sale-price'><i class='lni lni-rupee'></i>₹$price</p>";
								$discount_badge="";
							}							
						
			?>
						<!-- Single Weekly Product Card -->
						<div class="col-12 col-md-6">
						  <div class="card horizontal-product-card">
							<div class="card-body d-flex align-items-center">
							  <div class="product-thumbnail-side">
								<!-- Badge --><?=$discount_badge;?>
								<!-- Wishlist Button --><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a>
								<!-- Thumbnail --><a class="product-thumbnail d-block" href="health-package-detail.php?id=<?=$res['id'];?>"><img src="admin/upload/health_package/<?=$res['image'];?>" style="width:300px;height:300px;object-fit:cover" alt="<?=$res['title'];?>"></a>
							  </div>
							  <div class="product-description">
								<!-- Product Title --><a class="product-title d-block" href="health-package-detail.php?id=<?=$res['id'];?>"><?=$res['title'];?></a>
								<!-- Price -->
								<?=$price_text;?>
								<!-- Rating -->
								<div class="product-rating"><i class="lni lni-star-filled"></i>4.88 (39)</div>
								<!-- Buy Now Button --><a class="btn btn-danger btn-sm" href="health-package-buy-now.php?id=<?=$res['id'];?>"><i class="me-1 lni lni-cart"></i>Buy Now</a>
							  </div>
							</div>
						  </div>
						</div>
						<!-- Single Weekly Product Card -->
			<?php
					}
			?>			
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
  </body>
</html>