<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\Refunds;

class RefundsController extends Controller
{
    public function updateRefundStatus($id,$status){
        $refund = Refunds::find($id);
        $refund->status=$status;
        $refund->updated_at=Carbon::now();
        $refund->update();
        return redirect()->back();
    }
}
