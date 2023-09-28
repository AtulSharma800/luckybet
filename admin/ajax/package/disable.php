<?php
	include("../../../db.php");
	$id=$_GET['id'];
	$query=mysqli_query($con,"update package set status='Disabled' where id='$id'");
	$res=mysqli_affected_rows($con);
	if($res)
		{
			echo "Success";
		}
	else
		{
			echo "Failure";
		}	
?>