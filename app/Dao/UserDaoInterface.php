<?php

namespace app\Dao;

use app\Http\Models\User;
use app\Http\Requests\AuthRequest;

interface UserDaoInterface
{
    public function find(AuthRequest $authRequest): User;

    public function findByToken($token);

    public function update(User $user): void;
}