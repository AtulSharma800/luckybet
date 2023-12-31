<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
								<a href="#"><img src="<?=$profile_icon;?>" width="38" height="38" class="rounded-circle" alt=""></a>
							</div>

							<div class="media-body">
								<div class="media-title font-weight-semibold"><?=$_SESSION['name'];?></div>
								<div class="font-size-xs opacity-50">
									<i class="icon-pin font-size-sm"></i> &nbsp;<?=$city;?>
								</div>
							</div>

							<div class="ml-3 align-self-center">
								<a href="#" class="text-white"><i class="icon-cog3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">
						<li class="nav-item">
							<a href="index.php" class="nav-link active">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Projects</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="fa fa-building"></i> <span>Projects</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="project-add.php" class="nav-link">Add New</a></li>
								<li class="nav-item"><a href="project-all.php" class="nav-link active">All</a></li>
								<li class="nav-item"><a href="project-ongoing.php" class="nav-link">On-Going</a></li>
								<li class="nav-item"><a href="project-delivered.php" class="nav-link">Delivered</a></li>
								<li class="nav-item"><a href="project-upcoming.php" class="nav-link">Upcoming</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="city.php" class="nav-link"><i class="fa fa-building"></i> <span>City</span></a>
						</li>
						<li class="nav-item">
							<a href="team.php" class="nav-link"><i class="fa fa-user"></i> <span>Team</span></a>
						</li>
						<li class="nav-item">
							<a href="testimonial.php" class="nav-link"><i class="fa fa-comment"></i> <span>Testimonial</span></a>
						</li>
						<li class="nav-item">
							<a href="blog.php" class="nav-link"><i class="fa fa-book"></i> <span>News & Article</span></a>
						</li>
						<li class="nav-item">
							<a href="enquiry.php" class="nav-link"><i class="fa fa-comment"></i> <span>Enquiry</span></a>
						</li>
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>