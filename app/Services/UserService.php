<?php

namespace App\Services;

use App\Models\User;
use Exception;

class UserService
{

    public function findOneByEmail(string $email){
        $user = User::where("email", $email)->first();
        if(!$user){
            return new Exception("User not found");
        }

        return $user;
    }

    public function findById(string $id): User {
        return User::find($id)->first();
    }

    public function delteUserById(string $id): void {
        User::find($id)->first()->delete();
    }


}
