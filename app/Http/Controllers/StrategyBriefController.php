<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\StrategyShort;
use App\Models\StrategyBrief;

class StrategyBriefController extends Controller
{
    public function addStrategy(){
        if((new AdminController)->checkAdminSession()){
            return view("admin.strategy-brief.add-strategy");
        }
        else{
            return redirect("/admin/login");
        }
    }

    public function editStrategy($id){
        if((new AdminController)->checkAdminSession()){
            $strategy = StrategyBrief::find($id);
            return view("admin.strategy-brief.edit-strategy",["strategy"=>$strategy]);
        }
        else{
            return redirect("/admin/login");
        }
    }

    public function saveStrategy(Request $request){
        $this->validate($request, [
            "name" => "required|max:50",
            "description" => "required",
            "type" => "required|in:Intraday,BTST,Positional,Investment",
            "video" => "required"
        ]);
        $email = Session::get("email");
        if($files=$request->file("video")){  
            $fileName=$files->getClientOriginalName();  
            $files->move("strategy/brief",$fileName);  
            $strategy = new StrategyBrief();
            $strategy->name = request("name");
            $strategy->description = request("description");
            $strategy->type = request("type");
            $strategy->video = $fileName;
            $strategy->created_by = $email;
            $strategy->updated_by = $email;
            $strategy->save();
            return redirect("/admin/strategy-brief");
        }
    }

    public function updateStrategy(Request $request){
        $this->validate($request, [
            "id" => "required|numeric",
            "name" => "required|max:50",
            "description" => "required",
            "type" => "required|in:Intraday,BTST,Positional,Investment",
        ]);
        $email = Session::get("email");
        $id=request("id");
        $strategy = StrategyBrief::find($id);
        $strategy->name = request("name");
        $strategy->description = request("description");
        $strategy->type = request("type");
        $strategy->updated_by = $email;
        if($files=$request->file("video")){
            $fileName=$files->getClientOriginalName();  
            $files->move("strategy/brief",$fileName);
            $strategy->video = $fileName;
            $strategy->update();            
        }
        else{
            $strategy->update();
        }
        return redirect("/admin/strategy-brief");
    }

    public function deleteStrategy($id){
        $strategyShort = StrategyShort::where("strategy_brief_id",$id)->first();
        if($strategyShort!=null)
        {
            $strategyShort->delete();
        }
        $strategy = StrategyBrief::find($id);
        $strategy->delete();
        return redirect("/admin/strategy-brief");
    }
}
