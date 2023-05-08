<?php

namespace app\Http\Controllers;

use app\Http\Middleware\EnsureTokenIsValid;
use app\Http\Models\User;
use app\Repository\CustomerRepository;
use JetBrains\PhpStorm\NoReturn;

class CustomerController
{
    private CustomerRepository $customerRepository;

    public function __construct()
    {
        $this->customerRepository = new CustomerRepository();
    }

    /**
     * @return void
     */
    public function viewCustomers(): void
    {
        $_REQUEST['customers'] = $this->customerRepository->getAllCustomers();
        require_once "./resources/views/customers/index.php";
        exit;
    }
}