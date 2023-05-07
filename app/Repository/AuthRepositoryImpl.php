<?php

namespace app\Repository;

use app\Dao\implements\UserDaoImp;
use app\Http\Models\User;
use app\Http\Requests\AuthRequest;
use app\Services\AuthService;

class AuthRepositoryImpl implements AuthRepository
{
    private UserDaoImp $userDao;
    private AuthService $authService;
    public function __construct()
    {
        $this->userDao = new UserDaoImp();
        $this->authService = new AuthService();
    }

    // Return user with token and updated
    public function getUserByUsernameAndPassword(AuthRequest $authRequest): User
    {
        try {
            $user = $this->userDao->find($authRequest);
            $token = $this->authService->generateTokenJWT($user);
            $user->setToken($token);
            $this->userDao->update($user);
            return $user;
        } catch (\PDOException $e) {
            error_log('not found user '.$e);
            return new User();
        }
    }

    public function getUserByToken($token): User
    {
        return $this->userDao->findByToken($token);
    }

    public function updateTokenUserById($id,$token): void
    {
        $this->updateTokenUserById($id, $token);
    }
}