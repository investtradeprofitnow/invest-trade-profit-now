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
            $data = StrategyShort::all();
            $intradayList = array();
            $btstList = array();
            $positionalList = array();
            $investmentList = array();
            $intraId=0;
            $btstId=0;
            $posId=0;
            $investId=0;
            $index=0;
            for($i=0;$i<count($data);$i++){
                $type = $data[$i]->type;                
                if($type=="Intraday"){
                    $intradayList[$intraId++]=$data[$i];
                }
                else if($type=="BTST"){
                    $btstList[$btstId++]=$data[$i];
                }
                else if($type=="Positional"){
                    $positionalList[$posId++]=$data[$i];
                }
                else if($type=="Investment"){
                    $investmentList[$investId++]=$data[$i];
                }
            }
            return view("services.strategy-list",["intradayList"=>$intradayList, "btstList"=>$btstList, "positionalList"=> $positionalList, "investmentList"=>$investmentList]);
        }
        else{
            return redirect("/login");
        }
    }
}