<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $table="offers";
    protected $primaryKey = "offer_id";
    use HasFactory;
}
