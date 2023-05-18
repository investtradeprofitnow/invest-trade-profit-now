<?php
    require 'customer.php';

    if(isset($_POST['email'])){        
        $email = $_POST['email'];
    }
    if(isset($_POST['otp'])){        
        $otp = (int)$_POST['otp'];
    }

    if(!empty($email) && !empty($otp)){
        $customerObj = new Customer();
        $isVerify = $customerObj->verifyOtp($email,$otp);
        $json = array();
        if($isVerify){
            $json["status"] = "success";
        }
        else{
            $json["status"] = "error";
            $json["message"] = "OTP do not match. Please try again.";
        }
        echo json_encode($json);
    }
?>