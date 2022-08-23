<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Auth;

use Mail;
use App\Mail\OTPMail;
use App\Mail\SuccessMail;

use App\Models\Customers;
use App\Models\Otp;
use App\Models\StrategyShort;
use App\Models\StrategyBrief;
use App\Models\UserStrategy;

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
                $customer->password = password_hash(request('password'),PASSWORD_DEFAULT);
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
                Session::forget("customer");
                return redirect("/register")->with("error","User already exists.");
            }
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
        $customerSession = Session::get("customer");
        $customer = new Customers();
        $customer->name = $customerSession['name'];
        $customer->mobile = $customerSession['mobile'];
        $customer->email = $customerSession['email'];
        $customer->password = $customerSession['password'];
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
            Mail::to($customerSession['email'])->send(new SuccessMail($customerSession['name']));
            Session::put("email",$customerSession['email']);
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
