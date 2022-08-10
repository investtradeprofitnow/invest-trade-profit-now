<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StrategyBrief;

class StrategyBriefController extends Controller
{
    public function addStrategy(){
        return view('admin.strategy-brief.add-strategy');
    }

    public function editStrategy(){
        $data = new StrategyBrief();
        $data->id = request('id');
        $data->name = request('name');
        $data->description = request('desc');
        $data->video = request('video');
        return view('admin.strategy-brief.edit-strategy',['strategy'=>$data]);
    }

    public function saveStrategy(Request $request){
        if($files=$request->file('video')){  
            $fileName=$files->getClientOriginalName();  
            $files->move('strategy/brief',$fileName);  
            $strategy = new StrategyBrief();
            $strategy->name = request('name');
            $strategy->description = request('desc');
            $strategy->type = request('type');
            $strategy->video = $fileName;
            $strategy->created_by = 'sddmsinvesttradeprofitnow@gmail.com';
            $strategy->updated_by = 'sddmsinvesttradeprofitnow@gmail.com';
            $strategy->save();
        }
        $strategies=StrategyBrief::all()->sortBy("updated_at");
        return view('admin.strategy-brief.strategy-list',['strategies'=>$strategies]);
    }

    public function updateStrategy(Request $request){
        $id=request('id');
        $strategy = StrategyBrief::find($id);
        $strategy->name = request('name');
        $strategy->description = request('desc');
        $strategy->type = request('type');
        $strategy->updated_by = 'sddmsinvesttradeprofitnow@gmail.com';
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

    public function deleteStrategy(){
        $id=request('strategy-id');
        $strategy = StrategyBrief::find($id);
        $strategy->delete();
        $strategies=StrategyBrief::all()->sortBy("updated_at");
        return view('admin.strategy-brief.strategy-list',['strategies'=>$strategies]);
    }
}
