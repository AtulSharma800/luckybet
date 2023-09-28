<?php
include("db.php");
if(!empty($_POST['mobilenumber']) && !empty($_POST['otp'])){
    $otp = $_POST['otp'];
    $mobileNumber = $_POST['mobilenumber'];
    try{
        $result = $con->query("SELECT mobile,otp FROM users WHERE mobile=$mobileNumber");
        $_SESSION['mobilenumber'] = $mobileNumber;
        if(!$result->num_rows > 0){
            echo json_encode(array(
                "message" => "Mobile Number not exists ".$con->error,
                "status" => false
            ));die;
        }
        $sql = "UPDATE users SET otp='$otp' WHERE mobile=$mobileNumber";
        if($con->query($sql) === true){
            echo json_encode(array(
                "message" => "OTP Successfully Updated",
                "status" => true
            ));
        } else{
            // echo "ERROR: Could not able to execute $sql. ". $con->error;
            echo json_encode(array(
                "message" => "ERROR: Could not able to execute".$con->error,
                "status" => true
            ));
        }
    }catch(Exception $e){
        echo json_encode(array(
            "message" => $e->getMessage(),
            'status' => $e->getCode()
        ));
    }
}else if(!empty($_POST['otp'])){
    try{
        $otp = $_POST['otp'];
        $mobileNumber = $_SESSION['mobilenumber'];
        $result = $con->query("SELECT mobile,otp FROM users WHERE mobile=$mobileNumber");
        $row =  $result->fetch_array();
        if($otp === $row['otp']){
            $responseArr['message'] = "success";
            $responseArr['status'] = true;
            echo json_encode($responseArr);
        }else{
            echo json_encode(array(
                "status" => false,
                "message" => "You have entered wrong otp number"
            ));
        }
    }catch(Exception $e){
        echo json_encode(
            array(
               "message" => $e->getMessage()
            )
        );
    }
}


?>