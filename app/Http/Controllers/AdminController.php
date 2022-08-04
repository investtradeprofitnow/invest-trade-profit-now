<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StrategyShort;

class AdminController extends Controller
{
    public function home(){
        return view('admin.index');
    }

    public function strategyShort(){
        $strategies=StrategyShort::all()->sortBy("updated_at");
        return view('admin.strategy-short.strategy-list',['strategies'=>$strategies]);
    }
}
