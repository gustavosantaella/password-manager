<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function hashPassword(string $password){
        return Hash::make($password);
    }
}
