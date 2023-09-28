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
    <meta name="description" content="Health Feed">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Health Feed || <?=$co_name;?></title>
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
	<style>
		.category-block
			{
				background: transparent linear-gradient(180deg,#A7CC79 0,#ED0A0A 100%) 0 0 no-repeat padding-box;
				padding:3px 8px;
				border-radius:5px;
				color:white;
				margin-right:10px;
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
          <h6 class="mb-0">Health Feed</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas"><span></span><span></span><span></span></div>
      </div>
    </div>
    
    <?php
		include("common/sidebar.php");
	?>
    <div class="page-content-wrapper">
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Health Feed List</h6>
            <!-- Layout Options-->
            <div class="layout-options"><a class="active" href="#" style="background-color:#ED0A0A;"><i class="lni lni-radio-button"></i></a></div>
          </div>
          <div class="row g-3">
			<?php
				if(isset($_GET['category']))
					{
						$category=$_GET['category'];
						$query=mysqli_query($con,"select * from blog where status='1' and category='$category' order by id desc limit 6");
					}
				else
					{
						$query=mysqli_query($con,"select * from blog where status='1' order by id desc limit 6");
					}
				$num=mysqli_num_rows($query);
				if($num>0)
					{					
						while($res=mysqli_fetch_array($query))
							{
								$blog_id=$res['id'];
								$written_by_id=$res['written_by'];
								if($written_by_id==0)
									{
										$written_by=$co_name;
									}
								else
									{
										$query2=mysqli_query($con,"select * from doctor where id='$written_by_id'");
										$res2=mysqli_fetch_array($query2);
										$written_by=$res2['name'];
									}							
			?>
								<!-- Single Blog Card-->
								<div class="col-12 col-md-6">
								  <div class="card blog-card list-card">
									<!-- Post Image-->
									<div class="post-img"><img src="admin/upload/blog/<?=$res['image'];?>" alt=""></div>
									<!-- Read More Button--><a class="btn btn-danger btn-sm read-more-btn" href="blog-detail.php?blog_id=<?=$blog_id;?>" style="background-color:#ED0A0A;border-color:#ED0A0A;">Read More</a>
									<!-- Post Content-->
									<div class="post-content">
									  <div class="bg-shapes">
										<div class="circle1"></div>
										<div class="circle2"></div>
										<div class="circle3"></div>
										<div class="circle4"></div>
									  </div>
									  <!-- Post Catagory--><a class="post-catagory d-block" href="#">Review</a>
									  <!-- Post Title--><a class="post-title d-block two-line" href="blog-detail.php?blog_id=<?=$blog_id;?>"><?=$res['title'];?>...</a>
									  <!-- Post Meta-->
									  <div class="post-meta d-flex align-items-center justify-content-between flex-wrap"><a href="#"><i class="lni lni-user"></i><?=$written_by;?></a><span><i class="lni lni-timer"></i>2 min</span></div>
									</div>
								  </div>
								</div>
								<!-- Single Blog Card-->
			<?php
							}
					}
				else
					{
			?>
						<img src="img/no-post.png" style="width:100%;margin-top:40px;margin-bottom:30px;">
			<?php
					}	
			?>			
            
          </div>
        </div>
        <div class="container">
          <div class="section-heading pt-3">
            <h6>Read by category</h6>
          </div>
          <div class="row g-3">
            <!-- Single Blog Catagory-->
            <div class="col-12 col-sm-12">
				<?php
					$query2=mysqli_query($con,"select distinct category from blog");
					while($res2=mysqli_fetch_array($query2))
						{
							$category=$res2['category'];
							echo "<a href='blogs.php?category=$category' class='category-block'>$category</a>";
						}
				?>
            </div>
            
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