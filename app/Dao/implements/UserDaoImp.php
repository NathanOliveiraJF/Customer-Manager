<?php

namespace app\Dao\implements;

use app\Dao\UserDaoInterface;
use app\Http\Models\User;
use app\Http\Requests\AuthRequest;
use database\Connection;
use PDO;

class UserDaoImp implements UserDaoInterface
{
    private Connection $connection;
    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function find(AuthRequest $authRequest): User
    {
        $sql = "SELECT * FROM login WHERE username = :user AND password = :pass";
        $stmt = $this->connection->getConnection()->prepare($sql);
        $stmt->execute([
            ':user' => $authRequest->username,
            ':pass' => $authRequest->password
        ]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
        $user = $stmt->fetch();
        if(!$user) {
            throw new \PDOException();
        }
        return $user;
    }

    public function findByToken($token): User
    {
        $sql = "SELECT * FROM login WHERE token = :token";
        $stmt = $this->connection->getConnection()->prepare($sql);
        $stmt->execute([
            ':token' => $token
        ]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
        $user = $stmt->fetch();
        if(!$user) {
            throw new \PDOException();
        }
        return $user;
    }

    public function update(User $user): void
    {
        $sql = "UPDATE login set token = :token where id = :id";
        $stmt = $this->connection->getConnection()->prepare($sql);
        $stmt->execute([
            ':token' => $user->getToken(),
            ':id' => $user->getId()
        ]);
    }
}