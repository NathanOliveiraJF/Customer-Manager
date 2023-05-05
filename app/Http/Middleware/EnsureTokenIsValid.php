<?php

namespace app\Http\Middleware;

use app\Repository\AuthRepository;

class EnsureTokenIsValid
{
    private $authRepository;
    public function __construct()
    {
        $this->authRepository = new AuthRepository();
    }

    public function handle($request): void
    {
       $user = $this->authRepository->getUserByToken($request['token']);

       if(!$user) {
           require_once './resources/views/home.php';
           exit;
       }
    }
}