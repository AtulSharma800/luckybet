<?php
	if(!(isset($_COOKIE['id'])) || (empty($_COOKIE['id'])))
		{
			echo "<script>window.location.href='login.php';</script>";
			exit();
		}
?>