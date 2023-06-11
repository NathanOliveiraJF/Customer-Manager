<?php

namespace app\Http\Controllers;

use app\Http\Middleware\EnsureTokenIsValid;
use app\Http\Models\User;
use app\Http\Requests\CustomerRequest;
use app\Repository\CustomerRepositoryImp;
use http\Params;
use JetBrains\PhpStorm\NoReturn;

class CustomerController
{
    private CustomerRepositoryImp $customerRepository;

    public function __construct()
    {
        $this->customerRepository = new CustomerRepositoryImp();
    }

    /**
     * @return void
     */
    public function viewCustomers(): void
    {
        $_REQUEST['customers'] = $this->customerRepository->getAll();
        require_once "./resources/views/customers/index.php";
        exit;
    }

    public function viewNewCustomer(): void
    {
        require_once "./resources/views/customers/create.php";
        exit;
    }

    public function postCustomer(): void
    {
        var_dump(input()->all());
        $this->customerRepository->create(new CustomerRequest(input('username'), input('lastname'), input('birth')));
        redirect('/customers');
    }

    public function viewCustomerEdit($request): void
    {
        $_REQUEST['user'] = $this->customerRepository->getById($request);
        require_once "./resources/views/customers/edit.php";
        exit;
    }
}