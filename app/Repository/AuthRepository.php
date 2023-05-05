<?php

namespace app\Repository;

use app\Http\Requests\AuthRequest;
use database\Connection;

class AuthRepository
{
    private Connection $connection;
    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function getUser(AuthRequest $authRequest)
    {
        $sql = "SELECT * FROM login WHERE username = :user AND password = :pass";
        $stmt = $this->connection->getConnection()->prepare($sql);
        $stmt->execute([
            ':user' => $authRequest->username,
            ':pass' => $authRequest->password
        ]);
        return $stmt->fetch();
    }

    public function getUserByToken($token)
    {
        $sql = "SELECT * FROM login WHERE token = :token";
        $stmt = $this->connection->getConnection()->prepare($sql);
        $stmt->execute([
            ':token' => $token
        ]);
        return $stmt->fetch();
    }

    public function updateTokenUserById($id,$token): void
    {
        $sql = "UPDATE login set token = :token where id = :id";
        $stmt = $this->connection->getConnection()->prepare($sql);
        $stmt->execute([
            ':token' => $token,
            ':id' => $id
        ]);
    }
}