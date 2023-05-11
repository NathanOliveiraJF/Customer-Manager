<?php

namespace app\Http\Controllers;

use app\Http\Requests\AuthRequest;
use app\Repository\AuthRepositoryImpl;
use app\Services\AuthService;
use Couchbase\AuthenticationException;
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
        try {
            $user = $this->authRepositoryImpl->authenticateUser(input("username"), input("username"));
            $_SESSION['user'] = $user;
            redirect("/customers");
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            $_SESSION["failureMessage"] = $e->getMessage();
            redirect("/login");
        }
    }
}