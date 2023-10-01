<?php

namespace App\Services;
use App\Dto\RsaDTO;
use App\Helpers\Log;
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

    public function encrypt(string $data): string{
        // $userId = auth("api")->user()->id;
        // $rsa = $this->getByUserId($userId);
        // $key = str(Crypt::decrypt($rsa->private_key))->trim();
        // $privateKey = PrivateKey::fromString($key);

        return Crypt::encrypt($data);
    }

    public function decrypt(string $dataEncrypted){
        // $userId = auth("api")->user()->id;
        // $rsa = $this->getByUserId($userId);
        // $key = str(Crypt::decrypt($rsa->public_key))->trim();
        // $publicKey = PublicKey::fromString($key);
        return Crypt::decrypt($dataEncrypted);
    }

    public function getByUserId($id): ?Rsa{
        return Rsa::where('user_id', $id)->first();
    }
}
