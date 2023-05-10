<?php

namespace app\Dao;

use app\Http\Requests\CustomerRequest;

interface CustomerDaoInterface
{
    function findAll(): array;

    function insert(CustomerRequest $customerRequest): void;
}