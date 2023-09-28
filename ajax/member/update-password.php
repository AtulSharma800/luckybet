<?php
	include("../../db.php");
	ob_start();
	$error="";
	$password=strtoupper(mysqli_real_escape_string($con,$_POST['password']));
	$user_id=$_COOKIE['id'];
	
	$query=mysqli_query($con,"update users set password='$password' where id='$user_id'");
	$res=mysqli_affected_rows($con);
	if($res)
		{
			$response['status']="Success";
			$response['message']="<i class='fa fa-check-circle' aria-hidden='true'></i>&nbsp;&nbsp;Password updated successfully.";
			$response['error']=$error;
				
		}
	else
		{	
			$response['status']="Fail";
			$response['message']="<i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;Some proble occured.";
			$response['error']=$error;
		}
	echo json_encode($response);	
?>