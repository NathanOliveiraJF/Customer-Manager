<?php

namespace app\Http\Middleware;

use app\Http\Models\User;
use app\Repository\AuthRepositoryImpl;

class EnsureTokenIsValid
{
    private $authRepository;
    public function __construct()
    {
        $this->authRepository = new AuthRepositoryImpl();
    }

    public function handle(string $token): User
    {
        try {
            return $this->authRepository->getUserByToken($token);
        } catch (\PDOException $e) {
            error_log('user not found '.$e);
            return new User();
        }
    }
}