<?php

namespace app\Repository;

use app\Dao\implements\UserDaoImp;
use app\Http\Models\User;
use app\Http\Requests\AuthRequest;
use app\Services\AuthService;
use Couchbase\AuthenticationException;

class AuthRepositoryImpl implements AuthRepository
{
    private UserDaoImp $userDao;
    private AuthService $authService;
    public function __construct()
    {
        $this->userDao = new UserDaoImp();
        $this->authService = new AuthService();
    }

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

    /**
     * @throws \Exception
     */
    public function authenticateUser(string $username, string $password): User
    {
        $user = $this->getUserByUsernameAndPassword(new AuthRequest(input('username'), input('password')));
        if(empty($user->getId())) {
            throw new \Exception("Invalid username or password!");
        }
        return $user;
    }
}