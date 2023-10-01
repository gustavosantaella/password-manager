<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Response;
use App\Services\RsaService;

class RsaController
{

    public function __construct(
        private  RsaService $service
    ){ }

    public function generate(){

        return Response::http(true, 201);
    }

}
