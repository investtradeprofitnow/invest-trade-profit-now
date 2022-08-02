<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Auth;

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
                return view("user.register")->with("modal","yes");
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
        $user = Customers::where('email', request('email'))->first();
        if($user==null){
            $customer = new Customers();
            $customer->name = request('name');
            $customer->mobile = request('mobile');
            $customer->email = request('email');
            $customer->password = password_hash(request("password"),PASSWORD_DEFAULT);
            SESSION::put("email",request('email'));
            $customer->save();
            return redirect('/');
        }
        else{
            return view("user.register")->with("error","User already exists.");
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
