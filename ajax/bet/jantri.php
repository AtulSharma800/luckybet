<?php
	include("../../db.php");
	
	$error="";
	$user_id=$_COOKIE['id'];
	
	$game_id=$_POST['j_game_id'];
	if(!empty($game_id))
	    {
        	$date=date("Y-m-d");
        	$query=mysqli_query($con,"select * from games where id='$game_id'");
        	$res=mysqli_fetch_array($query);
			$id=$res['id'];
			$name=$res['name'];
			$a=date_create_from_format("H:i",$res['start_time']);
			$start_time=date_format($a,"h:i a");
			$a=date_create_from_format("H:i",$res['end_time']);
			$end_time=date_format($a,"h:i a");
			
			$query2=mysqli_query($con,"select * from game_play where game_id='$id' order by id desc limit 1");
			$res2=mysqli_fetch_array($query2);
			if($id==11)
			    {
			        $stop_date = date('Y-m-d', strtotime($res2['date'] . ' +1 day'));
			    }
			else
			    {
			        $stop_date = $res2['date'];
			    }
	        $t=$stop_date." ".$res['end_time'];
	        $tstamp=strtotime($t);
			
			$cstamp=strtotime(date("Y-m-d H:i"));
			$disabled="";
			if($tstamp<$cstamp)
			    {
			        $response['status']="Fail";
        			$response['message']="<span style='font-size:15px;'><i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;Game has ended.</span>";
        			$response['error']=$error;
			    }
			else
			    {
                	$jantri_amount=@$_POST['jantri_amount'];
                	$jantri_amount_a=@$_POST['jantri_amount_a'];
                	$jantri_amount_b=@$_POST['jantri_amount_b'];
                	
                	$total_amount1=0;
                	$total_amount2=0;
                	$total_amount3=0;
                	if(!empty($jantri_amount))
                		{
                			$total_amount1 = array_sum($jantri_amount);
                		}
                	if(!empty($jantri_amount_a))
                		{
                			$total_amount2 = array_sum($jantri_amount_a);
                		}
                	if(!empty($jantri_amount_b))
                		{
                			$total_amount3 = array_sum($jantri_amount_b);
                		}	
                	$total_amount = $total_amount1 + $total_amount2 + $total_amount3;
                	
                	$query=mysqli_query($con,"select * from game_play where game_id='$game_id' order by id desc limit 1");
                	$res=mysqli_fetch_array($query);
                	$game_play_id=$res['id'];
                	
                	$available_balance=get_available_amount($user_id,$con);
                	if($available_balance>=$total_amount)
                		{
                			$transaction_type='Play';
                			$game_type="Jantri";
                			$status="Approved";
                			$date=date("Y-m-d");
                			$date_time=date("Y-m-d H:i:s");
                			$txn_id="";
                			$remark="";
                			
                			$query=mysqli_query($con,"insert into transactions(transaction_type,game_type,user_id,game_id,game_play_id,amount,status,play_date,date_and_time,txn_id,remark) values('$transaction_type','$game_type','$user_id','$game_id','$game_play_id','$total_amount','$status','$date','$date_time','$txn_id','$remark')");
                			$res=mysqli_affected_rows($con);
                			if($res)
                				{
                					$transaction_id=mysqli_insert_id($con);
                					for($i=0;$i<100;$i++)
                						{
                							if($i==99)
                								{
                									$number=0;
                								}
                							else
                								{								
                									$number=$i+1;	
                								}
                							$amount=$jantri_amount[$i];
                							$num_padded = sprintf("%02d", $number);
                							if($amount>0)
                								{								
                									mysqli_query($con,"INSERT INTO `game_history`(`game_play_id`, `game_id`, `transaction_id`, `user_id`, `game_type`, `amount`, `number`, `date_and_time`) VALUES ('$game_play_id','$game_id','$transaction_id','$user_id','Jantri','$amount','$num_padded','$date_time')");		
                								}
                						}
                						
                					for($i=0;$i<10;$i++)
                						{
                							if($i==9)
                								{
                									$number="0A";
                								}
                							else
                								{			
                									$j=$i+1;
                									$number="$j"."A";	
                								}
                							$amount=$jantri_amount_a[$i];	
                							if($amount>0)
                								{
                									mysqli_query($con,"INSERT INTO `game_history`(`game_play_id`, `game_id`, `transaction_id`, `user_id`, `game_type`, `amount`, `number`, `date_and_time`) VALUES ('$game_play_id','$game_id','$transaction_id','$user_id','Andar/A','$amount','$number','$date_time')");
                								}									
                						}
                					
                					for($i=0;$i<10;$i++)
                						{
                							if($i==9)
                								{
                									$number="0B";
                								}
                							else
                								{			
                									$j=$i+1;
                									$number="$j"."B";	
                								}
                							$amount=$jantri_amount_b[$i];	
                							if($amount>0)
                								{
                									mysqli_query($con,"INSERT INTO `game_history`(`game_play_id`, `game_id`, `transaction_id`, `user_id`, `game_type`, `amount`, `number`, `date_and_time`) VALUES ('$game_play_id','$game_id','$transaction_id','$user_id','Bahar/B','$amount','$number','$date_time')");
                								}									
                						}	
                						
                					$response['status']="Success";
                					$response['message']="<span style='font-size:15px;'><i class='fa fa-check-circle' aria-hidden='true'></i>&nbsp;&nbsp;Bet Placed successfully.</span>";
                					$response['error']=$error;
                					$response['transaction_id']=$transaction_id;		
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
                			$response['message']="<span style='font-size:15px;'><i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;You don't have enough balance.</span>";
                			$response['error']=$error;
                		}
			    }
	    }
	else
	    {
	        $response['status']="Fail";
			$response['message']="<span style='font-size:15px;'><i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;Select a game first.</span>";
			$response['error']=$error;
	    }
	echo json_encode($response);	
?>