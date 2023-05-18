<?php
	require_once 'customer.php';
    $email="";
    $name="";
    $password="";

    if(isset($_POST['email'])){        
        $email = $_POST['email'];
    }
	if(isset($_POST['password'])){        
        $password = $_POST['password'];        
    }
    if(isset($_POST['name'])){        
        $name = $_POST['name'];
    }

	$customerObj = new Customer();
	if(!empty($email) && !empty($password) && !empty($name)){
        $json = array();
		$customer = $customerObj->saveCustomer($name,$email,$password);
		if($customer==null){
            $json["status"] = "error";
            $json["message"] = "Customer not registered. Please try again.";
        }
        else{
            $json["status"] = "success";
            $json["customer"] = $customer;
        }
        echo json_encode($json);
	}
?>