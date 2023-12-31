<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Response;
use App\Services\PasswordService;
use App\Services\RsaService;
use Illuminate\Http\Request;

class PassowrController
{
    public function __construct(
        private RsaService $rsaService,
        private PasswordService $passwordService,
    ){}
    public function register(Request $request){

        $user = auth("api")->user();
        $toEncrypt = $request->get("password");
        $dataEncrypted = $this->rsaService->encrypt(data:$toEncrypt);

        $response = $this->passwordService->create([
            ...$request->all(),
            "password" => $dataEncrypted,
        ], $user);

        $decrypt = $this->rsaService->decrypt($response->password);
        return Response::http($decrypt, 201);
    }
}
