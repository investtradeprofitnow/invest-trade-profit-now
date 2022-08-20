<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StrategyShort;

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
        $intradayList = StrategyShort::where('type', 'Intraday')->get();
        $btstList = StrategyShort::where('type', 'BTST')->get();
        $positionalList = StrategyShort::where('type', 'Positional')->get();
        $investmentList = StrategyShort::where('type', 'Investment')->get();
        return view('services.strategy-list',['intradayList'=>$intradayList, 'btstList'=>$btstList, 'positionalList'=> $positionalList, 'investmentList'=>$investmentList]);
    }
}