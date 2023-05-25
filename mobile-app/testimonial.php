<?php
    require_once 'feedback.php';
    $feedback = new Feedback();
    $json = $feedback->testimonials();
    echo json_encode($json);
?>