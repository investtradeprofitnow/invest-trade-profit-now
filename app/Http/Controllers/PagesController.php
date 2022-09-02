<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Models\StrategyShort;
use App\Models\Customers;

class PagesController extends Controller
{
    public function index(){
        return view('index');
    }

    public function about(){
        return view('company.about-us');
    }

    public function expertise(){
        return view('company.our-expertise');
    }

    public function contact(){
        return view('company.contact-us');
    }

    public function pricing(){
        return view('services.pricing');
    }

    public function terms(){
        return view('support.terms-and-conditions');
    }

    public function privacy(){
        return view('support.privacy-policy');
    }

    public function login(){
        return view('user.login');
    }

    public function register(){
        return view('user.register');
    }

    public function checkSession(){
        if(Session::get("email")){
            return true;
        }
        else{
            return false;
        }
    }
}