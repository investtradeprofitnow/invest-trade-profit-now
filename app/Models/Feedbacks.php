<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    protected $table="feedbacks";
    protected $primaryKey = "feedback_id";
    use HasFactory;
}
