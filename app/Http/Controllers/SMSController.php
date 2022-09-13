<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SMSController extends Controller
{
    public function sendSMS(){
        $apiKey = urlencode('NDY2ZTM3NDc2NjYyMzc3MTM4NTA2NTY1NzU1OTUzNTI=');
        $mobile = '91'.'9168792580';
        $otpMobile = '123456';
        $message = 'Hi there, thank you for sending your first test message from Textlocal. See how you can send effective SMS campaigns here: https://tx.gl/r/2nGVj/';
	
	    // Message details
	    $numbers = array($mobile);
	    $sender = urlencode('TXTLCL');
	    $message = rawurlencode($message);
 
	    $numbers = implode(',', $numbers);
 
	    // Prepare data for POST request
	    $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	    // Send the POST request with cURL
	    $ch = curl_init('https://api.textlocal.in/send/');
	    curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        
        // Process your response here
	    echo $response;
    }
}
