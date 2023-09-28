	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand" style="padding-top:5px;padding-bottom:5px;">
			<a href="index.php" class="d-inline-block" style="font-size:18px;margin-top:6px;color:white;text-shadow:1px 1px 1px black;">
				<?=$website_name;?>
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>

			<span class="badge bg-success ml-md-3 mr-md-auto">Online</span>
			<?php
				$query=mysqli_query($con,"select * from admin where admin_id='".$_SESSION['admin_id']."'");
				$res=mysqli_fetch_array($query);
				$profile_icon=$res['image'];
				$city=$res['city'];
			?>
			<ul class="navbar-nav">
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="<?=$profile_icon;?>" class="rounded-circle mr-2" height="34" alt="">
						<span><?=$_SESSION['name'];?></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
						<div class="dropdown-divider"></div>
						<a href="logout.php" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>