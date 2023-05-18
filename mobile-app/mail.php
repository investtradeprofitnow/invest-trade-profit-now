<?php
$fromEmail = "contact@investtradeprofitnow.com"; // replace with my domain
$toEmail = "sddmsinvesttradeprofitnow@gmail.com";      // replace with my domain

$name = "Karishma";
$email = "sddmsinvesttradeprofitnow@gmail.com";
$phone = "9168792580";
$subject = "Test Mail";
$message = "Test Mail";

$emailMessage = array(
    "Hello I'm testing this email service because it doesn't seem to be working right now. Date: ".date(DATE_RFC2822),
    "Name: ".$name,
    "Email: ".$email,
    "Phone: ".$phone,
    "Subject: ".$subject,
    "Message: ".$message
);
$emailMessage = implode("\r\n", $emailMessage);

$headers = array("From: ".APP_NAME." <".$from.">",
    "Reply-To: ".$fromEmail,
    "X-Mailer: PHP/" . PHP_VERSION
);
$headers = implode("\r\n", $headers);

$output = mail($toEmail, "Contact Form test message from website", $emailMessage, $headers);

echo $output;
?>