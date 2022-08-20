<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Models\StrategyShort;

class CartController extends Controller
{
    public function cart(){
        return view("services.cart");
    }

    public function addToCart($id){
        $strategy = StrategyShort::findOrFail($id);
        $cartStrategies = Session::get('cartStrategies',[]);
        if(isset($cartStrategies[$id])){
            return redirect()->back()->with('error','Strategy already added');
        }
        else{
            $cartStrategies[$id] = [
                "name" => $strategy->name,
                "type" => $strategy->type,
                "price" => $strategy->price
            ];
            Session::put('cartStrategies', $cartStrategies);
            return redirect()->back()->with('success','Strategy added successfully');
        }
    }

    public function deleteFromCart($id){
        $cartStrategies = Session::get('cartStrategies',[]);
        unset($cartStrategies[$id]);
        Session::put('cartStrategies', $cartStrategies);
        return redirect()->back()->with('success','Strategy deleted successfully');
    }
}
