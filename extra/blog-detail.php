<?php
	include("db.php");
	include("function.php");
	include("common-details.php");
	include("check-login.php");
	$blog_id=$_GET['blog_id'];
	$query=mysqli_query($con,"select * from blog where id='$blog_id' order by id desc limit 1");
	$res=mysqli_fetch_array($query);
	$link=$co_website_url."blog-detail.php?blog_id=$blog_id";
	$image="admin/upload/blog/".$res['image'];
	$b_blog_image=$res['image'];
	$b_blog_id=$blog_id;
	$b_blog_name=$res['title'];
	$b_blog_category=$res['category'];
	$b_blog_description=$res['description'];
	$b_blog_short_description=substr(strip_tags($res['description']),0,300);
	$a=date_create_from_format("Y-m-d",$res['date_added']);
	$b_blog_date_added=date_format($a,'M d, Y');
	$b_blog_written_by=$res['written_by'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="<?=$b_blog_short_description;?>">
	<meta name="keywords" content="articles, <?=$b_blog_name; ?>">
	<meta name="author" content="">
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?=$b_blog_name; ?>" />
	<meta property="og:description" content="<?=$b_blog_short_description; ?>" />
	<meta property="og:url" content="<?=$link;?>" />
	<meta property="og:site_name" content="<?=$co_name;?>" />
	<meta property="og:image" content="<?=$co_website_url;?><?=$image; ?>" />

	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@MudraSwasthayaSeva">
	<meta name="twitter:title" content="<?=$b_blog_name; ?>">
	<meta name="twitter:description" content="<?=$b_blog_short_description; ?>">
	<meta name="twitter:creator" content="@<?=$co_name;?>">
	<meta name="twitter:image" content="<?=$co_website_url;?><?=$image; ?>">
	<meta name="twitter:domain" content="<?=$link;?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title><?=$b_blog_name;?></title>
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
	<link href="css/sharegg.css" rel="stylesheet">
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
          <h6 class="mb-0">Blog Details</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas"><span></span><span></span><span></span></div>
      </div>
    </div>
    <?php
		include("common/sidebar.php");
	?>
    <div class="page-content-wrapper">
      <div class="blog-details-post-thumbnail" style="height:auto;margin-bottom:0px;">
        <div class="container">
          <img src="admin/upload/blog/<?=$b_blog_image;?>" style="width:100%;">
        </div>
      </div>
      <div class="product-description pb-3">
        <!-- Product Title & Meta Data-->
        <div class="product-title-meta-data bg-white mb-3 py-3">
          <div class="container">
            <h5 class="post-title"><?=$b_blog_name;?></h5><a class="post-catagory mb-3 d-block" href="#"><?=$b_blog_category;?></a>
            <div class="post-meta-data d-flex align-items-center justify-content-between">
				<?php
					if($b_blog_written_by==0)
						{
				?>
							<a class="d-flex align-items-center" href="#">
								<img src="<?=$co_favicon;?>" alt=""><?=$co_name;?><span>Follow</span>
							</a>
				<?php
						}
					else
						{
							$query2=mysqli_query($con,"select * from doctor where id='$b_blog_written_by'");
							$res2=mysqli_fetch_array($query2);
				?>
							<a class="d-flex align-items-center" href="#">
								<img src="admin/upload/doctor/<?=$res['profile'];?>" alt=""><?=$res2['name'];?><span>Follow</span>
							</a>	
				<?php
						}						
				?>			
				<span class="d-flex align-items-center">
					<svg class="bi bi-clock me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
						<path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"></path>
						<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"></path>
					</svg>
					4 min read
				</span>
			</div>
          </div>
        </div>
        <div class="post-content bg-white py-3 mb-3">
			<div class="container">
				<?=$b_blog_description;?>
				<div class="col-md-12" style="margin-top:20px;background:beige;padding:5px;">
					<span style="letter-spacing:1px;font-weight:500;vertical-align:text-bottom;">SHARE ON : &nbsp;&nbsp;</span><div id="share4" style="display:inline-block"></div>
				</div>
			</div>
        </div>
        <!-- All Comments-->
        <div class="rating-and-review-wrapper bg-white py-3 mb-3">
          <div class="container">
            <h6>Comments (3)</h6>
            <div class="rating-review-content">
              <ul class="ps-0">
                <li class="single-user-review d-flex">
                  <div class="user-thumbnail mt-0"><img src="img/bg-img/7.jpg" alt=""></div>
                  <div class="rating-comment">
                    <p class="comment mb-0">Very good product. It's just amazing!</p><span class="name-date">Designing World 12 Dec 2021</span>
                  </div>
                </li>
                <li class="single-user-review d-flex">
                  <div class="user-thumbnail mt-0"><img src="img/bg-img/8.jpg" alt=""></div>
                  <div class="rating-comment">
                    <p class="comment mb-0">Very excellent product. Love it.</p><span class="name-date">Designing World 8 Dec 2021</span>
                  </div>
                </li>
                <li class="single-user-review d-flex">
                  <div class="user-thumbnail mt-0"><img src="img/bg-img/9.jpg" alt=""></div>
                  <div class="rating-comment">
                    <p class="comment mb-0">What a nice product it is. I am looking it's.</p><span class="name-date">Designing World 28 Nov 2021</span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Comment Form-->
        <div class="ratings-submit-form bg-white py-3">
          <div class="container">
            <h6>Submit A Comment</h6>
            <form action="#" method="">
              <div class="mb-3">
                <textarea class="form-control" id="comments" name="comment" cols="30" rows="10" placeholder="Write your comment..."></textarea>
              </div>
              <button class="btn btn-sm btn-primary" type="submit">Post Comment</button>
            </form>
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
	<script src="js/jquery.sharegg.js"></script>
	<script type="text/javascript">
        jQuery(document).ready(function ($){

           $('#share4').sharegg({
                data: {
                    url: '<?=$link;?>',
                    title: '<?=$b_blog_name;?>'
                },
                buttons: {
                    facebook: {
                        show: true,
                        count: true
                    },
                    googleplus: {
                        show: false
                    },
                    twitter: {
                        show: true,
                        count: true
                    },
                    pinterest: {
                        show: true,
                        count: true
                    }
                }
            });
        });
    </script>
  </body>
</html>