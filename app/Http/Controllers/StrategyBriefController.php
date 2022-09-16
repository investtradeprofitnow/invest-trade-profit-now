<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\StrategyBrief;

class StrategyBriefController extends Controller
{
    public function addStrategy(){
        if((new AdminController)->checkAdminSession()){
            return view('admin.strategy-brief.add-strategy');
        }
        else{
            return view('admin.login');
        }
    }

    public function editStrategy($id){
        if((new AdminController)->checkAdminSession()){
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
        return redirect("/admin/strategy-brief");
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
        return redirect("/admin/strategy-brief");
    }

    public function deleteStrategy($id){
        $strategy = StrategyBrief::find($id);
        $strategy->delete();
        return redirect("/admin/strategy-brief");
    }
}
