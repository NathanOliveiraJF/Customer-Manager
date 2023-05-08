<?php

namespace app\Http\Middleware;

use app\Repository\AuthRepositoryImpl;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class EnsureTokenIsValid implements IMiddleware
{
    private AuthRepositoryImpl $authRepository;
    public function __construct()
    {
        $this->authRepository = new AuthRepositoryImpl();
    }

    public function handle(Request $request): void
    {
        if(!isset($_SESSION['user'])) {
            $request->setRewriteUrl(url('user.login'));
            return;
        }
       $user =  $this->authRepository->getUserByToken($_SESSION['user']->getToken());
       if(empty($user->getId())) {
           $request->setRewriteUrl(url('user.login'));
       }
    }
}