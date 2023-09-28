<?php
	include("../../db.php");
	ob_start();
	$error="";
	$mobile=strtoupper(mysqli_real_escape_string($con,$_POST['mobile']));
	$password=mysqli_real_escape_string($con,$_POST['password']);
	
	$query=mysqli_query($con,"select * from users where mobile='$mobile' and password='$password'");
	$num=mysqli_num_rows($query);
	if($num>0)
		{
			$res=mysqli_fetch_array($query);
			setcookie("name", $res['name'], time() + (86400 * 30), "/");
			setcookie("id", $res['id'], time() + (86400 * 30), "/");
			setcookie("user_id", $res['user_id'], time() + (86400 * 30), "/");
			setcookie("mobile", $res['mobile'], time() + (86400 * 30), "/");
			setcookie("email", $res['email'], time() + (86400 * 30), "/");
			$response['status']="Success";
			$response['message']="<i class='fa fa-check-circle' aria-hidden='true'></i>&nbsp;&nbsp;You are loggedIn successfully.";
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