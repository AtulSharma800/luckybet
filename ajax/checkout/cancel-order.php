<?php
	include("../../db.php");
	ob_start();
	$error="";
	$user_id=$_COOKIE['id'];
	$order_id=$_GET['order_id'];
	$order_status='Cancelled';
	
	$query=mysqli_query($con,"update orders set order_status='$order_status' where id='$order_id'");
	$res=mysqli_affected_rows($con);
	if($res)
		{
			$response['order_id']=$order_id;
			$response['status']="Success";
			$response['order_status']="Cancelled";
			$response['message']="<span style='font-size:15px;'><i class='fa fa-check-circle' aria-hidden='true'></i>&nbsp;&nbsp;Order cancelled successfully.</span>";
			$response['error']=$error;
		}
	else
		{	
			$response['order_id']="";
			$response['status']="Fail";
			$response['order_status']="Cancelled";
			$response['message']="<span style='font-size:15px;'><i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;Some problem occured try again.</span>";
			$response['error']=$error;
		}
	echo json_encode($response);	
?>