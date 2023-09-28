<?php
	include("../../db.php");
	$id=$_GET['id'];
	mysqli_query($con,"delete from about_us_gallery where id='$id'");
?>

