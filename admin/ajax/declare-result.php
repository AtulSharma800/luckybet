<?php
    error_reporting(1);
	include("../../db.php");
	ob_start();
	$error="";
	$game_play_id=$_GET['game_play_id'];
	$result=$_GET['result'];
	
	$date=date("Y-m-d");
	$date_and_time=date("Y-m-d H:i:s");
	
	mysqli_query($con,"delete from transactions where transaction_type='Win' and game_play_id='$game_play_id'");
	
	$query=mysqli_query($con,"UPDATE `game_play` set `result`='$result',`result_date`='$date',`result_date_and_time`='$date_and_time' WHERE id='$game_play_id'");
	$res=mysqli_affected_rows($con);
	if($res)
		{
			if(strlen($result)==2)
				{
					$andar=$result[0]."A";
					$bahar=$result[1]."B";
					
					$andar_bahar=$result[0]."AB";
					$andar_bahar2=$result[1]."AB";
					
					$query2=mysqli_query($con,"select * from game_history where game_play_id='$game_play_id' and (number='$result' or number='$andar' or number='$bahar' or number='$andar_bahar' or number='$andar_bahar2') ");
				}
			else
				{
					$query2=mysqli_query($con,"select * from game_history where game_play_id='$game_play_id' and number='$result' ");
				}						
			
			
			while($res2=mysqli_fetch_array($query2))
				{
				    $game_id=$res2['game_id'];
				    $game_play_id=$res2['game_play_id'];
					$user_id=$res2['user_id'];
					$amount=$res2['amount'];
					$number=$res2['number'];
					
					if(strpos($number, 'AB')!==FALSE) 
						{
						    if($result[0]==$result[1])
						        {
							        $winning_amount=$amount*9.5;
						        }
						    else
						        {
						            $winning_amount=$amount*4.75;
						        }
						}
					
					else if(strpos($number, 'A')!==FALSE) 
						{
							$winning_amount=$amount*9.5;
						}
					else if(strpos($number, 'B')!==FALSE) 
						{
							$winning_amount=$amount*9.5;
						}	
					else
						{
							$winning_amount=$amount*95;
						}
					$query=mysqli_query($con,"insert into transactions(money_id,transaction_type,game_type,user_id,game_id,game_play_id,amount,status,play_date,date_and_time,txn_id,remark) values('0','Win','','$user_id','$game_id','$game_play_id','$winning_amount','Approved','$date','$date_and_time','','')");
				}
			$response['status']="Success";
			$response['message']="<span style='font-size:15px;'><i class='fa fa-check-circle' aria-hidden='true'></i>&nbsp;&nbsp;Result updated successfully.</span>";
			$response['error']=$error;
		}
	
	echo json_encode($response);	
?>