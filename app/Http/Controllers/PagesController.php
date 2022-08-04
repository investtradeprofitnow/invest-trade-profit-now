<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function strategyList(){
        return view('services.strategy-list');
    }
}