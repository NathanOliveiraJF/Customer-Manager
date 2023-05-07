<?php

namespace app\Services;

use app\Http\Models\User;
use app\Http\Requests\AuthRequest;
use app\Repository\AuthRepositoryImpl;
use Firebase\JWT\JWT;

class AuthService
{
    public function generateTokenJWT(User $user): string
    {
        $key = 'example_key';
        $id = $user->getId();
        $expire_claim = time() * 60;
        $payload = [
            'sub' => 'localhost',
            'iss' =>  $id ,
            'username' => $user->getUsername(),
            'iat' => time(),
            'exp' => $expire_claim,
        ];
       return JWT::encode($payload, $key, 'HS256');
//        $this->authRepository->updateTokenUserById($id, $token);
//        return array("token" => $token, "expireAt" => $expire_claim);
    }
}