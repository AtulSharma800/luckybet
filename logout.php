<?php
	session_start();
	date_default_timezone_set("Asia/Kolkata");
	ob_start();
	setcookie("name", "", time()-3600,"/");
	setcookie("id", "", time()-3600,"/");
	setcookie("user_id", "", time()-3600,"/");
	setcookie("mobile", "", time()-3600,"/");
	setcookie("email", "", time()-3600,"/");
	echo "<script>window.location.href='login.php';</script>";
?>