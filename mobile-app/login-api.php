<?php
	require_once 'customer.php';    
    $email = "";    
    $password = "";
    if(isset($_POST['email'])){        
        $email = $_POST['email'];
    }
	if(isset($_POST['password'])){        
        $password = $_POST['password'];        
    }
    
	$customerObj = new Customer();
	if(!empty($email) && !empty($password)){
		$json_array = $customerObj->checkCustomer($email,$password);
		echo json_encode($json_array);
	}
?>