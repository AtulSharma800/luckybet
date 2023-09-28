<?php
	include("../../db.php");
	ob_start();
	$error="";
	//include("../../send_sms.php");
	//include("../../send_mail.php");
	include('../../plugin/phpqrcode/qrlib.php');
	include("../../common-details.php");
	mysqli_set_charset( $con, 'utf8');
	
	function compress($source, $destination, $quality) 
	    {
            $info = getimagesize($source);
            if ($info['mime'] == 'image/jpeg') 
                $image = imagecreatefromjpeg($source);
            
            elseif ($info['mime'] == 'image/gif') 
                $image = imagecreatefromgif($source);
            
            elseif ($info['mime'] == 'image/png') 
                $image = imagecreatefrompng($source);
            imagejpeg($image, $destination, $quality);
            return $destination;
        }
	$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
	$query=mysqli_query($con,"select * from users where mobile='$mobile'");
	$num=mysqli_num_rows($query);
	if($num>0)
		{
			$response['status']="Fail";
			$response['message']="<i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;Mobile no. already exist.";
			$response['error']=$error;
		}
	else
		{		
			$joining_date=date("Y-m-d h:i a");
			$status="Active";
			$name=mysqli_real_escape_string($con,$_POST['name']);
			$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
			$email=mysqli_real_escape_string($con,$_POST['email']);
			$password=mysqli_real_escape_string($con,$_POST['password']);
			
			$user_id=rand(111111,999999);
			$text = $co_website_url."user-information.php?user_id=$user_id";
			$path = '../../images/qrcode/';
			$qrcode=uniqid();
			$file = $path.$qrcode.".png";
			$qrcode_filename=$qrcode.".png";  
			// $ecc stores error correction capability('L')
			$ecc = 'L';
			$pixel_size = 5;
			$frame_size = 0;
			  
			// Generates QR Code and Stores it in directory given
			QRcode::png($text, $file, $ecc, $pixel_size, $frame_size);
			  
			$query=mysqli_query($con,"insert into users(user_id,name,mobile,email,password,joining_date,qrcode,status) values('$user_id','$name','$mobile','$email','$password','$joining_date','$qrcode_filename','Active')");
			$res=mysqli_affected_rows($con);
			if($res)
				{
					$query2=mysqli_query($con,"select * from users where mobile='$mobile'");
					$res2=mysqli_fetch_array($query2);
					$_SESSION['member_id']=$res2['id'];
					setcookie("name", $name, time() + (86400 * 30), "/");
					setcookie("id", $res2['id'], time() + (86400 * 30), "/");
					setcookie("user_id", $res2['user_id'], time() + (86400 * 30), "/");
					setcookie("mobile", $mobile, time() + (86400 * 30), "/");
					setcookie("email", $email, time() + (86400 * 30), "/");
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
					$response['message']="<i class='fa fa-check-circle' aria-hidden='true'></i>&nbsp;&nbsp;You have registered successfully.";
					$response['error']=$error;
				}
			else 
				{
					$response['status']="Fail";
					$response['message']="<i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;Some problem occured. Try again";
					$response['error']=$error;
				}
		}
	echo json_encode($response);					
?>