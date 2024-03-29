<?php

namespace app\Repository;


use app\Dao\implements\CustomerDaoImp;
use app\Http\Models\Customer;
use app\Http\Models\User;
use app\Http\Requests\CustomerRequest;

class CustomerRepositoryImp implements CustomerRepository
{
    private CustomerDaoImp $customerDaoImp;

    public function __construct()
    {
        $this->customerDaoImp = new CustomerDaoImp();
    }

    public function getAll(): array
    {
        return $this->customerDaoImp->findAll();
    }
    function getById($id): CustomerRequest
    {
        return $this->customerDaoImp->findById($id);
    }
    function create(CustomerRequest $customerRequest): void
    {
        $this->customerDaoImp->insert($customerRequest);
    }
}