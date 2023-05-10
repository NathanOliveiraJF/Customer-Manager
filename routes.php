<?php

use Pecee\SimpleRouter\SimpleRouter;
use app\Http\Controllers\CustomerController;
use app\Http\Controllers\Authentication;

SimpleRouter::get('/', [Authentication::class, 'view'])->name('user.login');
SimpleRouter::get('/login', [Authentication::class, 'view'])->name('user.login');
SimpleRouter::post('/login', [Authentication::class, 'auth'])->name('user.auth');

SimpleRouter::group(['middleware' => \app\Http\Middleware\EnsureTokenIsValid::class], function () {
    SimpleRouter::get('/customers', [CustomerController::class, 'viewCustomers'])->name('customers.index');
    SimpleRouter::get('/customers/create', [CustomerController::class, 'viewNewCustomer'])->name('customers.create');
    SimpleRouter::post('/customers', [CustomerController::class, 'postCustomer'])->name('customers.store');
});