<?php

namespace app\Http\Controllers;

use app\Http\Requests\AuthRequest;
use app\Services\AuthService;

class Authentication
{
    private AuthService $authService;
    public function __construct()
    {
        $this->authService = new AuthService();
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
        $authRequest = new AuthRequest($_POST['username'], $_POST['password']);
        $user = $this->authService->auth($authRequest);
        if(!$user)
        {
            $_REQUEST['failureMessage'] = 'username or password invalid!';
            $this->view();
        }
        $_SESSION['user'] = $user;
        header('Location: http://localhost:8000/customers', true, 301);
    }
}