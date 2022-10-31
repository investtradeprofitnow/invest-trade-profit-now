<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    protected $table="reset_password";
    protected $primaryKey = "reset_password_id";
    use HasFactory;
}
