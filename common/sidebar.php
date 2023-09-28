<style>
	.powered
		{
			position:fixed;
			bottom:10px;
			width:100%;
			text-align:left;
			left:35px;
		}
</style>
<div class="offcanvas offcanvas-start suha-offcanvas-wrap" tabindex="-1" id="suhaOffcanvas" aria-labelledby="suhaOffcanvasLabel" style="background:white;background-image:url('img/pattern1.png'),url('img/pattern2.png');background-position:left top, right bottom;background-repeat: no-repeat, no-repeat;background-size:contain,contain;">
      <!-- Close button-->
      <button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      <!-- Offcanvas body-->
      <div class="offcanvas-body">
        <!-- Sidenav Profile-->
		<?php
			$query=mysqli_query($con,"select * from users where id='".$_COOKIE['id']."'");
			$res=mysqli_fetch_array($query);
			if(!empty($res['profile']))
				{
					$image="images/profile/".$res['profile'];
				}
			else
				{
					$image="img/icons/user-icon.png";
				}				
		?>
        <div class="sidenav-profile">
          <div class="user-profile"><img src="<?=$image;?>" alt=""></div>
          <div class="user-info">
            <h6 class="user-name mb-1" style="color:black;"><?=$_COOKIE['name'];?></h6>
            <p class="available-balance" style="color:black;"><?=$_COOKIE['user_id'];?></p>
          </div>
        </div>
        <!-- Sidenav Nav-->
        <ul class="sidenav-nav ps-0">
          <li><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
          <li><a href="profile.php"><i class="lni lni-user"></i>My Profile</a></li>
          <li><a href="#"><i class="lni lni-alarm lni-tada-effect"></i>Notifications<span class="ms-3 badge badge-warning">3</span></a></li>
          <li class="suha-dropdown-menu"><a href="category.php"><i class="lni lni-cart"></i>Shop</a></li>
          <li><a href="speciality.php"><i class="lni lni-empty-file"></i>Consult From Home</a></li>
          <li><a href="symptoms.php"><i class="lni lni-cog"></i>Report your symptoms</a></li>
          <li><a href="my-appointments.php"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>My Appointments</a></li>
          <li><a href="logout.php"><i class="lni lni-power-switch"></i>Sign Out</a></li>
        </ul>
      </div>
	  <p class="powered">Powered By <span style='color:#ED0A0A;font-weight:bold;'>Mudra</span> <span style='color:#005DA7;font-weight:bold;'>Swasthya Seva</span></p>
    </div>
	