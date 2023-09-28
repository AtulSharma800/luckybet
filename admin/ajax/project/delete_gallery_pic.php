<?php
	include("../../../db.php");
	$id=$_GET['id'];
	mysqli_query($con,"delete from project_gallery where id='$id'");
?>

