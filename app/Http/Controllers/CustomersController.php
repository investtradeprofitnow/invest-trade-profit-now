<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

use Auth;
use Config;

use Mail;
use App\Mail\OTPMail;
use App\Mail\SuccessMail;
use App\Mail\ResetPasswordMail;
use App\Mail\ChangePasswordMail;

use App\Models\Customers;
use App\Models\Otp;
use App\Models\StrategyShort;
use App\Models\StrategyBrief;
use App\Models\UserStrategy;
use App\Models\ResetPassword;

class CustomersController extends Controller
{
    public function displayOTP(){
        $email = request('email');
        $name = request('name');
        $mobile = request('mobile');
        $password = request('password');
        $error ="";
        if($name=="" || !preg_match ("/^[a-zA-Z ]+$/",$name)){
            $error = "Name should contain only Capital, Small Letters and Spaces Allowed";
        }
        if($mobile=="" || strlen($mobile)!=10 || !preg_match("/^[0-9]*$/",$mobile)){
            $error = $error."<br/> Mobile Number must be 10 digits";
        }
        if($email=="" || !preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$email)){
            $error = $error."<br/> Please enter a vaild email address";
        }
        if($password==null || !preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password)){
            $error = $error."<br/> Password should be 8-20 Characters, atleast one Capital and one Small Letter, one numberic and special characters";
        }
        if($error=="")
        {
            $user = Customers::where('email', $email)->first();
            if($user==null){
                $customer = new Customers();
                $customer->name = request('name');
                $customer->mobile = request('mobile');
                $customer->email = request('email');
                $customer->password = password_hash(request('password'),PASSWORD_DEFAULT);
                $customer->photo = strtoupper(request('name')[0]).".png";
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
                Session::put("customer",$customer);
                Mail::to(request('email'))->send(new OTPMail(request('name'),$otpEmail->otp));
                return redirect('/register');
            }
            else{
                $error="User already exists.";
            }
        }
        else{
            return redirect("/register")->with("error",$error);
        }
    }
    public function displayStrategies(){
        $customer = Session::get("customer");
        $mobile = $customer['mobile'];
        $otpMobile = request ('mobile-otp');
        $email = $customer['email'];
        $otpEmail = request ('email-otp');
        $rowEmail = Otp::where('type', '=', $email)->where('otp', '=', $otpEmail)->first();
        $rowMobile = Otp::where('type', '=', $mobile)->where('otp', '=', $otpMobile)->first();
        $error="";

        if($rowEmail==null){
            $error.="Email OTP doesn't match. ";
        }
        if($rowMobile==null){
            $error.="Mobile OTP doesn't match.";
        }
        if($error==""){
            Otp::where('type', request('mobile'))->delete();
            Otp::where('type', request('email'))->delete();
            return redirect('/strategy-list');
        }
        else{
            return redirect("/register")->with("error",$error);
        }
    }

    public function saveCustomer(){
        $customer = Session::get("customer");
        $customer->save();
        $cust_id=$customer->id;
        if($cust_id>0){
            $strategyList = Session::get('cartStrategies',[]);
            foreach($strategyList as $key=>$strategy){
                $userStrategy = new UserStrategy();                
                $userStrategy->user_id = $cust_id;
                $userStrategy->strategy_id = $strategy["brief_id"];
                $userStrategy->save();
            }
            Mail::to($customer['email'])->send(new SuccessMail($customer['name']));
            Session::put("email",$customer['email']);
            Session::put("role","Customer");
            Session::forget("cartStrategies");
            Session::forget("customer");
            return redirect("/");
        }
    }

    public function checkCustomer(){
        $email = request("email");
        $password = request("password");
        $user = Customers::where("email", $email)->first();
        if($user==null) {
            return view("user.login")->with('error',"User does not exists. Please register first.");
        }
        else if (password_verify($password,$user->password)){
            Session::put("email",$email);
            return redirect("/");
        }
        else{
            return view("user.login")->with('error',"Email id and Password doesn't match. Please try again");
        }
    }

    public function userStrategies(){
        $email=Session::get("email");
        $id=Customers::where("email",$email)->value("id");
        $data = UserStrategy::join('strategy_brief','user_strategy.strategy_id','=','strategy_brief.id')->where("user_strategy.user_id","=",$id)->get(["strategy_brief.name","strategy_brief.description","strategy_brief.type","strategy_brief.video"]);
        
        $intradayList = array();
        $btstList = array();
        $positionalList = array();
        $investmentList = array();
        $intraId=0;
        $btst_id=0;
        $pos_id=0;
        $invest_id=0;

        for($i=0;$i<count($data);$i++){
            $type = $data[$i]->type;
            if($type=="Intraday"){
                $intradayList[$intraId++]=$data[$i];
            }
            else if($type=="BTST"){
                $btstList[$btst_id++]=$data[$i];
            }
            else if($type=="Positional"){
                $positionalList[$pos_id++]=$data[$i];
            }
            else if($type=="Investment"){
                $investmentList[$invest_id++]=$data[$i];
            }
        }        
        return view('user.user-strategy-list',['intradayList'=>$intradayList, 'btstList'=>$btstList, 'positionalList'=> $positionalList, 'investmentList'=>$investmentList]);
    }

    public function sendPasswordLink(){
        $email = request("email");
        $user = Customers::where('email', $email)->first();
        if($user==null){
            return redirect('/display-reset-password')->with("error","User does not exists. Please register first.");
        }
        else{
            $token = Str::random(20);
            $resetPassword=resetPassword::where('email', $email)->first();
            if($resetPassword==null){
                $resetPassword = new ResetPassword();
                $resetPassword->email = $email;
                $resetPassword->token = $token;
                $resetPassword->save();
            }
            else{
                $resetPassword->token = $token;
                $resetPassword->update();
            }
            
            $link=env("APP_URL")."/reset-password/$token";
            Mail::to($email)->send(new ResetPasswordMail($user->name,$link));
            return redirect('/display-reset-password')->with("success","Reset password link has been sent to the email id");
        }
    }
    public function displayResetPassword(){
        return view("user.forgotPassword");
    }

    public function resetPassword($token){
        $resetPassword = ResetPassword::where("token",$token)->first();
        if($resetPassword!=null){
            Session::put("emailChange",$resetPassword->email);
            $resetPassword->delete();
            return view("user.changePassword");
        }
    }

    public function displayChangePassword(){
        return view("user.changePassword");
    }

    public function changePassword(){
        $email = request('email');
        $password = request('password');
        $cnfm_password = request('cnfm_password');
        $error="";
        if($password==null || !preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password)){
            $error = $error."<br/> Password should be 8-20 Characters, atleast one Capital and one Small Letter, one numberic and special characters";
        }
        else if($cnfm_password==null || !preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$cnfm_password)){
            $error = $error."<br/> Confirm Password should be 8-20 Characters, atleast one Capital and one Small Letter, one numberic and special characters";
        }
        else if($password!=$cnfm_password){
            $error = $error."<br/> Both the passwords do not match";
        }
        else{
            $customer = Customers::where('email', $email)->first();
            $customer->password = password_hash($password,PASSWORD_DEFAULT);
            $customer->update();
            Session::forget("emailChange");
            Mail::to($email)->send(new ChangePasswordMail($customer->name));
            return redirect("/display-change-password")->with("success","Your password has been changed successfully");
        }
        return redirect()->back()->with("error",$error);
    }

    public function logout(){
        Session::forget("email");
        Session::forget("role");
        return redirect("/");
    }

    public function updateRole($id){
        $customer = Customers::find($id);
        $customer->role = request("role");
        $customer->update();
        return redirect("/admin/customer");
    }
}
