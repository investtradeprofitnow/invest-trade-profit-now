<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function store(Request $request)  
    {

        if($files=$request->file('image')){  
            $name=$files->getClientOriginalName();  
            $files->move('strategy/short',$name);  
            dd($request->name);
        }
    }  
}
