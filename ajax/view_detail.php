<?php
	include("../db.php");
	include("../common-details.php");
	$user_id=$_COOKIE['id'];
	$transaction_id=$_GET['id'];
	$query=mysqli_query($con,"select * from transactions where id='$transaction_id'");
	$res=mysqli_fetch_array($query);
	$game_id=$res['game_id'];
	$bidding_amount=$res['amount'];
	$a=date_create_from_format("Y-m-d",$res['play_date']);
	$play_date=date_format($a,"d M Y");
	$transaction_type=$res['transaction_type'];
	$status=$res['status'];
	
	
	$a=date_create_from_format("Y-m-d H:i:s",$res['date_and_time']);
	$date_and_time=date_format($a,"d M Y, h:i a");
	$open_play=$res['game_type'];
	
	if($transaction_type=='Play')
		{
			$query2=mysqli_query($con,"select * from games where id='$game_id'");
			$res2=mysqli_fetch_array($query2);
			$game_name=$res2['name'];
?>
			<div class="row" style="margin:0px;background:white;border-radius:10px;padding-bottom:20px;">
				<p style='padding: 10px 20px;background: black;border-radius: 10px 10px 0px 0px;color: white;'><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Statement Detail <span style='color:tomato;float:right' onclick="close_detail_box()"><i class="fa fa-times-circle" aria-hidden="true"></i></span></p>
				<div class="col-12" style="padding:10px;">
					<div style="box-shadow:2px 2px 8px gray;border-radius: 10px;padding:5px;">
						<p style='padding: 10px 20px;background: #ED0A0A;border-radius: 10px 10px 0px 0px;color: white;text-align:center;'>BET PLACED SUCCESSFULLY </p>
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Game Name</span><?=$game_name;?></p>
						<hr style="margin:5px;">
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Bidding Amount</span><?=$bidding_amount;?></p>
						<hr style="margin:5px;">
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Play Date</span><?=$play_date;?></p>
						<hr style="margin:5px;">
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Date & Time</span><?=$date_and_time;?></p>
						<hr style="margin:5px;">
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Transaction Id</span><?=@$transaction_id2;?></p>
						<p style='text-align:center;'><span style='color:#ED0A0A;font-weight:bold;border-bottom:2px solid #ED0A0A;font-size:16px;'><?=$open_play;?></span></p>
						<p class='number-history-box' style="max-height: 200px;overflow-y: auto;">
							<?php
								$query=mysqli_query($con,"select * from game_history where transaction_id='$transaction_id'");
								while($res=mysqli_fetch_array($query))
									{
										$amount=$res['amount'];
										$number=$res['number'];
										echo "<span class='number-box'>$number = <span style='color:#ED0A0A'>₹$amount</span></span>";
									}
							?>
							
						</p>
					</div>
				</div>
			</div>
<?php
		}
	if($transaction_type=='Win')
		{
			$query2=mysqli_query($con,"select * from games where id='$game_id'");
			$res2=mysqli_fetch_array($query2);
			$game_name=$res2['name'];	
?>
			<div class="row" style="margin:0px;background:white;border-radius:10px;padding-bottom:20px;">
				<p style='padding: 10px 20px;background: black;border-radius: 10px 10px 0px 0px;color: white;'><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Statement Detail <span style='color:tomato;float:right' onclick="close_detail_box()"><i class="fa fa-times-circle" aria-hidden="true"></i></span></p>
				<div class="col-12" style="padding:10px;">
					<div style="box-shadow:2px 2px 8px gray;border-radius: 10px;padding:5px;">
						<p style='padding: 10px 20px;background: #ED0A0A;border-radius: 10px 10px 0px 0px;color: white;text-align:center;'><?=$game_name;?> Win</p>
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Game Name</span><?=$game_name;?></p>
						<hr style="margin:5px;">
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Amount</span><?=$bidding_amount;?></p>
						<hr style="margin:5px;">
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Status</span>CREDIT</p>
						<hr style="margin:5px;">
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Txn Id</span></p>
						<hr style="margin:5px;">
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Play Date</span><?=$play_date;?></p>
						<hr style="margin:5px;">
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Date & Time</span><?=$date_and_time;?></p>
					</div>
				</div>
			</div>
<?php
		}			
	if($transaction_type=='Fund')
		{
			if($status=='Pending')
				{
					$title="Add Money Pending";
				}
			else if($status=='Approved')
				{
					$title="Add Money Successfull";
				}
			else if($status=='Rejected')
				{
					$title="Add Money Failed";
				}
			$money_id=$res['money_id'];
			$query2=mysqli_query($con,"select * from add_money where id='$money_id'");
			$res2=mysqli_fetch_array($query2);
			$deposit_method=$res2['payment_method'];
			$ref_no=$res2['transaction_id'];	
?>
			<div class="row" style="margin:0px;background:white;border-radius:10px;padding-bottom:20px;">
				<p style='padding: 10px 20px;background: black;border-radius: 10px 10px 0px 0px;color: white;'><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Statement Detail <span style='color:tomato;float:right' onclick="close_detail_box()"><i class="fa fa-times-circle" aria-hidden="true"></i></span></p>
				<div class="col-12" style="padding:10px;">
					<div style="box-shadow:2px 2px 8px gray;border-radius: 10px;padding:5px;">
						<p style='padding: 10px 20px;background: #ED0A0A;border-radius: 10px 10px 0px 0px;color: white;text-align:center;'><?=$title;?></p>
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Net Amount</span><?=$bidding_amount;?></p>
						<hr style="margin:5px;">
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Date & Time</span><?=$date_and_time;?></p>
						<hr style="margin:5px;">
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Deposit Method</span><?=$deposit_method;?></p>
						<hr style="margin:5px;">
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Txn Id</span></p>
						<hr style="margin:5px;">
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Ref No</span><?=$ref_no;?></p>
					</div>
				</div>
			</div>
<?php
		}			
    if($transaction_type=='Withdrawal')
		{
			if($status=='Pending')
				{
					$title="Withdrawal Pending";
				}
			else if($status=='Approved')
				{
					$title="Withdrawal Successfull";
				}
			else if($status=='Rejected')
				{
					$title="Withdrawal Failed";
				}
			$money_id=$res['money_id'];
			$query2=mysqli_query($con,"select * from add_withdrawal where id='$money_id'");
			$res2=mysqli_fetch_array($query2);
			$deposit_method=$res2['withdrawal_method'];
			$ref_no=$res2['transaction_id'];
			$detail="";
			if($res2['withdrawal_method']=='bank')
				{
					$detail.=$res2['bank_name']."</br>";
					$detail.=$res2['ifsc_code']."</br>";
					$detail.=$res2['account_no']."</br>";
					$detail.=$res2['account_name']."</br>";
				}
			else
				{
					$detail=$res2['upi_id'];
				}
?>
			<div class="row" style="margin:0px;background:white;border-radius:10px;padding-bottom:20px;">
				<p style='padding: 10px 20px;background: black;border-radius: 10px 10px 0px 0px;color: white;'><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Statement Detail <span style='color:tomato;float:right' onclick="close_detail_box()"><i class="fa fa-times-circle" aria-hidden="true"></i></span></p>
				<div class="col-12" style="padding:10px;">
					<div style="box-shadow:2px 2px 8px gray;border-radius: 10px;padding:5px;">
						<p style='padding: 10px 20px;background: #ED0A0A;border-radius: 10px 10px 0px 0px;color: white;text-align:center;'><?=$title;?></p>
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Net Amount</span><?=$bidding_amount;?></p>
						<hr style="margin:5px;">
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Date & Time</span><?=$date_and_time;?></p>
						<hr style="margin:5px;">
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Txn Id</span><?=$ref_no;?></p>
						<hr style="margin:5px;">
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Method</span><?=$res2['withdrawal_method'];?></p>
						<hr style="margin:5px;">
						<p style="margin-bottom:5px;"><span style='font-weight:bold;display:inline-block;width:150px;'>Detail</span><?=$detail;?></p>
					</div>
				</div>
			</div>
<?php
		}			
?>			

