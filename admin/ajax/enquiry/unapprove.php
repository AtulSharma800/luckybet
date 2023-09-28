<?php
	include("../../../db.php");
	$id=$_GET['id'];
	$query=mysqli_query($con,"update tour_enquiry set status='Unapproved' where id='$id'");
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