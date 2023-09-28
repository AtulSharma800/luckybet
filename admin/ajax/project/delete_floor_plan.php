<?php
	include("../../../db.php");
	$id=$_GET['id'];
	mysqli_query($con,"delete from project_floor_plan where id='$id'");
?>

