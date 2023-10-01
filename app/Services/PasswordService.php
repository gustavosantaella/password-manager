<?php

namespace App\Services;

use App\Dto\RsaDTO;
use App\Models\Password;
use App\Models\Rsa;
use App\Models\User;
use Illuminate\Auth\Authenticatable;

class PasswordService
{
    public function create(array $data, ?User $user): Password {


        return Password::create(
            [
                "description" => $data["description"],
                "password" => $data["password"],
                "username" => $data['username'],
                "created_by" => $user->id,
            ]
        );
    }
}
