<?php
	session_start();
	include("../db.php");
	$id=$_GET['id'];
	$query=mysqli_query($con,"select * from member where id='$id' and status='Enable'");
	$num=mysqli_num_rows($query);
	if($num>0)
		{
			$res=mysqli_fetch_array($query);
			$_SESSION['member_id']=$res['member_id'];
			$_SESSION['name']=$res['name'];
			$_SESSION['email_id']=$res['email_id'];
			echo "Success";
		}
	else
		{
			echo "Failure";
		}			
?>
