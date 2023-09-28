<?php
	include("../db.php");
	include("../function.php");
	include("../common-details.php");
	include("../check-login.php");
	
	$doctor_id=$_GET['doctor_id'];
	$current_date=urldecode($_GET['a']);
	$a=date_create_from_format("Y-m-d",$current_date);
	$current_day=date_format($a,"l");
	
	$i=0;
	$query=mysqli_query($con,"select * from doctor_schedule where doctor_id='$doctor_id' and appointment_date='$current_date'");
	$num=mysqli_num_rows($query);
	if($num>0)
		{
			while($res=mysqli_fetch_array($query))
				{
					$a=date_create_from_format("H:i",$res['from_time']);
					$from=date_format($a,"h:i a");
					$b=date_create_from_format("H:i",$res['to_time']);
					$to=date_format($b,"h:i a");
					echo "<a href='' style='padding:6px 20px;background:#D8EDC2;color:black;margin-right:10px;margin-bottom:10px;font-size:14px;letter-spacing:1px;border-radius:5px;display:inline-block;box-shadow:1px 1px 1px 1px lightgray;font-weight:500'>$from - $to</a>";
					$i++;
				}
		}
	else
		{										
			$query=mysqli_query($con,"select * from doctor_timing where doctor_id='$doctor_id' and appointment_day='$current_day'");
			$num=mysqli_num_rows($query);
			if($num>0)
				{
					while($res=mysqli_fetch_array($query))
						{
							$a=date_create_from_format("H:i",$res['from_time']);
							$from=date_format($a,"h:i a");
							$b=date_create_from_format("H:i",$res['to_time']);
							$to=date_format($b,"h:i a");
							echo "<a href='' style='padding:6px 20px;background:#D8EDC2;color:black;margin-right:10px;margin-bottom:10px;font-size:14px;letter-spacing:1px;border-radius:5px;display:inline-block;box-shadow:1px 1px 1px 1px lightgray;font-weight:500'>$from - $to</a>";
							$i++;
						}
				}
		}
?>
