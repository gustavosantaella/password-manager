<?php

namespace App\Http\Controllers\Api;

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

        // $rsa = $this->rsaService->generateKeys();

        // $this->passwordService->create($rsa, $request->all());

    }
}
