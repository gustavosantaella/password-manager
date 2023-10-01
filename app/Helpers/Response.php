<?php

namespace App\Helpers;

final class Response
{
    final public static function http(mixed $data, int $status, $error = null){
        return response([
            "status" => $status,
            "error" => null,
            "data"=> $data,
        ], $status);
    }
}
