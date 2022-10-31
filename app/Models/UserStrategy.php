<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStrategy extends Model
{
    protected $table="user_strategy";
    protected $primaryKey = "user_strategy_id";
    use HasFactory;
}
