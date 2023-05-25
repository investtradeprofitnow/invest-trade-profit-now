<?php
    require_once 'feedback.php';
    $customer_id=0;
    $rating=0;
    $feedback="";
    $anonymous="";

    if(isset($_POST['customer_id'])){        
        $customer_id = (int)$_POST['customer_id'];
    }
	if(isset($_POST['rating'])){        
        $rating = (int)$_POST['rating'];
    }
	if(isset($_POST['feedback'])){        
        $feedback = $_POST['feedback'];
    }
	if(isset($_POST['anonymous'])){        
        $anonymous = $_POST['anonymous'];
    }
	

    if($customer_id!=0 && $rating!=0 && !empty($feedback) && !empty($anonymous)){
        $feedbackObj = new Feedback();
        $feedbackExists = $feedbackObj->checkFeedback($customer_id);
        $query="";
        $operation="";
        if($feedbackExists == 1){
            $operation = "update";
        }
        else{
            $operation="insert";
        }
        $query = $feedbackObj->queryFeedback($customer_id, $rating, $feedback, $anonymous, $operation);
        $result = $feedbackObj->saveFeedback($query);
        $json = array();
        if($result==1){
            $json["message"] = "Feedback updated successfully";
        }
        else{
            $json["message"] = "Feedback couldn't be updated.";
        }
        echo json_encode($json);
    }
?>