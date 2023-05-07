<?php

namespace app\Http\Controllers;

use app\Http\Middleware\EnsureTokenIsValid;
use app\Http\Models\User;
use JetBrains\PhpStorm\NoReturn;

class CustomerController
{
    private EnsureTokenIsValid $ensureTokenIsValid;
    public function __construct()
    {
        $this->ensureTokenIsValid = new EnsureTokenIsValid();
    }

    /**
     * @return void
     */
    public function viewCustomers(): void
    {
        if(!isset($_SESSION['user'])) {
            require_once './resources/views/home.php';
            exit;
        }
       $user = $this->ensureTokenIsValid->handle($_SESSION['user']->getToken());
       if(empty($user->getId()) ) {
        require_once './resources/views/home.php';
        exit;
       }
        require_once "./resources/views/customers/index.php";
        exit;
    }
}