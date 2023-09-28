<?php
	include("../db.php");
	ob_start();
	$error="";
	
	$user_id=$_COOKIE['id'];
	$withdrawal_method=$_POST['withdrawal_method'];
	$amount=$_POST['withdrawal_amount'];
	$bank_name=$_POST['bank_name'];
	$ifsc_code=$_POST['ifsc_code'];
	$account_name=$_POST['account_name'];
	$account_no=$_POST['account_no'];
	$upi_id=$_POST['upi_id'];
	
	$status="Pending";
	$remark="";
	$created_at=date("Y-m-d H:i:s");
	$modified_at=date("Y-m-d H:i:s");
	$date=date("Y-m-d");
	$date_time=date("Y-m-d H:i:s");
	
	$available_balance=get_available_amount($user_id,$con);
	if($available_balance>=$amount)
	    {
        	$query=mysqli_query($con,"insert into add_withdrawal(user_id,withdrawal_method,amount,bank_name,ifsc_code,account_name,account_no,upi_id,transaction_id,screen_shot,status,remark,created_at,modified_at) values('$user_id','$withdrawal_method','$amount','$bank_name','$ifsc_code','$account_name','$account_no','$upi_id','$transaction_id','$screen_shot','$status','$remark','$created_at','$modified_at')");
        	$res=mysqli_affected_rows($con);
        	if($res>0)
        		{
        			$last_id=mysqli_insert_id($con);
        			
        			$query=mysqli_query($con,"insert into transactions(money_id,transaction_type,game_type,user_id,game_id,amount,status,play_date,date_and_time,txn_id,remark) values('$last_id','Withdrawal','','$user_id','','$amount','Pending','$date','$date_time','','')");
        			
        			$response['status']="Success";
        			$response['message']="<span style='font-size:15px;'><i class='fa fa-check-circle' aria-hidden='true'></i>&nbsp;&nbsp;Withdrawal request sent successfully. Wait for approval.</span>";
        			$response['error']=$error;
        		}
        	else
        		{	
        			$response['status']="Fail";
        			$response['message']="<span style='font-size:15px;'><i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;Some problem occured try again.</span>";
        			$response['error']=$error;
        		}
	    }
	else
	    {
	        $response['status']="Fail";
			$response['message']="<span style='font-size:15px;'><i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;Don't have enough balance.</span>";
			$response['error']=$error;
	    }
	
	echo json_encode($response);	
?>