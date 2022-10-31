<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCoupon extends Model
{
    protected $table="user_coupon";
    protected $primaryKey = "user_coupon_id";
    use HasFactory;
}
