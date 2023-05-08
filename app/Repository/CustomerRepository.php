<?php

namespace app\Repository;


use app\Dao\implements\CustomerDaoImp;
use app\Http\Models\Customer;

class CustomerRepository
{
    private CustomerDaoImp $customerDaoImp;

    public function __construct()
    {
        $this->customerDaoImp = new CustomerDaoImp();
    }

    public function getAllCustomers(): array
    {
        return $this->customerDaoImp->findAll();
    }
}