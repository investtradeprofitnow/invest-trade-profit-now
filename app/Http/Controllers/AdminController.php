<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\StrategyShort;
use App\Models\StrategyBrief;

class AdminController extends Controller
{
    public function home(){
        return view('admin.index');
    }

    public function login(){
        return view('admin.login');
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
