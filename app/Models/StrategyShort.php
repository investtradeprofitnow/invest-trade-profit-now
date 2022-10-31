<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrategyShort extends Model
{
    protected $table="strategy_short";
    protected $primaryKey = "strategy_short_id";
    use HasFactory;
}
