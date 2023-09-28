<?php
	include("../../db.php");
	
	$error="";
	$user_id=$_COOKIE['id'];
	
	$game_id=$_POST['op_game_id'];
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
                	$op_game_number=@$_POST['op_game_number'];
                	$op_game_amount=@$_POST['op_game_amount'];
                	
                	$oph_game_number=@$_POST['oph_game_number'];
                	$oph_game_amount=@$_POST['oph_game_amount'];
                	
                	$andar=@$_POST['andar'];
                	$bahar=@$_POST['bahar'];
                	
                	$total_amount1=0;
                	$total_amount2=0;
                	if(isset($_POST['op_game_amount']))
                		{
                			$total_amount1 = array_sum($op_game_amount);
                		}
                	if(isset($_POST['oph_game_amount']))
                		{		
                			$total_amount2 = array_sum($oph_game_amount);
                		}
                	$total_amount = $total_amount1 + $total_amount2;
                	
                	$query=mysqli_query($con,"select * from game_play where game_id='$game_id' order by id desc limit 1");
                	$res=mysqli_fetch_array($query);
                	$game_play_id=$res['id'];
                	
                	$available_balance=get_available_amount($user_id,$con);
                	if($available_balance>=$total_amount)
                		{
                			$transaction_type='Play';
                			$game_type="Open Play";
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
                					$i=0;
                					foreach($op_game_number as $number)
                						{
                							$amount=$op_game_amount[$i];
                							mysqli_query($con,"INSERT INTO `game_history`(`game_play_id`, `game_id`, `transaction_id`, `user_id`, `game_type`, `amount`, `number`, `date_and_time`) VALUES ('$game_play_id','$game_id','$transaction_id','$user_id','Open Play','$amount','$number','$date_time')");		
                							$i++;
                						}
                						
                					$i=0;
                					foreach($oph_game_number as $number)
                						{
                							$amount=$oph_game_amount[$i];
                							
                							if(($andar==1) && ($bahar==1))
                							    {
                							        $number=$number."AB";
                							    }
                                            else if($andar==1)
                							    {
                							        $number=$number."A";
                							    }
                							else if($bahar==1)
                							    {
                							        $number=$number."B";
                							    }    
                							
                							if(strpos('AB', $number) !== false)
                								{
                									$game_type='Andar-Bahar/AB';
                								}
                							else if(strpos('A', $number) !== false)
                								{
                									$game_type='Andar/A';
                								}	
                							else if(strpos('B', $number) !== false)
                								{
                									$game_type='Bahar/B';
                								}
                							
                							mysqli_query($con,"INSERT INTO `game_history`(`game_play_id`, `game_id`, `transaction_id`, `user_id`, `game_type`, `amount`, `number`, `date_and_time`) VALUES ('$game_play_id','$game_id','$transaction_id','$user_id','$game_type','$amount','$number','$date_time')");		
                							$i++;
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