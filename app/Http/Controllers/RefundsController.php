<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\Refunds;

use App\Mail\RefundProcessMail;
use App\Mail\RefundCloseMail;

class RefundsController extends Controller
{
    public function updateRefundStatus($id,$status){
        $refund = Refunds::find($id);
        $email = $refund->email;
        $refundAmount = $refund->amount;
        $name = Customers::where("email",$email)->first()->value("name");
        $refund->status=$status;
        $refund->updated_at=Carbon::now();
        $refund->update();
        if($status=="Refund Processed"){
            Mail::to($email)->send(new RefundProcessMail($name, $refundAmount, str_pad($refund->refund_id,8,"0",STR_PAD_LEFT)));
        }
        else{
            Mail::to($email)->send(new RefundCloseMail($name, $refundAmount, str_pad($refund->refund_id,8,"0",STR_PAD_LEFT)));
        }
        return redirect()->back();
    }
}
