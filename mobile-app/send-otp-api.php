<?php
    require 'customer.php';
    require_once 'send-email.php';

    $email="";
    $name="";

    if(isset($_POST['email'])){        
        $email = $_POST['email'];
    }
    if(isset($_POST['name'])){        
        $name = $_POST['name'];
    }

    if(!empty($email) && !empty($name)){
        $json = array();
        $customer = new Customer();
        $otp = random_int(100000, 999999);
        $insertOTP = $customer->addOtp($email,$otp);
        if($insertOTP==1){
            $message = "
                    <html>
                        <body>
                            <div style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;background-color:#ffffff;color:#718096;height:100%;line-height:1.4;margin:0;padding:0;width:100%!important'>
                                <table width='100%' cellpadding='0' cellspacing='0' role='presentation' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;background-color:#edf2f7;margin:0;padding:0;width:100%'>
                                    <tbody>
                                        <tr>
                                            <td align='center' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol'>
                                                <table width='100%' cellpadding='0' cellspacing='0' role='presentation' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;margin:0;padding:0;width:100%'>
                                                    <tbody>
                                                        <tr>
                                                            <td style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;padding:25px 0;text-align:center'>
                                                                <a href='".APP_URL."' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;color:#3d4852;font-size:19px;font-weight:bold;text-decoration:none;display:inline-block' target='_blank' data-saferedirecturl='https://www.google.com/url?q=http://127.0.0.1:8000&amp;source=gmail&amp;ust=1684253106070000&amp;usg=AOvVaw1stkLVBgpng_wzFz5aIfi9'>
                                                                ".APP_NAME."
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width='100%' cellpadding='0' cellspacing='0' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;background-color:#edf2f7;border-bottom:1px solid #edf2f7;border-top:1px solid #edf2f7;margin:0;padding:0;width:100%'>
                                                                <table class='m_5913669104374874457inner-body' align='center' width='570' cellpadding='0' cellspacing='0' role='presentation' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;background-color:#ffffff;border-color:#e8e5ef;border-radius:2px;border-width:1px;margin:0 auto;padding:0;width:570px'>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;max-width:100vw;padding:32px'>
                                                                                <h2 style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;font-size:16px;font-weight:bold;margin-top:0;text-align:left'>Hello ".$name.",</h2>
                                                                                <p style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;font-size:16px;line-height:1.5em;margin-top:0;text-align:left'>Thank you for registering with us. Please enter the 6 digit OTP below for Email Verification.</p>
                                                                                <p style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;font-size:16px;line-height:1.5em;margin-top:0;text-align:left'>
                                                                                </p>
                                                                                <h1 style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;color:#3d4852;font-weight:bold;margin-top:0;text-align:center;font-size:xx-large'>".$otp."</h1>
                                                                                <p style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;font-size:16px;line-height:1.5em;margin-top:0;text-align:left'>If you didnt request this, please ignore this email.</p>
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
                                                                <table class='m_5913669104374874457footer' align='center' width='570' cellpadding='0' cellspacing='0' role='presentation' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;margin:0 auto;padding:0;text-align:center;width:570px'>
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
                            </div></div>
                            <div id=':1ky' class='ii gt' style='display:none'>
                                <div id=':1kz' class='a3s aiL '></div>
                            </div>
                            <div class='hi'></div>
                            </div>
                        </body>
                    </html>
                    ";

                $sendmail = new SendEmail();
                $isSent = $sendmail->sendEmail($email,APP_CONTACT,"Email Verification OTP Mail",$message);
                if($isSent==1){
                    $json["status"] = "success";
                }
                else{
                    $json["status"] = "error";
                    $json["message"] = "Mail for Email Verification couldn't be sent";
                }
                echo json_encode($json);
        }
        else{
            $json["status"] = "error";
            $json["message"] = "OTP couldn't be generated. Try again later.";
            echo json_encode($json);
        }
    }    
?>