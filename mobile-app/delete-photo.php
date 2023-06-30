<?php
    require_once 'customer.php';
    $photo="";
    $customer_id=0;
    if(isset($_POST['photo'])){        
        $photo = $_POST['photo'];
    }    
    if(isset($_POST['customerId'])){        
        $customer_id = (int)$_POST['customerId'];
    }    

    if(!empty($photo) && !empty($customer_id)){
        $customerObj = new Customer();
        $json = array();
        $is_removed = $customerObj->deletePhoto($photo);
        if($is_removed){
            $updatePhoto = $customerObj->updatePhotoNull($customer_id);
            $json["status"] = "success";
            $json["message"] = "Your photo has been deleted.";
        }
        else{
            $json["status"] = "error";
            $json["message"] = "Cannot delete your photo. Please ttry again later.";
        }
        echo json_encode($json);
    }
?>