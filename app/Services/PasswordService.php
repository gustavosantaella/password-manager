<?php

namespace App\Services;

use App\Dto\RsaDTO;
use App\Models\Password;
use App\Models\Rsa;
use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Collection;

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

    public function getPasswordsByUser(int $id): Collection {
        return Password::where("created_by", $id)->get();
    }

    public function getPasswordsByIdAnUser($userId, $id): Collection {
        return Password::where("id", $id)->where("created_by", $userId)->get();
    }
}
