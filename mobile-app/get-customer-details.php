<?php
    require_once 'customer.php';
    $customer_id=1;
    if(isset($_POST['customerId'])){        
        $customer_id = (int)$_POST['customerId'];
    }  
    if(!empty($customer_id)){
        $json = array();
        $customerObj = new Customer();
        $result = $customerObj->getCustomerDetails($customer_id);
        $json["customer"] = $result;
        echo json_encode($json);
    }
?>