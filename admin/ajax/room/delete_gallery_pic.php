<?php
	include("../../../db.php");
	$id=$_GET['id'];
	mysqli_query($con,"delete from room_gallery where id='$id'");
?>

