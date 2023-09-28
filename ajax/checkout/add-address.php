<?php
	include("../../db.php");
	ob_start();
	$error="";
	$address=mysqli_real_escape_string($con,$_POST['address']);
	$pincode=mysqli_real_escape_string($con,$_POST['pincode']);
	$near_by_location=mysqli_real_escape_string($con,$_POST['near_by_location']);
	$flat_no_house_no=mysqli_real_escape_string($con,$_POST['flat_no_house_no']);
	$contact_person_name=mysqli_real_escape_string($con,$_POST['contact_person_name']);
	$contact_person_number=mysqli_real_escape_string($con,$_POST['contact_person_number']);
	$user_id=$_COOKIE['id'];
	
	$query=mysqli_query($con,"insert into shipping_address(user_id,address,pincode,near_by_location,flat_no_house_no,contact_person_name,contact_person_number) values('$user_id','$address','$pincode','$near_by_location','$flat_no_house_no','$contact_person_name','$contact_person_number')");
	$res=mysqli_affected_rows($con);
	if($res)
		{
			$last_id=mysqli_insert_id($con);
			$response['status']="Success";
			$response['message']="<i class='fa fa-check-circle' aria-hidden='true'></i>&nbsp;&nbsp;New address added successfully.";
			$response['error']=$error;
				
		}
	else
		{	
			$response['status']="Fail";
			$response['message']="<i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;Some problem occured try again.";
			$response['error']=$error;
		}
	echo json_encode($response);	
?>