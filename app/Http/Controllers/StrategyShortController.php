<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StrategyShort;

class StrategyShortController extends Controller
{
    public function addStrategy(){
        return view('admin.strategy-short.add-strategy');
    }

    public function editStrategy(){
        $data = new StrategyShort();
        $data->id = request('id');
        $data->name = request('name');
        $data->description = request('desc');
        $data->video = request('video');
        return view('admin.strategy-short.edit-strategy',['strategy'=>$data]);
    }

    public function saveStrategy(Request $request){
        if($files=$request->file('video')){  
            $fileName=$files->getClientOriginalName();  
            $files->move('strategy/short',$fileName);  
            $strategy = new StrategyShort();
            $strategy->name = request('name');
            $strategy->description = request('desc');
            $strategy->type = request('type');
            $strategy->video = $fileName;
            $strategy->created_by = 'sddmsinvesttradeprofitnow@gmail.com';
            $strategy->updated_by = 'sddmsinvesttradeprofitnow@gmail.com';
            $strategy->save();
        }
        $strategies=StrategyShort::all()->sortBy("updated_at");
        return view('admin.strategy-short.strategy-list',['strategies'=>$strategies]);
    }

    public function updateStrategy(Request $request){
        $id=request('id');
        $strategy = StrategyShort::find($id);
        $strategy->name = request('name');
        $strategy->description = request('desc');
        $strategy->type = request('type');
        $strategy->updated_by = 'sddmsinvesttradeprofitnow@gmail.com';
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

    public function deleteStrategy(){
        $id=request('strategy-id');
        $strategy = StrategyShort::find($id);
        $strategy->delete();
        $strategies=StrategyShort::all()->sortBy("updated_at");
        return view('admin.strategy-short.strategy-list',['strategies'=>$strategies]);
    }
}
