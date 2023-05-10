<?php

namespace app\Repository;

use app\Http\Requests\CustomerRequest;

interface CustomerRepository
{
    function getAll(): array;
    function create(CustomerRequest $customerRequest): void;
}