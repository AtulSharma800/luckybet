<?php
	include("../../db.php");
	ob_start();
	$error="";
	$withdrawal_id=$_GET['withdrawal_id'];
	$query=mysqli_query($con,"select * from add_withdrawal where id='$withdrawal_id'");
	$res=mysqli_fetch_array($query);
	//Main Image Upload	
	$response['name']=$res['name'];
	$response['txn_id']=$res['transaction_id'];
	if(!empty($res['screen_shot']))
		{
			$response['screen_shot']="upload/screen_shot/".$res['screen_shot'];
		}
	else
		{
			$response['screen_shot']="";
		}		
	$response['status']=$res['status'];
	$response['remark']=$res['remark'];
	
	echo json_encode($response);	
?>