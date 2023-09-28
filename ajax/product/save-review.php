<?php
	include("../../db.php");
	ob_start();
	$error="";
	mysqli_set_charset( $con, 'utf8');
	
	$date=date("Y-m-d");
	$status="Disable";
	$product_id=$_GET['product_id'];
	$user_id=$_COOKIE['id'];
	$rating=$_POST['star'];
	$comment=$_POST['comment'];
	
	$query=mysqli_query($con,"insert into product_reviews(product_id,user_id,rating,review,status,date_added) values('$product_id','$user_id','$rating','$comment','$status','$date')");
	$res=mysqli_affected_rows($con);
	if($res)
		{
			$response['status']="Success";
			$response['message']="<span style='font-size:15px;'><i class='fa fa-check-circle' aria-hidden='true'></i>&nbsp;&nbsp;Review added successfully.</span>";
			$response['error']=$error;
		}
	else 
		{
			$response['status']="Fail";
			$response['message']="<span style='font-size:15px;'><i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;Some problem occured. Try again</span>";
			$response['error']=$error;
		}
	echo json_encode($response);					
?>