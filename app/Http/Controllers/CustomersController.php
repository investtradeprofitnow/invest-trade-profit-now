<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;

use Auth;
use Config;
use Carbon\Carbon;

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

use App\Http\Controllers;

class CustomersController extends Controller
{
    public function displayOTP(){
        $email = request("email");
        $name = request("name");
        $mobile = request("mobile");
        $password = request("password");
        $error ="";
        if($name=="" || !preg_match ("/^[a-zA-Z ]+$/",$name)){
            $error = "Name should contain only Capital, Small Letters and Spaces Allowed";
        }
        if($mobile=="" || strlen($mobile)!=10 || !preg_match("/^[0-9]*$/",$mobile)){
            $error = $error."<br/> Mobile Number must be 10 digits";
        }
        if($email=="" || !preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$email)){
            $error = $error."<br/> Please enter a valid email address";
        }
        if($password==null || !preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/",$password)){
            $error = $error."<br/> Password should be 8-20 Characters, atleast one Capital and one Small Letter, one numberic and special characters";
        }
        if($error=="")
        {
            $user = Customers::where("email", $email)->first();
            if($user==null){
                $customer = new Customers();
                $email = request("email");
                $mobile = request("mobile");
                $name = request("name");
                $customer->name = $name;
                $customer->mobile = $mobile;
                $customer->email = $email;
                $customer->password = password_hash(request("password"),PASSWORD_DEFAULT);
                $customer->photo = null;
                $otpMobile = new Otp();
                $otpEmail = new Otp();
                $otpMobile->type = $mobile;
                $otpMobile->otp = random_int(100000, 999999);
                $otpEmail->type = $email;
                $otpEmail->otp = random_int(100000, 999999);
                Otp::where("type", $mobile)->delete();
                Otp::where("type", $email)->delete();
                $otpMobile->save();
                $otpEmail->save();
                Session::put("customer",$customer);
                Session::put("otpModal","yes");
                $this->sendSms($mobile,$otpMobile);
                Mail::to($email)->send(new OTPMail($name,$otpEmail->otp));
                return redirect()->back();
            }
            else{
                $error="User already exists.";
                Session::forget("customer");
                return redirect()->back()->with("error",$error);
            }
        }
        else{
            return redirect()->back()->with("error",$error);
        }
    }

    public function sendSms($mobile, $otp){
        // Account details
        $apiKey = urlencode("Your apiKey");
        // Message details
        $numbers = array($mobile);
        $sender = urlencode("TXTLCL");
        $message = rawurlencode("Welcome to Invest Trade Profit Now. Your OTP for Mobile Verification is ".$otp.". Thanks, Invest Trade Profit Now");
        
        $numbers = implode(",", $numbers);
        
        // Prepare data for POST request
        $data = array("apikey" => $apiKey, "numbers" => $numbers, "sender" => $sender, "message" => $message);
        // Send the POST request with cURL
        $ch = curl_init("https://api.textlocal.in/send/");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        // Process your response here
        echo $response;
    }

    public function verifyOtp(Request $request){
        $this->validate($request, [
            "mobile-otp" => "required|numeric|digits:6",
            "email-otp" => "required|numeric|digits:6",
        ]);
        $customer = Session::get("customer");
        $mobile = $customer["mobile"];
        $otpMobile = request ("mobile-otp");
        $email = $customer["email"];
        $otpEmail = request ("email-otp");
        $rowEmail = Otp::where("type", $email)->where("otp", $otpEmail)->first();
        $rowMobile = Otp::where("type", $mobile)->where("otp", $otpMobile)->first();
        $error="";

        if($rowEmail==null){
            $error.="Email OTP doesn't match. ";
        }
        if($rowMobile==null){
            $error.="<br/>Mobile OTP doesn't match.";
        }
        if($error==""){
            $rowEmail->delete();
            $rowMobile->delete();
            Session::forget("otpModal");
            Session::forget("otpError");
            if(Session::get("plan")!=null){
                Session::put("reason","register");
                (new PaymentController)->initiatePaymentPlan(Session::get("plan"),"Registration for Website for ".$email);
                //return redirect("/save-customer");
            }
            else{
                return redirect("/pricing");
            }
        }
        else{
            return redirect()->back()->with("error",$error);
        }
    }

    public function resendEmailOtp(){
        $email = Session::get("updateEmail")!=null ? Session::get("updateEmail") : Session::get("customer")["email"];
        Otp::where("type", $email)->delete();
        $otpEmail = new Otp();
        $otpEmail->type = $email;
        $otpEmail->otp = random_int(100000, 999999);
        $otpEmail->save();
        Mail::to($email)->send(new OTPMail(request("emailName"),$otpEmail->otp));
        return redirect()->back()->with("successResend","OTP has been resend to the email address");
    }

    public function resendMobileOtp(){
        $mobile = Session::get("updateMobile")!=null ? Session::get("updateMobile") : Session::get("customer")["mobile"];
        Otp::where("type", $mobile)->delete();
        $otpMobile = new Otp();
        $otpMobile->type = $mobile;
        $otpMobile->otp = random_int(100000, 999999);
        $otpMobile->save();
        return redirect()->back()->with("successResend","OTP has been resend to the mobile number");
    }

    public function savePlan($id)
    {
        Session::put("plan",$id);
        if(Session::get("customer")!=null){
            $email = Session::get("customer")["email"];
            Session::put("reason","register");
            (new PaymentController)->initiatePaymentPlan($id,"Registration for Website for ".$email);
            //return redirect("/save-customer");
        }
        else{
            return redirect("/register");
        }
    }
    
    public function updatePlan($id)
    {
        $email = Session::get("email");
        Session::put("reason","updatePlan");
        $data = (new PaymentController)->initiatePaymentPlan($id,"Updation in Plan for ".$email);
        return redirect("/payment-page")->with("data",$data);
    }

    public function updatePlanDetails(){
        $email = Session::get("email");
        $customer = Customers::where("email",$email)->first();
        switch($id){
            case 1:
                $end_date = date("y-m-d", strtotime("+20 year"));
                break;
            case 2:
                $end_date = date("y-m-d", strtotime("+1 year"));
                break;
            case 3:
                $end_date = date("y-m-d", strtotime("+2 years"));
                break;
            case 4:
                $end_date = date("y-m-d", strtotime("+5 year"));
                break;
        }
        $customer->plan = $id;
        $customer->start_date = date("y-m-d");
        $customer->end_date = $end_date;
        $customer->update();
        return redirect ("/strategy-list");
    }

    public function saveCustomer(){
        $customer = Session::get("customer");
        $plan = Session::get("plan");
        $start_date = date("y-m-d");
        $end_date;
        switch($plan){
            case 1:
                $end_date = date("y-m-d", strtotime("+20 year"));
                break;
            case 2:
                $end_date = date("y-m-d", strtotime("+1 year"));
                break;
            case 3:
                $end_date = date("y-m-d", strtotime("+2 years"));
                break;
            case 4:
                $end_date = date("y-m-d", strtotime("+5 year"));
                break;
        }
        $customer->start_date = $start_date;
        $customer->end_date = $end_date;
        $customer->plan = $plan;
        $customer->save();
        $cust_id=$customer->id;
        if($cust_id>0){
            Mail::to($customer["email"])->send(new SuccessMail($customer["name"]));
            Session::put("email",$customer["email"]);
            Session::put("role","Customer");
            $plan = Session::put("plan",$plan);
            Session::forget("customer");
            return redirect("/");
        }
    }

    public function checkCustomer(){
        $email = request("email");
        $password = request("password");
        $error=null;
        if($email=="" || !preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$email)){
            $error = $error."Please enter a valid email address";
        }
        else if($password==null || !preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/",$password)){
            $error = $error."Password should be 8-20 Characters, atleast one Capital and one Small Letter, one numberic and special characters";
        }
        if($error==null){
            $user = Customers::where("email", $email)->first();
            if($user==null) {
                $error="User does not exists. Please register first.";
            }
            else if (password_verify($password,$user->password)){
                $plan = $user->plan;
                Session::put("email",$email);
                Session::put("plan",$plan);
                if($plan>=1){
                    $end = Carbon::parse($user->end_date);
                    $days = now()->diffInDays($end,false);
                    if($days<=0){
                        $user->plan="1";
                        $user->update();
                        return redirect("/pricing")->with("expired","Your Subscription is expired.Please renew the same.");                                                                                
                    }
                    else if($days<=7){
                        echo "<script type='text/javascript'>alert('hi');</script>";
                        return redirect("/")->with("days",$days);
                    }
                }                
                return redirect("/");
            }
            else{
                $error="Email id and Password doesn't match. Please try again";
            }
        }
        return redirect()->back()->with("error",$error);        
    }

    public function userStrategies(){
        if((new PagesController)->checkSession()){
            $email=Session::get("email");
            $id=Customers::where("email",$email)->value("id");
            $data = UserStrategy::join("strategy_brief","user_strategy.strategy_id","=","strategy_brief.id")->where("user_strategy.user_id","=",$id)->get(["strategy_brief.name","strategy_brief.description","strategy_brief.type","strategy_brief.video"]);
            
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
            return view("user.user-strategy-list",["intradayList"=>$intradayList, "btstList"=>$btstList, "positionalList"=> $positionalList, "investmentList"=>$investmentList]);
        }
        else{
            return redirect("/login");
        }
    }

    public function sendPasswordLink(){
        $email = request("email");
        $error=null;
        if($email=="" || !preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$email)){
            $error="Please enter a valid email address";
        }
        if($error==null){
            $user = Customers::where("email", $email)->first();
            if($user==null){
                $error="User does not exists. Please register first.";
            }
            else{
                $token = Str::random(20);
                $resetPassword=resetPassword::where("email", $email)->first();
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
                return redirect()->back()->with("success","Reset password link has been sent to the email id");
            }
        }
        return redirect()->back()->with("error",$error);     
    }

    public function displayResetPassword(){
        return view("user.forgot-password");
    }

    public function resetPassword($token){
        $resetPassword = ResetPassword::where("token",$token)->first();
        if($resetPassword!=null){
            Session::put("emailChange",$resetPassword->email);
            $resetPassword->delete();
            return redirect("/display-change-password");
        }
    }

    public function displayChangePassword(){
        return view("user.change-password");
    }

    public function changePassword(){
        $email = request("email")!=null?request("email"):session("email");
        $password = request("password");
        $cnfm_password = request("cnfm_password");
        $error="";
        if($password==null || !preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/",$password)){
            $error = "Password should be 8-20 Characters, atleast one Capital and one Small Letter, one numberic and special characters";
        }
        else if($cnfm_password==null || !preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/",$cnfm_password)){
            $error = "Confirm Password should be 8-20 Characters, atleast one Capital and one Small Letter, one numberic and special characters";
        }
        else if($password!=$cnfm_password){
            $error = "Both the passwords do not match";
        }
        else{
            $customer = Customers::where("email", $email)->first();
            $customer->password = password_hash($password,PASSWORD_DEFAULT);
            $customer->update();
            Session::forget("emailChange");
            Mail::to($email)->send(new ChangePasswordMail($customer->name));
            return redirect()->back()->with("success","Your password has been changed successfully");
        }
        return redirect()->back()->with("error",$error);
    }

    public function profile(){
        if((new PagesController)->checkSession()){
            $email = Session::get("email");
            $customer = Customers::where("email", $email)->first(); 
            $photo = $customer->photo;
            if(is_null($photo) || empty($photo)){
                $customer->photo = strtoupper($customer->name[0]).".png";
                $photo=null;
            }
            return view("user.profile",["customer"=>$customer, "photo"=>$photo]);
        }
        else{
            return redirect("/login");
        }
    }

    public function updateName(Request $request){
        if((new PagesController)->checkSession()){
            Session::put("nameModal","yes");
            $this->validate($request, [
                "name" => "required|regex:/^[a-zA-Z ]+$/"
            ]);
            $email = Session::get("email");
            $customer = Customers::where("email", $email)->first();
            $name=request("name");
            $customer->name = $name;
            $customer->update();
            Sesson::forget("nameModal");
            return redirect()->back();
        }
        else{
            return redirect("/login");
        }
    }

    public function verifyEmail(){
        if((new PagesController)->checkSession()){
            Session::put("emailModal","yes");
            $email = request("email");
            if($email=="" || !preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$email)){
                return redirect()->back()->with("otpError","Please enter a valid email address");
            }
            $customer = Customers::where("email", $email)->first();
            if($customer!=null){
                return redirect()->back()->with("otpError","Account with this email id already exists.");
            }
            Otp::where("type", $email)->delete();
            $otpEmail = new Otp();
            $otpEmail->type = $email;
            $otpEmail->otp = random_int(100000, 999999);
            $otpEmail->save();
            Session::forget("emailModal");
            Session::forget("mobileOtpModal");
            Session::put("emailOtpModal","yes");
            Session::put("updateEmail",$email);
            Mail::to($email)->send(new OTPMail(request("emailName"),$otpEmail->otp));
            return redirect()->back();
        }
        else{
            return redirect("/login");
        }
    }

    public function verifyEmailOtp(Request $request){
        if((new PagesController)->checkSession()){
            $this->validate($request, [
                "email-otp" => "required|numeric|digits:6",
            ]);
            $email = Session::get("email");
            $updateEmail = Session::get("updateEmail");
            $otpEmail = request ("email-otp");
            $rowEmail = Otp::where("type", $updateEmail)->where("otp", $otpEmail)->first();
            $error="";
            if($rowEmail==null){
                return redirect()->back()->with("otpError","Email OTP doesn't match.");             
            }
            else{
                $rowEmail->delete();
                $customer = Customers::where("email",$email)->first();
                $customer->email = $updateEmail;
                $customer->update();
                Session::forget("emailOtpModal");
                Session::forget("updateEmail");
                Session::put("email",$updateEmail);
                return redirect()->back();
            }
        }
        else{
            return redirect("/login");
        }
    }

    public function verifyMobile(Request $request){
        if((new PagesController)->checkSession()){
            Session::put("mobileModal","yes");
            $this->validate($request, [
                "mobile" => "required|numeric|digits:10",
            ]);
            $mobile = request("mobile");
            $customer = Customers::where("mobile", $mobile)->first();
            if($customer!=null){
                return redirect()->back()->with("otpError","Account with this mobile number already exists.");
            }
            Otp::where("type", $mobile)->delete();
            $otpMobile = new Otp();
            $otpMobile->type = $mobile;
            $otpMobile->otp = random_int(100000, 999999);
            $otpMobile->save();            
            Session::forget("emailOtpModal");
            Session::forget("mobileModal");
            Session::put("mobileOtpModal","yes");
            Session::put("updateMobile",$mobile);
            return redirect()->back();
        }
        else{
            return redirect("/login");
        }
    }

    public function verifyMobileOtp(Request $request){
        if((new PagesController)->checkSession()){
            $this->validate($request, [
                "mobile-otp" => "required|numeric|digits:6",
            ]);
            $email = Session::get("email");
            $updateMobile = Session::get("updateMobile");
            $otpMobile = request ("mobile-otp");
            $rowMobile = Otp::where("type", $updateMobile)->where("otp", $otpMobile)->first();
            $error="";
            if($rowMobile==null){
                return redirect()->back()->with("otpError","Mobile OTP doesn't match.");
            }
            if($error==""){
                $rowMobile->delete();
                $customer = Customers::where("email", $email)->first();
                if($customer!=null){
                    $customer->mobile = $updateMobile;
                    $customer->update();
                    Session::forget("mobileOtpModal");
                    Session::forget("updateMobile");
                    return redirect()->back();
                }
            }
        }
        else{
            return redirect("/login");
        }
    }

    public function changePhoto(Request $request){
        if((new PagesController)->checkSession()){
            $email=Session::get("email");
            $photo=$request->file("cust-photo");
            $name=$photo->getClientOriginalName(); 
            $photo->move("images/customer-images",$name); 
            $customer = Customers::where("email", $email)->first();
            $customer->photo=$name;
            $customer->update();
            return redirect()->back();
        }
        else{
            return redirect("/login");
        }
    }

    public function deletePhoto(){
        if((new PagesController)->checkSession()){
            $email=Session::get("email");
            $customer = Customers::where("email", $email)->first();
            $photo = $customer->photo;
            File::delete("images/customer-images/".$photo);
            $customer->photo=null;
            $customer->update();
            return redirect()->back();
        }
        else{
            return redirerct("/login");
        }
    }

    public function logout(){
        Session::flush();
        return redirect("/");
    }

    public function updateRole($id){
        if((new AdminController)->checkAdminSession()){
            $customer = Customers::find($id);
            $customer->role = request("role");
            $customer->update();
            return redirect("/admin/customer");
        }
        else{
            return redirect("/admin/login");
        }
    }
}
