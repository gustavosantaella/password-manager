<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\Providers\Auth;

class AuthService
{
    public function hashPassword(string $password)
    {
        return Hash::make($password);
    }

    public function login(User $user, $password)
    {

        (string) $email = $user->email;
        (string) $passwordHashed = $user->password;

        if (!Hash::check($password, $passwordHashed)) {
            throw new Exception("Invalid credentials");
        }
        unset($passwordHashed);

        $token = auth("api")->attempt([
            "email" => $email,
            "password" => $password
        ]);
        if (!$token) {
            throw new Exception("Invalid login");
        }

        return $token;
    }
}
