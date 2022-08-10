<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Auth;

use Mail;
use App\Mail\OTPMail;

use App\Models\Customers;
use App\Models\Otp;

class CustomersController extends Controller
{
    public function displayOTP(){
        $email = request('email');
        if($email!=null || $email!="")
        {
            $user = Customers::where('email', $email)->first();
            if($user==null){
                $customer = new Customers();
                $customer->name = request('name');
                $customer->mobile = request('mobile');
                $customer->email = request('email');
                $customer->password = password_hash(request("password"),PASSWORD_DEFAULT);
                $otpMobile = new Otp();
                $otpEmail = new Otp();
                $otpMobile->type = request('mobile');
                $otpMobile->otp = random_int(100000, 999999);
                $otpEmail->type = request('email');
                $otpEmail->otp = random_int(100000, 999999);
                Otp::where('type', request('mobile'))->delete();
                Otp::where('type', request('email'))->delete();
                $otpMobile->save();
                $otpEmail->save();
                Mail::to(request('email'))->send(new OTPMail(request('name'),$otpEmail->otp));
                return view('user.register',['customer'=>$customer]);
            }
            else{
                return view("user.register")->with("error","User already exists.");
            }
        }        
        else{
            return view("user.register")->with("error","User already exists.");
        }
    }
    public function addCustomer(){
        $mobile = request('mobile');
        $otpMobile = request ('mobile-otp');
        $email = request('email');
        $otpEmail = request ('email-otp');
        $rowEmail = Otp::where('type', '=', $email)->where('otp', '=', $otpEmail)->first();
        $rowMobile = Otp::where('type', '=', $mobile)->where('otp', '=', $otpMobile)->first();
        
        $customer = new Customers();
        $customer->name = request('name');
        $customer->mobile = $mobile;
        $customer->email = $email;
        $customer->password = request('password');
        $error="";
        if($rowEmail==null){
            $error.="Email OTP doesn't match. ";
        }
        if($rowMobile==null){
            $error.="Mobile OTP doesn't match.";
        }
        if($error=="")
        {   
            return view('services.strategy-list');
        }
        else{
            return view("user.register",['customer'=>$customer])->with("error",$error);
        }
    }

    public function checkCustomer(Request $request){
        $email = request("email");
        $password = request("password");
        $user = Customers::where("email", $email)->first();
        if($user==null) {
            return view("user.login")->with('error',"User does not exists. Please register first.");
        }
        else if (password_verify($password,$user->password)){
            SESSION::put("email",$email);
            return redirect("/");
        }
        else{
            return view("user.login")->with('error',"Email id and Password doesn't match. Please try again");
        }
    }

    public function checkAdminUser(){
        $email = request("email");
        $password = request("password");
        $user = Customers::where("email", $email)->first();
        if($user==null) {
            return view("user.login")->with('error',"User does not exists. Please register first.");
        }
        else if (password_verify($password,$user->password)){
            if($user->role="Admin"){
                SESSION::put("email",$email);
                return redirect("/admin/home");
            }
            else{
                return view("user.login")->with('error',"Only Admin users can access this Website.");
            }
        }
        else{
            return view("user.login")->with('error',"Email id and Password doesn't match. Please try again");
        }
    }

    public function logout(){
        Session::forget("email");
        return redirect("/");
    }

    public function updateRole(){
        $id = request("cust-id");
        $customer = Customers::find($id);
        $customer->role = request("role");
        $customer->update();
        return redirect("/admin/customer");
    }
}
