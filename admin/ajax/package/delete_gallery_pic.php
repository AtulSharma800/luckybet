<?php
	include("../../../db.php");
	$id=$_GET['id'];
	mysqli_query($con,"delete from package_gallery where id='$id'");
?>

