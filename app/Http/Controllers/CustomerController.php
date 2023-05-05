<?php

namespace app\Http\Controllers;

use app\Http\Middleware\EnsureTokenIsValid;
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
        $this->ensureTokenIsValid->handle(($_SESSION['user']));
        require_once "./resources/views/customers/index.php";
        exit;
    }
}