<?php

namespace app\Http\Controllers;

use app\Http\Requests\AuthRequest;
use app\Repository\AuthRepositoryImpl;
use app\Services\AuthService;
use Twig\Environment;

class Authentication
{
    private AuthService $authService;

    private AuthRepositoryImpl $authRepositoryImpl;
    public function __construct()
    {
        $this->authService = new AuthService();
        $this->authRepositoryImpl = new AuthRepositoryImpl();
    }

    /**
     * @return void
     */
    public function view(): void
    {
        require_once './resources/views/authentication.php';
        exit;
    }

    /**
     * @return void
     */
    public function auth(): void
    {
        $user = $this->authRepositoryImpl->getUserByUsernameAndPassword(new AuthRequest(input('username'), input('password')));
        if(empty($user->getId()))
        {
            $_REQUEST['failureMessage'] = 'username or password invalid!';
            response()->redirect('/login');
            return;
        }
        $_SESSION['user'] = $user;
        response()->redirect('/customers');
    }
}