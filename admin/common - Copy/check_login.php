<?php
	if(!isset($_SESSION['admin_id']))
		{
			echo "<script>window.location.href='login.php';</script>";
		}
?>