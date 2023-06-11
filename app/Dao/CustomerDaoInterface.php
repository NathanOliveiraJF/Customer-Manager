<?php

namespace app\Dao;

use app\Http\Models\User;
use app\Http\Requests\CustomerRequest;

interface CustomerDaoInterface
{
    function findAll(): array;
    public function findById($id): CustomerRequest;

    function insert(CustomerRequest $customerRequest): void;
}