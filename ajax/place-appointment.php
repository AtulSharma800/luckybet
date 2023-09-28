<?php
	include("../db.php");
	ob_start();
	$error="";
	$user_id=$_COOKIE['id'];
	$doctor_id=$_POST['doctor_id'];
	$appointment_date=$_POST['appointment_date'];
	$preferred_time=$_POST['preferred_time'];
	$problem=mysqli_real_escape_string($con,$_POST['problem']);
	$status="Pending";
	$created_at=date("Y-m-d H:i:s");
	$modified_at=date("Y-m-d H:i:s");
	
	
	$query=mysqli_query($con,"insert into appointment(doctor_id,user_id,appointment_date,time_slot,problem,status,created_at,modified_at) values('$doctor_id','$user_id','$appointment_date','$preferred_time','$problem','$status','$created_at','$modified_at')");
	$res=mysqli_affected_rows($con);
	if($res>0)
		{
			$last_id=mysqli_insert_id($con);
			$response['appointment_id']=$last_id;
			$response['status']="Success";
			$response['message']="<span style='font-size:15px;'><i class='fa fa-check-circle' aria-hidden='true'></i>&nbsp;&nbsp;Appointment placed successfully.</span>";
			$response['error']=$error;
		}
	else
		{	
			$response['appointment_id']="";
			$response['status']="Fail";
			$response['message']="<span style='font-size:15px;'><i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;Some problem occured try again.</span>";
			$response['error']=$error;
		}
	echo json_encode($response);	
?>