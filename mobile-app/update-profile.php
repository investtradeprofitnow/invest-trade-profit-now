<?php
    require_once 'customer.php';
    $customer_id=0;
    $email="";
    $name="";
    $current_email="";
    $photo="";

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
    if(isset($_POST['photo'])){        
        $photo = $_POST['photo'];
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
            $json["message"] = "This email id already exists. Please use the forgot password to change the password of the account.";
        }
        else{
            $json = $customerObj->updateProfile($name, $email, $customer_id, $photo);            
        }        
        echo json_encode($json);
    }
?>