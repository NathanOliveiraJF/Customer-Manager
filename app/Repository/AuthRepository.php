<?php

namespace app\Repository;

use app\Http\Models\User;
use app\Http\Requests\AuthRequest;

interface AuthRepository
{
    public function getUserByUsernameAndPassword(AuthRequest $authRequest): User;

    public function getUserByToken($token): User;

    public function updateTokenUserById($id,$token): void;
}