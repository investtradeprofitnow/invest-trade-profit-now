<?php
    require_once 'customer.php';
    $customer_id=0;
    $email="";
    $name="";
    $current_email="";

    if(isset($_POST['email'])){        
        $email = $_POST['email'];
    }
    if(isset($_POST['currentEmail'])){        
        $current_email = $_POST['currentEmail'];
    }
    if(isset($_POST['name'])){        
        $name = $_POST['name'];
    }    
    if(isset($_POST['customerId'])){        
        $customer_id = (int)$_POST['customerId'];
    }

	if(!empty($email) && !empty($name) && !empty($customer_id)){
        $customerObj = new Customer();
        $json = array();
        $isExists=false;
        if($email!=$current_email){
            $isExists = $customerObj->customerExists($email);
        }        
        if($isExists){
            $json["status"] = "error";
            $json["message"] = "This email id already exists. Please use the forgot password to change the password of the account";
        }
        else{
            $update = $customerObj->updateProfile($name, $email, $customer_id);
            if($update==1){
                $json["status"] = "success";
                $json["message"] = "Profile Updated Successfully.";
                $json["name"] = $name;
                $json["email"] = $email;
            }
            else{
                $json["status"] = "error";
                $json["message"] = "Profile details couldn't be updated";
            }
        }        
        echo json_encode($json);
    }
?>