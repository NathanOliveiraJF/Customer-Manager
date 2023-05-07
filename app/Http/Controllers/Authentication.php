<?php

namespace app\Http\Controllers;

use app\Http\Requests\AuthRequest;
use app\Repository\AuthRepositoryImpl;
use app\Services\AuthService;

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
        $user = $this->authRepositoryImpl->getUserByUsernameAndPassword(new AuthRequest($_POST['username'], $_POST['password']));
        if(empty($user->getId()))
        {
            $_REQUEST['failureMessage'] = 'username or password invalid!';
            $this->view();
        }
        $_SESSION['user'] = $user;
        header('Location: http://localhost:8000/customers', true, 301);
    }
}