<?php

namespace App\Http\Controllers\Api;

use App\Models\Container;
use App\Services\ContainerService;
use GuzzleHttp\Psr7\Request;

class ContainerController
{
    function __construct(
        private ContainerService $containerService
    ) { }

    public function create(Request $request) {
        $user = auth("api")->user();

        
    }
}
