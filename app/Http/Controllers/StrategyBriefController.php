<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\StrategyBrief;

class StrategyBriefController extends Controller
{
    public function addStrategy(){
        if((new AdminController)->checkSession()){
            return view('admin.strategy-brief.add-strategy');
        }
        else{
            return view('admin.login');
        }
    }

    public function editStrategy($id){
        if((new AdminController)->checkSession()){
            $strategy = StrategyBrief::find($id);
            return view('admin.strategy-brief.edit-strategy',['strategy'=>$strategy]);
        }
        else{
            return view('admin.login');
        }
    }

    public function saveStrategy(Request $request){   
        $user = Session::get("email");
        if($files=$request->file('video')){  
            $fileName=$files->getClientOriginalName();  
            $files->move('strategy/brief',$fileName);  
            $strategy = new StrategyBrief();
            $strategy->name = request('name');
            $strategy->description = request('desc');
            $strategy->type = request('type');
            $strategy->video = $fileName;
            $strategy->created_by = $user;
            $strategy->updated_by = $user;
            $strategy->save();
        }
        $strategies=StrategyBrief::all()->sortBy("updated_at");
        return view('admin.strategy-brief.strategy-list',['strategies'=>$strategies]);
    }

    public function updateStrategy(Request $request){   
        $user = Session::get("email");
        $id=request('id');
        $strategy = StrategyBrief::find($id);
        $strategy->name = request('name');
        $strategy->description = request('desc');
        $strategy->type = request('type');
        $strategy->updated_by = $user;
        if($files=$request->file('video')){
            $fileName=$files->getClientOriginalName();  
            $files->move('strategy/brief',$fileName);
            $strategy->video = $fileName;
            $strategy->update();            
        }
        else{
            $strategy->update();
        }
        $strategies=StrategyBrief::all()->sortBy("updated_at");
        return view('admin.strategy-brief.strategy-list',['strategies'=>$strategies]);
    }

    public function deleteStrategy($id){
        $strategy = StrategyBrief::find($id);
        $strategy->delete();
        $strategies=StrategyBrief::all()->sortBy("updated_at");
        return view('admin.strategy-brief.strategy-list',['strategies'=>$strategies]);
    }
}
