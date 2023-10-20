<?php

namespace App\Services;

use App\Models\Container;
use App\Models\User;

class ContainerService 
{
    public function create(array $data, ?User $user) : Container {
        return Container::create (
            [
                "name" => $data["name"],
                "description" => $data ["description"],
                "created_by" => $user->id
            ]
        );
    }
}