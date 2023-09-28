<?php
	include("../../db.php");
	ob_start();
	$error="";
	$user_id=$_POST['user_id'];
	$fund_id=$_POST['fund_id'];
	$status=$_POST['status'];
	$remark=$_POST['remark'];
	
	$modified_at=date("Y-m-d H:i:s");
	
	$query=mysqli_query($con,"UPDATE `add_money` set `status`='$status',`remark`='$remark',`modified_at`='$modified_at' WHERE id='$fund_id' and user_id='$user_id'");
	$res=mysqli_affected_rows($con);
	if($res>0)
		{
			$query=mysqli_query($con,"UPDATE `transactions` set `status`='$status',`remark`='$remark' WHERE money_id='$fund_id' and user_id='$user_id' and transaction_type='Fund'");
			
			$response['status']="Success";
			$response['message']="<span style='font-size:15px;'><i class='fa fa-check-circle' aria-hidden='true'></i>&nbsp;&nbsp;Status updated successfully.</span>";
			$response['error']=$error;
		}
	else
		{	
			$response['status']="Fail";
			$response['message']="<span style='font-size:15px;'><i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;Some problem occured try again.</span>";
			$response['error']=$error;
		}
	echo json_encode($response);	
?>