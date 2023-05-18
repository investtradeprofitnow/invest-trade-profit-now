<?php
    require 'customer.php';
    require_once 'send-email.php';
    
    if(isset($_POST['email'])){        
        $email = $_POST['email'];
    }
    if(isset($_POST['password'])){        
        $password = $_POST['password'];
    }
    if(!empty($email) && !empty($password)){
        $json = array();
        $customerObj = new Customer();
        $result = $customerObj->updatePassword($email,$password);
        if($result==1){
            $message = "
                    <html>
                        <body>
                            <div id=':ni' class='a3s aiL msg181820320661809035'>
                                <u></u>
                                <div style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;background-color:#ffffff;color:#718096;height:100%;line-height:1.4;margin:0;padding:0;width:100%!important'>
                                    <table width='100%' cellpadding='0' cellspacing='0' role='presentation' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;background-color:#edf2f7;margin:0;padding:0;width:100%'>
                                        <tbody>
                                            <tr>
                                                <td align='center' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol'>
                                                    <table width='100%' cellpadding='0' cellspacing='0' role='presentation' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;margin:0;padding:0;width:100%'>
                                                        <tbody>
                                                            <tr>
                                                                <td style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;padding:25px 0;text-align:center'>
                                                                    <a href='".APP_URL."' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;color:#3d4852;font-size:19px;font-weight:bold;text-decoration:none;display:inline-block' target='_blank'>
                                                                    ".APP_NAME."
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width='100%' cellpadding='0' cellspacing='0' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;background-color:#edf2f7;border-bottom:1px solid #edf2f7;border-top:1px solid #edf2f7;margin:0;padding:0;width:100%'>
                                                                    <table class='m_181820320661809035inner-body' align='center' width='570' cellpadding='0' cellspacing='0' role='presentation' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;background-color:#ffffff;border-color:#e8e5ef;border-radius:2px;border-width:1px;margin:0 auto;padding:0;width:570px'>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;max-width:100vw;padding:32px'>
                                                                                    <h2 style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;font-size:16px;font-weight:bold;margin-top:0;text-align:left'>Hello ,</h2>
                                                                                    <p style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;font-size:16px;line-height:1.5em;margin-top:0;text-align:left'>We have processed your request of resetting your password.</p>
                                                                                    <p style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;font-size:16px;line-height:1.5em;margin-top:0;text-align:left'>If you didnt request this, please contact our team on <a href='mailto:".APP_CONTACT."?subject=Password%20Reset%20Query' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;color:#3869d4' target='_blank'>".APP_CONTACT."</a></p>
                                                                                    <h2 style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;font-size:16px;font-weight:bold;margin-top:0;text-align:left'>
                                                                                        Thanks,<br>
                                                                                        ".APP_NAME." Team
                                                                                    </h2>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol'>
                                                                    <table class='m_181820320661809035footer' align='center' width='570' cellpadding='0' cellspacing='0' role='presentation' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;margin:0 auto;padding:0;text-align:center;width:570px'>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td align='center' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;max-width:100vw;padding:32px'>
                                                                                    <p style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;line-height:1.5em;margin-top:0;color:#b0adc5;font-size:12px;text-align:center'>© ".date("Y")." ".APP_NAME.". All rights reserved.</p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class='yj6qo'></div>
                                    <div class='adL'></div>
                                </div>
                                <div class='adL'></div>
                            </div>
                        </body>
                    </html>
            ";
            $sendmail = new SendEmail();
            $isSent = $sendmail->sendEmail($email,APP_CONTACT,"Password Changed",$message);
            if($isSent==1){
                $json["status"] = "success";
                $json["message"] = "Password updated successfully";
                $json["hash"] = password_hash($password,PASSWORD_DEFAULT);
            }
            else{
                $json["status"] = "error";
                $json["message"] = "Mail for Email Verification couldn't be sent";
            }
        }
        else{
            $json["status"] = "error";
            $json["message"] = "Password could not be updated";
        }
        echo json_encode($json);
    }
?>