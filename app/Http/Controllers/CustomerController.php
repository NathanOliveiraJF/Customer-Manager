<?php

namespace app\Http\Controllers;

use app\Http\Middleware\EnsureTokenIsValid;
use app\Http\Models\User;
use JetBrains\PhpStorm\NoReturn;

class CustomerController
{
    /**
     * @return void
     */
    public function viewCustomers(): void
    {
        require_once "./resources/views/customers/index.php";
        exit;
    }
}