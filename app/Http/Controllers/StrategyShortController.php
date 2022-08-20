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
        if((new AdminController)->checkSession()){
            $strategies=StrategyBrief::all();
            return view('admin.strategy-short.add-strategy',['brief'=>$strategies]);
        }
        else{
            return view('admin.login');
        }
    }

    public function editStrategy($id){
        if((new AdminController)->checkSession()){
            $strategy = StrategyShort::find($id);
            $strategies=StrategyBrief::all();
            return view('admin.strategy-short.edit-strategy',['strategy'=>$strategy],['brief'=>$strategies]);
        }
        else{
            return view('admin.login');
        }
    }

    public function saveStrategy(Request $request){   
        $user = Session::get("email");
        if($files=$request->file('video')){  
            $fileName=$files->getClientOriginalName();  
            $files->move('strategy/short',$fileName);  
            $strategy = new StrategyShort();
            $strategy->name = request('name');
            $strategy->description = request('desc');
            $strategy->type = request('type');
            $strategy->price = request('price');
            $strategy->strategy_brief_id = request('brief');
            $strategy->video = $fileName;
            $strategy->created_by = $user;
            $strategy->updated_by = $user;
            $strategy->save();
        }
        $strategies=StrategyShort::all()->sortBy("updated_at");
        return view('admin.strategy-short.strategy-list',['strategies'=>$strategies]);
    }

    public function updateStrategy(Request $request){   
        $user = Session::get("email");
        $id=request('id');
        $strategy = StrategyShort::find($id);
        $strategy->name = request('name');
        $strategy->description = request('desc');
        $strategy->type = request('type');
        $strategy->price = request('price');
        $strategy->strategy_brief_id = request('brief');
        $strategy->updated_by = $user;
        if($files=$request->file('video')){
            $fileName=$files->getClientOriginalName();  
            $files->move('strategy/short',$fileName);
            $strategy->video = $fileName;
            $strategy->update();            
        }
        else{
            $strategy->update();
        }
        $strategies=StrategyShort::all()->sortBy("updated_at");
        return view('admin.strategy-short.strategy-list',['strategies'=>$strategies]);
    }

    public function deleteStrategy($id){
        $strategy = StrategyShort::find($id);
        $strategy->delete();
        $strategies=StrategyShort::all()->sortBy("updated_at");
        return view('admin.strategy-short.strategy-list',['strategies'=>$strategies]);
    }
}
