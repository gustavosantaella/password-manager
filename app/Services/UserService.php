<?php

namespace App\Services;

use App\Models\User;
use Exception;

class UserService
{

    public function findOneByEmail(string $email): User {
        $user = User::where("email", $email)->first();
        return $user;
    }

    public function findById(string $id): User {
        return User::find($id)->first();
    }

    public function delteUserById(string $id): void {
        User::find($id)->first()->delete();
    }

    public function newUser($data){
        return User::create($data);
    }




}
