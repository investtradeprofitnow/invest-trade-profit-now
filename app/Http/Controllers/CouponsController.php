<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Coupons;

class CouponsController extends Controller
{
    public function addCoupon(){
        if((new AdminController)->checkAdminSession()){
            return view("admin.coupons.add-coupon");
        }
        else{
            return redirect("/admin/home");
        }
    }

    public function saveCoupon(Request $request){
        if((new AdminController)->checkAdminSession()){
            $this->validate($request, [
                "code" => "required|alpha_num|max:20",
                "desc" => "required",
                "discount" => "required|numeric|max_digits:4",
                "type" => "required|in:percent,rupees"
            ]);
            $coupon = new Coupons();
            $coupon->code = strtoupper(request("code"));
            $coupon->description = request("desc");
            $coupon->discount = request("discount");
            $coupon->type = request("type");
            $coupon->save();
            return redirect("/admin/coupons");
        }
        else{
            return redirect("/admin/home");
        }
    }

    public function editCoupon($id){
        if((new AdminController)->checkAdminSession()){
            $coupon = Coupons::find($id);
            return view("admin.coupons.edit-coupon",["coupon"=>$coupon]);
        }
        else{
            return redirect("/admin/home");
        }
    }

    public function updateCoupon(Request $request){
        if((new AdminController)->checkAdminSession()){
            $this->validate($request, [
                "id" => "required|numeric",
                "code" => "required|alpha_num|max:20",
                "desc" => "required",
                "discount" => "required|numeric|max_digits:4",
                "type" => "required|in:percent,rupees"
            ]);
            $id = request("id");
            $coupon = Coupons::find($id);
            $coupon->code = request("code");
            $coupon->description = request("desc");
            $coupon->discount = request("discount");
            $coupon->type = request("type");
            $coupon->update();
            return redirect("/admin/coupons");
        }
        else{
            return redirect("/admin/home");
        }
    }

    public function deleteCoupon($id){
        $strategy = Coupons::find($id);
        $strategy->delete();
        return redirect("/admin/coupons");
    }
}
