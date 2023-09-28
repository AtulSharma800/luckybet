<?php

	include("../../db.php");

	include("../../send_sms.php");

	$error="";

	$date_added=date("Y-m-d h:i a");

	$status="Active";

	$mobile=mysqli_real_escape_string($con,$_POST['mobile']);

	$query=mysqli_query($con,"select * from users where mobile='$mobile'");

	$num=mysqli_num_rows($query);

	$otp=rand(1111,9999);

	$_SESSION['otp']=$otp;

	$_SESSION['mobile']=$mobile;

	$updatOtp = "UPDATE users SET otp='$otp' WHERE mobile=$mobile";
	$result = $con->query($updatOtp);

	$message="प्रिय किसान, आपका ओटीपी $otp है . सादर- भारतीय किसान यूनियन (भानु)";

	// $template_id="1207164802922292649";

	// send_sms($message,$mobile,$template_id);

	$response['status']="Success";

	$response['message']="<i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;OTP sent successfully.";

	$response['error']=$error;

	// if($num>0)

	// 	{

	// 		$response['status']="Fail";

	// 		$response['message']="<i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;Mobile no. already exist.";

	// 		$response['error']=$error;

	// 	}

	// else

	// 	{
    //     	$message="प्रिय किसान, आपका ओटीपी $otp है . सादर- भारतीय किसान यूनियन (भानु)";

    //         $template_id="1207164802922292649";

	//         send_sms($message,$mobile,$template_id);

	// 		$response['status']="Success";

	// 		$response['message']="<i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;OTP sent successfully.";

	// 		$response['error']=$error;

	// 	}

	echo json_encode($response);

?>