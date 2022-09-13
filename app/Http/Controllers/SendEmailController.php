<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use \DateTime;

use Mail;
use App\Mail\OTPMail;
use App\Mail\SuccessMail;
use App\Mail\ChangePasswordMail;

use App\Models\Otp;
use App\Models\ResetPassword;

class SendEmailController extends Controller
{
    public function index(){
        
        // $now = new DateTime();
        
        // $verifyOTP = ResetPassword::all();
        // foreach($verifyOTP as $otp){
        //     $diff = $now->diff($otp->created_at);
        //     $minutes = $diff->h * 60;
        //     $minutes += $diff->i;
        //     echo $minutes."<br/>";
        //     if($minutes>10){
        //         ResetPassword::findOrFail($otp->id)->delete();
        //     }
        // }
        
        Mail::to("sddmsinvesttradeprofitnow@gmail.com")->send(new ChangePasswordMail("Karishma"));
    }
}
