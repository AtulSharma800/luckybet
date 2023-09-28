<?php
	include("../../db.php");
	ob_start();
	$error="";
	$name=strtoupper(mysqli_real_escape_string($con,$_POST['name']));
	$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$user_id=$_COOKIE['id'];
	
	$query=mysqli_query($con,"update users set name='$name',email='$email' where id='$user_id'");
	$res=mysqli_affected_rows($con);
	if($res)
		{
			$response['status']="Success";
			$response['message']="<i class='fa fa-check-circle' aria-hidden='true'></i>&nbsp;&nbsp;Profile updated successfully.";
			$response['error']=$error;
				
		}
	else
		{	
			$response['status']="Fail";
			$response['message']="<i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;Wrong login credential.";
			$response['error']=$error;
		}
	echo json_encode($response);	
?>