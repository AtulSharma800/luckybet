<?php
	include("../db.php");
	include("../common-details.php");
	$count = $_SESSION['home_count'];
	$_SESSION['home_count']=$count+15;
	$user_id=$_COOKIE['id'];		
	$div="";
	$error="";
	$current_date=date("Y-m-d");
	$query=mysqli_query($con,"select * from transactions where user_id='$user_id' order by id desc limit $count,15");
	$num=mysqli_num_rows($query);
	if($num>0)
		{
			while($res=mysqli_fetch_array($query))
				{
					$id=$res['id'];
					$transaction_type=$res['transaction_type'];
					$status=$res['status'];
					$amount=$res['amount'];
					$a=date_create_from_format("Y-m-d H:i:s",$res['date_and_time']);
					$date_and_time=date_format($a,"d F Y, h:i a");
					
					if($transaction_type=='Fund')
						{
							if($status=='Pending')
								{
									$title="<span style='color:orange'>Add Money Pending</span>";
									$amount_text="<span style='color:orange'>₹ ".number_format($amount,2)."</span>";
								}
							else if($status=='Approved')
								{
									$title="<span style='color:green'>Add Money Successfull</span>";
									$amount_text="<span style='color:green'>+ ₹ ".number_format($amount,2)."</span>";
								}
							else if($status=='Rejected')
								{
									$title="<span style='color:tomato'>Add Money Failed</span>";
									$amount_text="<span style='color:tomato'> ₹ ".number_format($amount,2)."</span>";
								}	
						}
					else if($transaction_type=='Play')
						{
							$game_id=$res['game_id'];
							$query2=mysqli_query($con,"select * from games where id='$game_id'");
							$res2=mysqli_fetch_array($query2);
							$game_name=@$res2['name'];
							$title="<span style='color:tomato'>$game_name Play</span>";
							$amount_text="<span style='color:tomato'>- ₹ ".number_format($amount,2)."</span>";
						}
					else if($transaction_type=='Win')
						{
							$game_id=$res['game_id'];
							$query2=mysqli_query($con,"select * from games where id='$game_id'");
							$res2=mysqli_fetch_array($query2);
							$game_name=$res2['name'];
							$title="<span style='color:green'>$game_name Win</span>";
							$amount_text="<span style='color:green'>+ ₹ ".number_format($amount,2)."</span>";
						}
					else if($transaction_type=='Withdrawal')
						{
							if($status=='Pending')
								{
									$title="<span style='color:orange'>Withdrawal Pending</span>";
									$amount_text="<span style='color:orange'>₹ ".number_format($amount,2)."</span>";
								}
							else if($status=='Approved')
								{
									$title="<span style='color:green'>Withdrawal Successfull</span>";
									$amount_text="<span style='color:green'>- ₹ ".number_format($amount,2)."</span>";
								}
							else if($status=='Rejected')
								{
									$title="<span style='color:tomato'>Withdrawal Failed</span>";
									$amount_text="<span style='color:tomato'>₹ ".number_format($amount,2)."</span>";
								}	
						}
					$closing_balance=get_closing_amount($user_id,$id,$con);
					$div.="<div class='form-group' style='position:relative;background: white;padding: 5px 10px;border-radius: 10px;font-size:11px;margin-bottom:10px;'><span style='display:inline-block;width:5%;vertical-align:top;'><i class='fa fa-times-circle' aria-hidden='true' style='color:#ED0A0A;font-size:16px;'></i></span><span style='display:inline-block;width:54%;vertical-align:top;'><span style='color:black'>$title</span></br><span>$date_and_time</span></span><span style='display:inline-block;width:39%;text-align:right;'><span style='color:#ED0A0A;'>$amount_text</span></br><span>Closing Balance : ₹ $closing_balance</span></br><span class='view-detail-btn' onclick='view_detail($id)'>View Detail</span></span></div>";
					
				}
			$response['status']="Success";
			$response['message']=$div;
			$response['error']=$error;
			$response['count']=$count;
		}
	else
		{
			$response['status']="Error";
			$response['message']="";
			$response['error']=$error;
			$response['count']=$count;
		}
	
	echo json_encode($response);
?>
