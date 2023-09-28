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
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Profile || <?=$co_name;?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Poppins:wght@500&display=swap" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" href="<?=$co_favicon;?>">
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
		.user-data-card .title
			{
				width:100%;
				max-width:100%;
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
        <div class="back-button"><a onclick="history.back()" style="padding: 6px 10px;border-radius: 50%;    box-shadow: 2px 2px 4px grey;color: black;"><i class="fa fa-angle-left" aria-hidden="true"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Profile</h6>
        </div>
        <!-- Navbar Toggler-->
		<div class="suha-navbar-toggler" >&nbsp;</div>
      </div>
    </div>
    <?php
		include("common/sidebar.php");
		$member_id=$_COOKIE['id'];
		$query=mysqli_query($con,"select * from users where id='$member_id'");
		$res=mysqli_fetch_array($query);
	?>
    <div class="page-content-wrapper">
      <div class="container" style="padding-left:0px;padding-right:0px;">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3" style="padding-top:0px !important;">
          <!-- User Information-->
          <div class="card" style="box-shadow:none;padding-top:20px;background:#FEF1F1;">
            <div class="card-body p-4 d-flex align-items-center" style="padding-top:5px !important;">
				<div class="user-profile me-3">
					<?php
						if(!empty($res['profile']))
							{
					?>
								<img src="images/profile/<?=$res['profile'];?>" style="width:80px;height:80px;object-fit:cover;border-radius: 50%; box-shadow: 1px 1px 2px 1px lightgrey;" alt="">
					<?php
							}
						else
							{
								echo "<img src='img/icons/user-icon.png' alt='' style='width:80px;height:80px;object-fit:cover;border-radius: 50%;box-shadow: 1px 1px 2px 1px lightgrey;'>";
							}							
					?>			
				</div>
				<div class="user-info">
					<h5 class="mb-0" style="color:black;font-size:16px;"><?=$res['name'];?></h5>
					<p class="mb-0" style="color:black;font-size:11px;"><?=$res['user_id'];?></p>
					<p style="margin-bottom:0px;letter-spacing:1px;font-size:12px;"><i class="fa fa-phone-square" aria-hidden="true" style="color:#ED0A0A;"></i>&nbsp;<?=$res['mobile'];?></p>
					<p style="letter-spacing:1px;margin-bottom:0px;font-size:12px;"><i class="fa fa-envelope" aria-hidden="true" style="color:#ED0A0A;"></i>&nbsp;<?=$res['email'];?></p>
					<a href="edit-profile.php" style="position:absolute;right:15px;top:10px;"><i class="fa fa-pencil-square-o" style="color:#ED0A0A;" aria-hidden="true"></i></a>
				</div>
            </div>
		  </div>
		  <hr style="margin-top:0px;margin-bottom:0px;">
          <!-- User Meta Data-->
          <div class="card user-data-card" style="box-shadow:none">
            <div class="card-body">
              <div class="single-profile-data ">
                <a href="security.php"><div class="title d-flex align-items-center" style="letter-spacing:1px;font-size:16px;"><i class="fa fa-lock" style="background:#ED0A0A;" aria-hidden="true"></i><span>Security</span></div></a>
              </div>
              <div class="single-profile-data ">
                <a href="my-orders.php"><div class="title d-flex align-items-center" style="letter-spacing:1px;font-size:16px;"><i class="fa fa-university" style="background:#ED0A0A;" aria-hidden="true"></i><span>Saved Bank Accounts</span></div></a>
              </div>
			  <div class="single-profile-data ">
                <a href="speciality.php"><div class="title d-flex align-items-center" style="letter-spacing:1px;font-size:16px;"><i class="fa fa-bullhorn" style="background:#ED0A0A;" aria-hidden="true"></i><span>Refer & Earn Record</span></div></a>
              </div>
			  <!-- Edit Profile-->
            </div>
          </div>
		  <hr style="margin-top:0px;margin-bottom:0px;">
		  <div class="card user-data-card" style="box-shadow:none">
            <div class="card-body">
              <div class="single-profile-data ">
                <a href="logout.php"><div class="title d-flex align-items-center" style="letter-spacing:1px;font-size:16px;"><i class="fa fa-power-off" style="background-color:tomato" aria-hidden="true"></i><span>Logout</span></div></a>
              </div>
              <!-- Edit Profile-->
              
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