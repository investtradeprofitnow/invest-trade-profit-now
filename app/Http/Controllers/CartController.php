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
            $plan = Session::get("plan");
            if($plan==null){
                $customer=Customers::where("email",$email)->first();
                Session::put("plan",$customer->plan);
            }
            if(Session::get("id")==null){
                $customer=Customers::where("email",$email)->first();
                Session::put("id",$customer->customer_id);
            }
            $disc = 1;
            switch($plan){
                case 2:
                    $disc=0.90;
                    break;
                case 3:
                    $disc=0.75;
                    break;
                case 4:
                    $disc=0.50;
                    break;
                case 5:
                    $disc=0.50;
                    break;
            }
            $custId = Session::get("id");
            $userStrategies = UserStrategy::where("user_id",$custId)->pluck("strategy_id");
            $data = StrategyShort::whereNotIn("strategy_brief_id",$userStrategies)->get();
            $offers = Session::get("offers");
            if($offers==null || count($offers)==0){
                $offers=Offers::whereNotIn("strategy_id",$userStrategies)->get();
                Session::put("offers",$offers);
            }
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
                $price = $data[$i]->price;
                if($plan>1){
                    $offer = $offers->where("strategy_id",$data[$i]->strategy_short_id)->first();
                    if($offer!=null){
                        $offerSubscribers = OfferSubscribers::where("offer_id",$offer->offer_id)->first();
                        if($offerSubscribers->subscribers>0){
                            $price1 = $price * $disc;
                            $discount = $offer->discount;
                            $typeDisc = $offer->type;                     
                            if($typeDisc=="percent"){
                                $price2=((100-$discount)*$price/100);
                            }
                            else{
                                $price2=$price-$discount;
                            }
                            $data[$i]->updated_price = $price1 < $price2 ? $price1 : $price2;
                            $index++;
                        }
                        else{
                            $data[$i]->updated_price = $price * $disc;
                        }
                    }
                    else{
                        $data[$i]->updated_price = $price * $disc;
                    }
                }
                else{
                    $data[$i]->updated_price = $price;
                }
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

    public function cart(){
        $custId = Session::get("id");
        $userCoupons = UserCoupon::where("user_id",$custId)->pluck("coupon_id");
        $coupons = Coupons::whereNotIn("coupon_id",$userCoupons)->get();
        return view("services.cart",["coupons"=>$coupons]);
    }

    public function addToCart($id){
        $strategy = StrategyShort::findOrFail($id);
        $cartStrategies = Session::get("cartStrategies",[]);
        $offers = Session::get("offers");
        if(isset($cartStrategies[$id])){
            return redirect()->back()->with("error","Strategy already added");
        }
        else{
            $plan = Session::get("plan");
            $price = $strategy->price;
            $disc=1;
            switch($plan){
                case 2:
                    $disc=0.90;
                    break;
                case 3:
                    $disc=0.75;
                    break;
                case 4:
                    $disc=0.50;
                    break;
                case 5:
                    $disc=0.50;
                    break;
            }
            if($plan>1){
                $offer = $offers->where("strategy_id",$id)->first();
                if($offer!=null){
                    $offerSubscribers = OfferSubscribers::where("offer_id",$offer->offer_id)->first();
                    if($offerSubscribers->subscribers>0){
                        $price1 = $price * $disc;
                        $discount = $offer->discount;
                        $typeDisc = $offer->type;
                        if($typeDisc=="percent"){
                            $price2=((100-$discount)*$price/100);
                        }
                        else{
                            $price2=$price-$discount;
                        }
                        $updated_price = $price1 < $price2 ? $price1 : $price2;
                    }
                    else{
                        $updated_price = $price * $disc;
                    }
                }
                else{
                    $updated_price = $price * $disc;
                }
            }
            else{                
                $updated_price=null;
            }
            $cartStrategies[$id] = [
                "name" => $strategy->name,
                "type" => $strategy->type,
                "price" => $updated_price!=null?floor($updated_price):$strategy->price,
                "brief_id" => $strategy->strategy_brief_id,
                "short_id" => $strategy->strategy_short_id
            ];
            Session::put("cartStrategies", $cartStrategies);
            return redirect()->back()->with("success","Strategy added successfully");
        }
    }

    public function deleteFromCart($id){
        $cartStrategies = Session::get("cartStrategies",[]);
        unset($cartStrategies[$id]);
        Session::put("cartStrategies", $cartStrategies);
        return redirect()->back()->with("success","Strategy deleted successfully");
    }

    public function saveStrategies($amount, $couponId){
        if($couponId=="null"){
            $couponId=null;
            $couponCode=null;
        }
        
        $email=Session::get("email");
        $customer = Customers::where("email",$email)->first();
        $custId=$customer->customer_id;
        $cartStrategies = Session::get("cartStrategies",[]);
        $strategies = [];
        $index=0;
        foreach($cartStrategies as $key=>$strategy){
            $userStrategy = new UserStrategy();                
            $userStrategy->user_id = $custId;
            $userStrategy->strategy_id = $strategy["brief_id"];
            $userStrategy->save();
            $strategies[$index] = $strategy["name"];
            $offer=Offers::where("strategy_id",$strategy["short_id"])->first();
            if($offer!=null){
                $offerSubscribers = OfferSubscribers::where("offer_id",$offer->offer_id)->first();
                if($offerSubscribers->subscribers>0){
                    $offerSubscribers->subscribers = $offerSubscribers->subscribers - 1;
                    $offerSubscribers->update();
                }
            }            
            $index++;
        }
        if($couponId!=null){
            $userCoupon = new UserCoupon();
            $userCoupon->user_id = $custId;
            $userCoupon->coupon_id = $couponId;
            $userCoupon->save();
            $couponCode = Coupons::where("coupon_id",$couponId)->value("code");
        }


        $order = new Orders();
        $order->user_id = $custId;
        $order->strategy_names = json_encode($strategies);
        $order->amount = $amount;
        $order->coupon = $couponId;
        $order->save();
        
        Session::forget("cartStrategies");
        Session::forget("plan");
        Session::forget("id");
        Session::forget("offers");

        Mail::to($email)->send(new OrderMail($customer->name,str_pad($order->order_id,8,"0",STR_PAD_LEFT),$order->created_at->format("d-M-Y"),$strategies,$amount,$couponCode));
        return redirect("/user-strategies");
    }
}
