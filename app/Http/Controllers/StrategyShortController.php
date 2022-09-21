<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\StrategyShort;
use App\Models\StrategyBrief;

class StrategyShortController extends Controller
{
    public function addStrategy(){
        if((new AdminController)->checkAdminSession()){
            $existStrategies = StrategyShort::pluck("strategy_brief_id");
            $strategies = StrategyBrief::whereNotIn("id",$existStrategies)->get();
            if(count($strategies)>0){
                return view("admin.strategy-short.add-strategy",["brief"=>$strategies]);
            }
            else{
                return redirect()->back()->with("error","All the Brief Strategies have been linked.");
            }
        }
        else{
            return redirect("/admin/login");
        }
    }

    public function saveStrategy(Request $request){   
        $this->validate($request, [
            "name" => "required|max:50",
            "description" => "required",
            "price" => "required|numeric",
            "brief" => "required",
            "video" => "required"
        ]);
        $email = Session::get("email");
        if($files=$request->file("video")){  
            $fileName=$files->getClientOriginalName();  
            $files->move("strategy/short",$fileName);
            $idType = explode(" ",request("brief"));
            $strategy = new StrategyShort();
            $strategy->name = request("name");
            $strategy->description = request("description");
            $strategy->type = $idType[1];
            $strategy->price = request("price");
            $strategy->strategy_brief_id = $idType[0];
            $strategy->video = $fileName;
            $strategy->created_by = $email;
            $strategy->updated_by = $email;
            $strategy->save();
            return redirect("/admin/strategy-short");
        }
    }

    public function editStrategy($id){
        if((new AdminController)->checkAdminSession()){
            $strategy = StrategyShort::find($id);
            $strategies=StrategyBrief::all();
            return view("admin.strategy-short.edit-strategy",["strategy"=>$strategy],["brief"=>$strategies]);
        }
        else{
            return redirect("/admin/login");
        }
    }

    public function updateStrategy(Request $request){      
        $this->validate($request, [
            "id" => "required|numeric",
            "name" => "required|max:50",
            "description" => "required",
            "price" => "required|numeric",
            "brief" => "required",
        ]);
        $email = Session::get("email");
        $id=request("id");
        $strategy = StrategyShort::find($id);
        $idType = explode(" ",request("brief"));
        $strategy->name = request("name");
        $strategy->description = request("description");
        $strategy->type = $idType[1];
        $strategy->price = request("price");
        $strategy->strategy_brief_id = $idType[0];
        $strategy->updated_by = $email;
        if($files=$request->file("video")){
            $fileName=$files->getClientOriginalName();  
            $files->move("strategy/short",$fileName);
            $strategy->video = $fileName;
            $strategy->update();            
        }
        else{
            $strategy->update();
        }
        return redirect("/admin/strategy-short");
    }

    public function deleteStrategy($id){
        $strategy = StrategyShort::find($id);
        $strategy->delete();
        return redirect("/admin/strategy-short");
    }
}
