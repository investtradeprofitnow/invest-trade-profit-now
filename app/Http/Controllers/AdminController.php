<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Models\StrategyShort;
use App\Models\StrategyBrief;
use App\Models\Customers;

class AdminController extends Controller
{
    public function home(){
        if($this->checkSession()){
            return view('admin.index');
        }
        else{
            return view('admin.login');
        }
    }

    public function login(){
        return view('admin.login');
    }

    public function customer(){
        if($this->checkSession()){
            $customers=Customers::all()->sortBy("id");
            return view('admin.customer',['customers'=>$customers]);
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
                Session::put("email",$email);
                Session::put("role","Admin");
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

    public function strategyShort(){
        if($this->checkSession()){
            $strategies=StrategyShort::all()->sortBy("updated_at");
            return view('admin.strategy-short.strategy-list',['strategies'=>$strategies]);
        }
        else{
            return view('admin.login');
        }
    }

    public function strategyBrief(){
        if($this->checkSession()){
            $strategies=StrategyBrief::all()->sortBy("updated_at");
            return view('admin.strategy-brief.strategy-list',['strategies'=>$strategies]);
        }
        else{
            return view('admin.login');
        }
    }

    public function checkSession(){
        if(Session::get("email")!="" && Session::get("role")=="Admin"){
            return true;
        }
        else{
            return false;
        }
    }
}
