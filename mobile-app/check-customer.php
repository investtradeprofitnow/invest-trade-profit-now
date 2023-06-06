<?php
    require_once 'customer.php';
    $email="";

    if(isset($_POST['email'])){        
        $email = $_POST['email'];
    }

    if(!empty($email)){
        $customerObj = new Customer();
        $isExists = $customerObj->customerExists($email);
        $json = array();
        if($isExists){
            $json["status"] = "exists";
            $json["message"] = "This email id already exists. Please use the forgot password to change the password of the account.";
        }
        else{
            $json["status"] = "not exists";
            $json["message"] = "This email id does not exists. Please register first.";
        }
        echo json_encode($json);
    }
?>