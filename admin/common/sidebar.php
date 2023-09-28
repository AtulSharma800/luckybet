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
						
						<li class="nav-item">
							<a href="games.php" class="nav-link"><i class="fa fa-building"></i> <span>Game</span></a>
						</li>
						
						<li class="nav-item">
							<a href="payment-methods.php" class="nav-link"><i class="fa fa-building"></i> <span>Payment Methods</span></a>
						</li>
						
						<li class="nav-item">
							<a href="fund-request.php" class="nav-link"><i class="fa fa-inr"></i> <span>Fund Requests</span></a>
						</li>
						
						<li class="nav-item">
							<a href="withdrawal-request.php" class="nav-link"><i class="fa fa-inr"></i> <span>Withdrawal Requests</span></a>
						</li>
						
						<li class="nav-item">
							<a href="game-played.php" class="nav-link"><i class="fa fa-inr"></i> <span>Game Played</span></a>
						</li>
						
						<li class="nav-item">
							<a href="bet-on-numbers.php" class="nav-link"><i class="fa fa-inr"></i> <span>Bet On Numbers</span></a>
						</li>
						
						<li class="nav-item">
							<a href="users.php" class="nav-link"><i class="fa fa-building"></i> <span>Users</span></a>
                        </li>
                        
                        <li class="nav-item">
							<a href="settings.php" class="nav-link"><i class="fa fa-building"></i> <span>Settings</span></a>
                        </li>
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>