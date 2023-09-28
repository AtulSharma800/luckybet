<?php
	include("../db.php");
	include("../send-mail.php");
	ob_start();
    require '../admin/vendor/autoload.php';

	$error="";
	if(!empty($_FILES['cash_screen_shot']['name']) || (!empty($_POST['cash_txn_id'])))
		{
			$user_id=$_COOKIE['id'];
			$payment_method=$_POST['payment_method_name'];
			$amount=$_POST['cash_amount'];
			$name=$_POST['cash_name'];
			$transaction_id=$_POST['cash_txn_id'];
			$screen_shot="";
			$status="Pending";
			$remark="";
			$created_at=date("Y-m-d H:i:s");
			$modified_at=date("Y-m-d H:i:s");
			$date=date("Y-m-d");
			$date_time=date("Y-m-d H:i:s");
			
			//Main Image Upload	
			if(!empty($_FILES['cash_screen_shot']['name']))
				{
					$a=explode(".",$_FILES['cash_screen_shot']['name']);
					$extension=$a[1];
					$screen_shot="screen-shot".time().".".$extension;
					move_uploaded_file($_FILES['cash_screen_shot']['tmp_name'],"../admin/upload/screen_shot/$screen_shot");
				}
			
			$query=mysqli_query($con,"insert into add_money(user_id,payment_method,amount,name,transaction_id,screen_shot,status,remark,created_at,modified_at) values('$user_id','$payment_method','$amount','$name','$transaction_id','$screen_shot','$status','$remark','$created_at','$modified_at')");
			$res=mysqli_affected_rows($con);
			if($res>0)
				{
					$last_id=mysqli_insert_id($con);
					
					$query=mysqli_query($con,"insert into transactions(money_id,transaction_type,game_type,user_id,game_id,amount,status,play_date,date_and_time,txn_id,remark) values('$last_id','Fund','','$user_id','','$amount','Pending','$date','$date_time','$transaction_id','')");
					
					$response['status']="Success";
					$response['message']="<span style='font-size:15px;'><i class='fa fa-check-circle' aria-hidden='true'></i>&nbsp;&nbsp;Amount added successfully. Wait for approval.</span>";
					$response['error']=$error;
					
					$options = array(
                    'cluster' => 'ap2',
                    'useTLS' => true
                  );
                  $pusher = new Pusher\Pusher(
                    'b8ccdc91feaf55b821de',
                    '18f2ee0bb303223baf95',
                    '1612703',
                    $options
                  );
                
                  $data['message'] = 'hello world';
                  $pusher->trigger('my-channel', 'my-event', $data);
                  send_mail();
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
			$response['message']="<span style='font-size:15px;'><i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;Fill all the required field.</span>";
			$response['error']=$error;
		}		
	echo json_encode($response);	
?>