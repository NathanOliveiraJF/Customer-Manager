<?php

namespace app\Services;

use app\Http\Requests\AuthRequest;
use app\Repository\AuthRepository;
use Firebase\JWT\JWT;

class AuthService
{
    private AuthRepository $authRepository;
    public function __construct()
    {
        $this->authRepository = new AuthRepository();
    }

    public function auth(AuthRequest $authRequest)
    {
        $user = $this->authRepository->getUser($authRequest);
        if (!$user) return $user;
        $key = 'example_key';
        $expire_claim = time() * 60;
        $payload = [
            'sub' => 'localhost',
            'iss' => $user['id'],
            'username' => $user['username'],
            'iat' => time(),
            'exp' => $expire_claim,
        ];
        $token = JWT::encode($payload, $key, 'HS256');
        $this->authRepository->updateTokenUserById($user['id'], $token);
        return array("token" => $token, "expireAt" => $expire_claim);
    }
}