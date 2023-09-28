<?php

	include("../../db.php");

	$error="";

	$date_added=date("Y-m-d h:i a");

	$otp=$_POST['digit1'].$_POST['digit2'].$_POST['digit3'].$_POST['digit4'];
	$mobileNumber = $_SESSION['mobile'];
	$result = $con->query("SELECT mobile,otp FROM users WHERE mobile='$mobileNumber'");
	$row =  $result->fetch_array();

	if($otp==$row['otp'])

		{

			$response['status']="Success";

			$response['message']="<i class='fa fa-check-circle' aria-hidden='true'></i>&nbsp;&nbsp;OTP verified successfully.";

			$response['error']=$error;

		}

	else

		{

			$response['status']="Fail";

			$response['message']="<i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;OTP verification failed.";

			$response['error']=$error;

		}

	echo json_encode($response);

?>