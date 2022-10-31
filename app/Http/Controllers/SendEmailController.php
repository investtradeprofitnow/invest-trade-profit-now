<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use \DateTime;

use Mail;
use App\Mail\OTPMail;
use App\Mail\SuccessMail;
use App\Mail\ChangePasswordMail;
use App\Mail\OrderMail;
use App\Mail\RefundInitiateMail;

use App\Models\Otp;
use App\Models\ResetPassword;

class SendEmailController extends Controller
{
    public function index(){
        Mail::to("sddmsinvesttradeprofitnow@gmail.com")->send(new RefundInitiateMail("Karishma",1234.56,1));
    }
}
