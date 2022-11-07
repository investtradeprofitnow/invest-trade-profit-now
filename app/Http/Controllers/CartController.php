<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use App\Models\StrategyShort;
use App\Models\Customers;
use App\Models\UserStrategy;
use App\Models\Offers;
use App\Models\OfferSubscribers;
use App\Models\Coupons;
use App\Models\UserCoupon;
use App\Models\Orders;


use Mail;
use App\Mail\OrderMail;

class CartController extends Controller
{
    public function strategyList(){
        if((new PagesController)->checkSession()){
            $email = Session::get("email");
            if(Session::get("id")==null){
                $customer=Customers::where("email",$email)->first();
                Session::put("id",$customer->customer_id);
            }
            $custId = Session::get("id");
            $strategies = StrategyShort::all()->sortByDesc("updated_at");
            return view("services.strategy-list",["strategies"=>$strategies]);
        }
        else{
            return redirect("/login");
        }
    }
}