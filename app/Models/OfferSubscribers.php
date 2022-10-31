<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferSubscribers extends Model
{
    protected $table="offer_subscribers";
    protected $primaryKey = "offer_subscriber_id";
    use HasFactory;
}
