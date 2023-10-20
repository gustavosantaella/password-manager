<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Response;
use App\Models\Password;
use App\Services\PasswordService;
use App\Services\RsaService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PassowrController
{
    public function __construct(
        private RsaService $rsaService,
        private PasswordService $passwordService,
    ) {
    }
    public function register(Request $request)
    {

        $user = auth("api")->user();
        $toEncrypt = $request->get("password");
        $dataEncrypted = $this->rsaService->encrypt(data: $toEncrypt);

        $this->passwordService->create([
            ...$request->all(),
            "password" => $dataEncrypted,
        ], $user);

        return Response::http(null, 201);
    }

    public function myPasswords()
    {
        $user = auth("api")->user();
        $data = $this->passwordService->getPasswordsByUser($user->id);
        return Response::http($data, 200);
    }

    public function myPassword(int $id)
    {
        $user = auth("api")->user();
        $data = $this->passwordService->getPasswordsByIdAnUser($user->id, $id);
        return Response::http($data, 200);
    }
}
