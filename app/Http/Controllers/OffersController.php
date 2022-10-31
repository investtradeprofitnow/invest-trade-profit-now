<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Offers;
use App\Models\OfferSubscribers;
use App\Models\StrategyShort;

class OffersController extends Controller
{
    public function addOffer(){
        if((new AdminController)->checkAdminSession()){
            $existStrategies = Offers::pluck("strategy_id");
            $strategies = StrategyShort::whereNotIn("strategy_short_id",$existStrategies)->get();
            return view("admin.offers.add-offer",["strategies"=>$strategies]);
        }
        else{
            return redirect("/admin/login");
        }
    }

    public function saveOffer(Request $request){
        if((new AdminController)->checkAdminSession()){
            $this->validate($request, [
                "strategy_id" => "required|numeric",
                "strategy_name" => "required",
                "desc" => "required",
                "subscribers" => "required|numeric|max:1000000",
                "discount" => "required|numeric",
                "type" => "required|in:percent,rupees"
            ]);
            $offer = new Offers();
            $offer->strategy_id = request("strategy_id");
            $offer->strategy_name = request("strategy_name");
            $offer->description = request("desc");
            $offer->subscribers = request("subscribers");
            $offer->discount = request("discount");
            $offer->type = request("type");
            $offer->save();
            $offerSubscriber = new OfferSubscribers();
            $offerSubscriber->offer_id = $offer->offer_id;
            $offerSubscriber->subscribers = request("subscribers");
            $offerSubscriber->save();
            return redirect("/admin/offers");
        }
        else{
            return redirect("/admin/login");
        }
    }

    public function editOffer($id){
        if((new AdminController)->checkAdminSession()){
            $offer = Offers::find($id);
            $strategies = StrategyShort::all();
            return view("admin.offers.edit-offer",["offer"=>$offer],["strategies"=>$strategies]);
        }
        else{
            return redirect("/admin/login");
        }
    }

    public function updateOffer(Request $request){
        if((new AdminController)->checkAdminSession()){
            $this->validate($request, [
                "id" => "required|numeric",
                "strategy_id" => "required|numeric",
                "strategy_name" => "required",
                "desc" => "required",
                "subscribers" => "required|numeric|max:1000000",
                "discount" => "required|numeric",
                "type" => "required|in:percent,rupees"
            ]);
            $id = request("id");
            $offer = Offers::find($id);
            $offer->strategy_id = request("strategy_id");
            $offer->strategy_name = request("strategy_name");
            $offer->description = request("desc");
            $offer->subscribers = request("subscribers");
            $offer->discount = request("discount");
            $offer->type = request("type");
            $offer->update();
            return redirect("/admin/offers");
        }
        else{
            return redirect("/admin/login");
        }
        
    }

    public function deleteOffer($id){
        $strategy = Offers::find($id);
        $strategy->delete();
        return redirect("/admin/offers");
    }
}
