<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    use HasFactory;

    protected $fillable = [
        "description",
        "password",
        "container_id",
    ];

    protected $casts = [
        'password' => 'hashed',

    ];


}