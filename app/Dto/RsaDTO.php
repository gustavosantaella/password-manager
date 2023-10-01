<?php

namespace App\Dto;
use App\Helpers\Arrays;

final class RsaDTO
{
    use Arrays;
    private string $publicKey;
    private string $privateKey;

    public function __construct($privateKey, $publicKey){
        $this->publicKey = $publicKey;
        $this->privateKey = $privateKey;
    }

    public  function  getPrivateKey(){
        return $this->privateKey;
     }

     public  function  getPublicKey(){
        return $this->publicKey;
     }


}
