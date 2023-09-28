<?php
	include("../../db.php");
	$plan_id=$_GET['plan_id'];
	$query=mysqli_query($con,"select * from health_package_detail where id='$plan_id'");
	$res=mysqli_fetch_array($query);
	if(!empty($res['offer_price']))
		{
			echo $res['offer_price'];
		}
	else
		{
			echo $res['price'];
		}		
?>

