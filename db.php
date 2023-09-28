<?php

	session_start();

	$con= new mysqli("localhost","root","","luckybet");

	if (! $con) {

		die("connection failed:".mysqli_connect_error());

	}

	date_default_timezone_set('Asia/Kolkata');



	function get_available_amount($user_id,$con)

		{

			$query=mysqli_query($con,"select sum(amount) as fund from transactions where user_id='$user_id' and transaction_type='Fund' and status='Approved'");

			$res=mysqli_fetch_array($query);

			$total_fund = $res['fund'];



			$query=mysqli_query($con,"select sum(amount) as withdrawal from transactions where user_id='$user_id' and transaction_type='Withdrawal' and (status='Approved' or status='Pending')");

			$res=mysqli_fetch_array($query);

			$total_withdrawal = $res['withdrawal'];



			$query=mysqli_query($con,"select sum(amount) as play from transactions where user_id='$user_id' and transaction_type='Play'");

			$res=mysqli_fetch_array($query);

			$total_play = $res['play'];



			$query=mysqli_query($con,"select sum(amount) as win from transactions where user_id='$user_id' and transaction_type='Win'");

			$res=mysqli_fetch_array($query);

			$total_win = $res['win'];



			$total=$total_fund+$total_win-$total_withdrawal-$total_play;

			return $total;

		}



	function get_closing_amount($user_id,$id,$con)

		{

			$query=mysqli_query($con,"select sum(amount) as fund from transactions where user_id='$user_id' and id<='$id' and transaction_type='Fund' and status='Approved'");

			$res=mysqli_fetch_array($query);

			$total_fund = $res['fund'];



			$query=mysqli_query($con,"select sum(amount) as withdrawal from transactions where user_id='$user_id' and id<='$id' and transaction_type='Withdrawal' and (status='Approved' or status='Pending')");

			$res=mysqli_fetch_array($query);

			$total_withdrawal = $res['withdrawal'];



			$query=mysqli_query($con,"select sum(amount) as play from transactions where user_id='$user_id' and id<='$id' and transaction_type='Play'");

			$res=mysqli_fetch_array($query);

			$total_play = $res['play'];



			$query=mysqli_query($con,"select sum(amount) as win from transactions where user_id='$user_id' and id<='$id' and transaction_type='Win'");

			$res=mysqli_fetch_array($query);

			$total_win = $res['win'];



			$total=$total_fund+$total_win-$total_withdrawal-$total_play;

			return $total;

		}
?>