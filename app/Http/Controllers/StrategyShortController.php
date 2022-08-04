<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StrategyShortController extends Controller
{
    public function addStrategy(){
        return view('admin.strategy-short.add-strategy');
    }
}
