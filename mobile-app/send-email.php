<?php
    class SendEmail{
        public function sendEmail($to,$from,$subject,$message){
            $headers = array(
                "MIME-Version: 1.0",
                "Content-type:text/html;charset=UTF-8",
                "From: ".APP_NAME." <".$from.">"
            );
            $headers = implode("\r\n", $headers);
            $isSent = mail($to, $subject, $message, $headers);
            return $isSent;
        }
    }
?>