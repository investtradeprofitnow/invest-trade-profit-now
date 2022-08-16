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
        return view('admin.index');
    }

    public function login(){
        return view('admin.login');
    }

    public function customer(){
        $customers=Customers::all()->sortBy("id");
        return view('admin.customer',['customers'=>$customers]);
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
        $strategies=StrategyShort::all()->sortBy("updated_at");
        return view('admin.strategy-short.strategy-list',['strategies'=>$strategies]);
    }

    public function strategyBrief(){
        $strategies=StrategyBrief::all()->sortBy("updated_at");
        return view('admin.strategy-brief.strategy-list',['strategies'=>$strategies]);
    }
}
