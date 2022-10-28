<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Models\StrategyShort;
use App\Models\StrategyBrief;
use App\Models\Customers;
use App\Models\Offers;
use App\Models\Coupons;

class AdminController extends Controller
{
    public function home(){
        if($this->checkAdminSession()){
            return view("admin.index");
        }
        else{
            return redirect ("/admin/login");
        }
    }

    public function login(){
        return view("admin.login");
    }

    public function customer(){
        if($this->checkAdminSession()){
            $customers=Customers::all()->sortBy("customer_id");
            return view("admin.customer",["customers"=>$customers]);
        }
    }

    public function checkAdminUser(){
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
                if($user->role="Admin"){
                    Session::put("email",$email);
                    Session::put("role","Admin");
                    return redirect("/admin/home");
                }
                else{
                    $error="Only Admin users can access this Website.";
                }
            }
            else{
                $error="Email id and Password doesn't match. Please try again.";
            }
        }
        return redirect()->back()->with("error",$error);
    }

    public function strategyShort(){
        if($this->checkAdminSession()){
            $strategies=StrategyShort::all()->sortByDesc("updated_at");
            return view("admin.strategy-short.strategy-list",["strategies"=>$strategies]);
        }
        else{
            return redirect("/admin/login");
        }
    }

    public function strategyBrief(){
        if($this->checkAdminSession()){
            $strategies=StrategyBrief::all()->sortByDesc("updated_at");
            return view("admin.strategy-brief.strategy-list",["strategies"=>$strategies]);
        }
        else{
            return redirect("/admin/login");
        }
    }

    public function offers(){
        if($this->checkAdminSession()){
            $offers=Offers::all()->sortByDesc("updated_at");
            return view("admin.offers.offers-list",["offers"=>$offers]);
        }
        else{
            return redirect("/admin/login");
        }
    }

    public function coupons(){
        if($this->checkAdminSession()){
            $coupons=Coupons::all()->sortByDesc("updated_at");
            return view("admin.coupons.coupons-list",["coupons"=>$coupons]);
        }
        else{
            return redirect("/admin/login");
        }
    }

    public function logout(){
        Session::forget("email");
        Session::forget("role");
        return redirect("/admin/login");
    }

    public function checkAdminSession(){
        if(Session::get("email")!="" && Session::get("role")=="Admin"){
            return true;
        }
        else{
            return false;
        }
    }
}
