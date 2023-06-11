<?php

namespace app\Repository;

use app\Http\Models\User;
use app\Http\Requests\CustomerRequest;

interface CustomerRepository
{
    function getAll(): array;
    function getById($id): CustomerRequest;
    function create(CustomerRequest $customerRequest): void;
}