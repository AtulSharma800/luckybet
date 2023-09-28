<style>
	#footer-cart
		{
			position: fixed; 
			bottom: 60px;
			width: 100%;
			z-index: 9990;
			padding:10px;
			display:none;
		}
	#footer-cart p
		{
			color:white; 
			border-radius:5px;
			background:#ED0A0A;
			box-shadow:2px 2px 4px gray;
			width:100%;
			padding:6px 10px;
		}
	#footer-cart p .span1
		{
			display:inline-block;
			width:69%;
		}
	#footer-cart p .span2
		{
			display:inline-block;
			width:29%;
			text-align:right;
		}	
</style>
<?php
    $page=basename($_SERVER['PHP_SELF'],'.php');
?>
<div class="footer-nav-area" id="footerNav">
	<div class="container h-100 px-0">
		<div class="suha-footer-nav h-100">
			<ul class="h-100 d-flex align-items-center justify-content-between ps-0">
				<li class="<?php if($page=='home'){echo 'active';} ?>"><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i>HOME</a></li>
				<li class="<?php if($page=='statement'){echo 'active';} ?>"><a href="statement.php"><i class="fa fa-line-chart" aria-hidden="true"></i>STATEMENT</a></li>
				<li class="<?php if($page=='refer_and_earn'){echo 'active';} ?>"><a href="refer_and_earn.php"><i class="fa fa-users" aria-hidden="true"></i>SHARE</a></li>
				<li class="<?php if($page=='help'){echo 'active';} ?>"><a href="help.php"><img src="img/icons/health-tools-icon.png">HELP</a></li>
				<li class="<?php if($page=='result_and_rules'){echo 'active';} ?>"><a href="result_and_rules.php"><i class="fa fa-headphones" aria-hidden="true"></i>RESULT & RULES</a></li>
				<li class="<?php if($page=='profile'){echo 'active';} ?>"><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i>PROFILE</a></li>
			</ul>
		</div>
	</div>
</div>
	