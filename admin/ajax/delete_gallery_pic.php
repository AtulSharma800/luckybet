<?php
	include("../../db.php");
	$id=$_GET['id'];
	mysqli_query($con,"delete from gallery where id='$id'");
?>

