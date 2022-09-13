<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Offers;
use App\Models\StrategyShort;

class OffersController extends Controller
{
    public function addOffer(){
        if((new AdminController)->checkAdminSession()){
            $existStrategies = Offers::pluck("strategy_id");
            $strategies = StrategyShort::whereNotIn("id",$existStrategies)->get();
            return view('admin.offers.add-offer',['strategies'=>$strategies]);
        }
        else{
            return view('admin.login');
        }
    }

    public function saveOffer(){
        if((new AdminController)->checkAdminSession()){
            $offer = new Offers();
            $offer->strategy_id = request("strategy_id");
            $offer->strategy_name = request("strategy_name");
            $offer->description = request("desc");
            $offer->discount = request("discount");
            $offer->type = request("type");
            $offer->save();
            return redirect("/admin/offers");
        }
        else{
            return view('admin.login');
        }
    }

    public function editOffer($id){
        if((new AdminController)->checkAdminSession()){
            $offer = Offers::find($id);
            $strategies = StrategyShort::all();
            return view('admin.offers.edit-offer',['offer'=>$offer],['strategies'=>$strategies]);
        }
        else{
            return view('admin.login');
        }
    }

    public function updateOffer(){
        if((new AdminController)->checkAdminSession()){
            $id = request('id');
            $offer = Offers::find($id);
            $offer->strategy_id = request("strategy_id");
            $offer->strategy_name = request("strategy_name");
            $offer->description = request("desc");
            $offer->discount = request("discount");
            $offer->type = request("type");
            $offer->update();
            return redirect("/admin/offers");
        }
        else{
            return view('admin.login');
        }
        
    }

    public function deleteOffer($id){
        $strategy = Offers::find($id);
        $strategy->delete();
        return redirect("/admin/offers");
    }
}
