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
            return view("admin.login");
        }
    }

    public function saveCoupon(){
        if((new AdminController)->checkAdminSession()){
            $coupon = new Coupons();
            $coupon->code = request("code");
            $coupon->description = request("desc");
            $coupon->discount = request("discount");
            $coupon->type = request("type");
            $coupon->save();
            return redirect("/admin/coupons");
        }
        else{
            return view("admin.login");
        }
    }

    public function editCoupon($id){
        if((new AdminController)->checkAdminSession()){
            $coupon = Coupons::find($id);
            return view("admin.coupons.edit-coupon",["coupon"=>$coupon]);
        }
        else{
            return view("admin.login");
        }
    }

    public function updateCoupon(){
        if((new AdminController)->checkAdminSession()){
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
            return view("admin.login");
        }
    }

    public function deleteCoupon($id){
        $strategy = Coupons::find($id);
        $strategy->delete();
        return redirect("/admin/coupons");
    }
}
