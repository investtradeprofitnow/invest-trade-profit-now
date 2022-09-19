<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table="orders";
    protected $casts=["strategy_name"=>"array"];
    use HasFactory;
}
