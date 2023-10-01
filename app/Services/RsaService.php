<?php

namespace App\Services;
use App\Dto\RsaDTO;
use App\Models\Rsa;
use Illuminate\Support\Facades\Crypt;
// TODO:  UNINSTALL THIS PACKAGE
// use phpseclib\Crypt\RSA;
use Spatie\Crypto\Rsa\KeyPair;
use Spatie\Crypto\Rsa\PrivateKey;
use Spatie\Crypto\Rsa\PublicKey;

class RsaService
{

    public function generateKeys($userId): RsaDTO {
        [$privateKey, $publicKey] = (new KeyPair())->generate();

        $dto = new RsaDTO($privateKey, $publicKey);
        Rsa::create([
            "private_key" => Crypt::encrypt($dto->getPrivateKey()),
            "public_key" => Crypt::encrypt($dto->getPublicKey()),
            "user_id" => $userId
        ]);
        return $dto;
    }

    public function encrypt(string $privateKey, string $data){
        $privateKey = PrivateKey::fromString($privateKey);

        return $privateKey->encrypt($data);
    }

    public function decrypt(string $publicKey, string $dataEncrypted){
        $publicKey = PublicKey::fromString($publicKey);

        return $publicKey->decrypt($dataEncrypted);
    }
}
