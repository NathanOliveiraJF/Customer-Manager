<?php

use app\Http\Controllers\CustomerController;
use Pecee\SimpleRouter\SimpleRouter;
use app\Http\Controllers\Authentication;

SimpleRouter::get('/', [Authentication::class, 'view']);
SimpleRouter::get('/login', [Authentication::class, 'view']);
SimpleRouter::post('/login', [Authentication::class, 'auth']);

SimpleRouter::get('/customers', [CustomerController::class, 'viewCustomers']);

