<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrategyBrief extends Model
{
    protected $table="strategy_brief";
    protected $primaryKey = "strategy_brief_id";
    use HasFactory;
}
