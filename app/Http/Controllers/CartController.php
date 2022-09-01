<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Models\StrategyShort;
use App\Models\Customers;
use App\Models\UserStrategy;

class CartController extends Controller
{
    public function strategyList(){
        if((new PagesController)->checkSession()){
            $email = Session::get("email");
            $plan = Session::get("plan");
            switch($plan){
                case 1:
                    $disc=0.90;
                    break;
                case 2:
                    $disc=0.75;
                    break;
                case 3:
                    $disc=0.50;
                    break;
            }
            $cust_id=Customers::where("email",$email)->value("id");
            $userStrategies = UserStrategy::where("user_id",$cust_id)->pluck("strategy_id");
            $data = StrategyShort::whereNotIn("strategy_brief_id",$userStrategies)->get();
            
            $intradayList = array();
            $btstList = array();
            $positionalList = array();
            $investmentList = array();
            $intraId=0;
            $btst_id=0;
            $pos_id=0;
            $invest_id=0;

            for($i=0;$i<count($data);$i++){
                $type = $data[$i]->type;
                if($type=="Intraday"){
                    $intradayList[$intraId++]=$data[$i];
                }
                else if($type=="BTST"){
                    $btstList[$btst_id++]=$data[$i];
                }
                else if($type=="Positional"){
                    $positionalList[$pos_id++]=$data[$i];
                }
                else if($type=="Investment"){
                    $investmentList[$invest_id++]=$data[$i];
                }
            }
            return view('services.strategy-list',['intradayList'=>$intradayList, 'btstList'=>$btstList, 'positionalList'=> $positionalList, 'investmentList'=>$investmentList, "disc"=>$disc, "userStrategies"=>$userStrategies, "disc"=>$disc]);
        }
        else{
            return redirect("/login");
        }
    }

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
            $plan = Session::get("plan");
            switch($plan){
                case 1:
                    $disc=0.90;
                    break;
                case 2:
                    $disc=0.75;
                    break;
                case 3:
                    $disc=0.50;
                    break;
            }
            $cartStrategies[$id] = [
                "name" => $strategy->name,
                "type" => $strategy->type,
                "price" => round($strategy->price * $disc),
                "brief_id" => $strategy->strategy_brief_id
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

    public function saveStrategies(){
        $email=Session::get("email");
        $cust_id=Customers::where("email",$email)->value("id");
        $cartStrategies = Session::get('cartStrategies',[]);
        foreach($cartStrategies as $key=>$strategy){
            $userStrategy = new UserStrategy();                
            $userStrategy->user_id = $cust_id;
            $userStrategy->strategy_id = $strategy["brief_id"];
            $userStrategy->save();
        }
        return redirect("/user-strategies");
    }
}
