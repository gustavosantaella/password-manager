<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rsa extends Model
{
    use HasFactory;

    protected $fillable = [
        "private_key",
        "public_key",
        "user_id",
    ];


}
