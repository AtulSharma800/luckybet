<?php
	include("../db.php");
	ob_start();
	$error="";
	//include("../../send_sms.php");
	//include("../../send_mail.php");
	include("../common-details.php");
	mysqli_set_charset( $con, 'utf8');
	
	$joining_date=date("Y-m-d");
	$status="Active";
	$plan_id=$_GET['plan_id'];
	$query=mysqli_query($con,"select * from health_package_detail where id='$plan_id'");
	$res=mysqli_fetch_array($query);
	$duration=$res['duration'];
	$valid_till=date('Y-m-d', strtotime("+$duration months", strtotime($joining_date)));
	
	$member_id=$_COOKIE['id'];
	$amount=$_GET['amount'];
	$payment_mode=$_GET['payment_mode'];
	$employee_id=0;
	$status="Active";
	$query=mysqli_query($con,"insert into plan(member_id,employee_id,plan_id,amount,payment_mode,joining_date,valid_till,status) values('$member_id','$employee_id','$plan_id','$amount','$payment_mode','$joining_date','$valid_till','$status')");
	$res=mysqli_affected_rows($con);
	if($res)
		{
			$query2=mysqli_query($con,"select * from users where id='$member_id'");
			$res2=mysqli_fetch_array($query2);
			$name=$res2['name'];
			/*$message="<html><body><div style='width:100%;display:block;'><center><img src='https://bhartiykisanunion.com/mobileapp/images/bhanu.png' style='height:150px;'></center><p style='font-size:20px;letter-spacing:1px;line-height:37px;'>Dear <span style='font-weight:bold;display:block;'>$name, </span><span style='display:block;'> आपका भारतीय किसान यूनियन (भानु) में स्वागत है !</span><span style='display:block;'> आप सफलतापूर्वक पंजीकृत हैं</span></p>
			<p style='font-size:20px;letter-spacing:1px;line-height:37px;'><b>User Id :</b> ".$mobile."</p><p style='font-size:20px;letter-spacing:1px;line-height:37px;'><b>पासवर्ड :</b> ".$password."</p>
			<p style='font-size:20px;letter-spacing:1px;line-height:37px;'><b>पंजीकरण संख्या :</b> ".$login_code."</p>
			</div></body></html>";
			  $subject="भारतीय किसान यूनियन (भानु) में आपका स्वागत है";
			  if(!empty($email))
				{
					send_mail($message,$subject,$email);
				}
			$message="प्रिय किसान : भारतीय किसान यूनियन (भानु) का सदस्यता बनने के लिए धन्यवाद आपकी सदस्यता आईडी $login_code है एवं पासवर्ड $password है";
			$template_id="1207165415236683439";
			send_sms($message,$mobile,$template_id);*/
			$response['status']="Success";
			$response['message']="<i class='fa fa-check-circle' aria-hidden='true'></i>&nbsp;&nbsp;Plan purchased successfully.";
			$response['error']=$error;
		}
	else 
		{
			$response['status']="Fail";
			$response['message']="<i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;Some problem occured. Try again";
			$response['error']=$error;
		}
	echo json_encode($response);					
?>