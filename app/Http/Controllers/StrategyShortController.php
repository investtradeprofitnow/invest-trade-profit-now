<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\StrategyShort;
use App\Models\StrategyBrief;
use App\Models\Offers;
use App\Models\OfferSubscribers;

class StrategyShortController extends Controller
{
    public function addStrategy(){
        if((new AdminController)->checkAdminSession()){
            return view("admin.strategy-short.add-strategy");
        }
        else{
            return redirect("/admin/login");
        }
    }

    public function saveStrategy(Request $request){   
        $this->validate($request, [
            "name" => "required|max:50",
            "description" => "required",
            "link" => "required"
        ]);
        $email = Session::get("email");
        $strategy = new StrategyShort();
        $strategy->name = request("name");
        $strategy->description = request("description");
        $strategy->type = request("type");
        $strategy->link = request("link");
        $strategy->created_by = $email;
        $strategy->updated_by = $email;    
        $strategy->save();
        return redirect("/admin/strategy-short");
    }

    public function editStrategy($id){
        if((new AdminController)->checkAdminSession()){
            $strategy = StrategyShort::find($id);
            return view("admin.strategy-short.edit-strategy");
        }
        else{
            return redirect("/admin/login");
        }
    }

    public function updateStrategy(Request $request){      
        $this->validate($request, [
            "name" => "required|max:50",
            "description" => "required",
            "link" => "required"
        ]);
        $email = Session::get("email");
        $id=request("id");
        $strategy = StrategyShort::find($id);
        $strategy->name = request("name");
        $strategy->description = request("description");
        $strategy->type = request("type");
        $strategy->link = request("link");
        $strategy->updated_by = $email;
        $strategy->updated_at = Carbon::now();
        $strategy->update();
        return redirect("/admin/strategy-short");
    }

    public function deleteStrategy($id){
        $offer = Offers::where("strategy_id",$id)->first();
        if($offer!=null){
            OfferSubscribers::where("offer_id",$offer->offer_id)->first()->delete();
            $offer->delete();
        }        
        $strategy = StrategyShort::find($id)->delete();
        return redirect("/admin/strategy-short");
    }
}
