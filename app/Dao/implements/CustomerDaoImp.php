<?php

namespace app\Dao\implements;

use app\Dao\CustomerDaoInterface;
use app\Http\Models\Customer;
use app\Http\Models\User;
use app\Http\Requests\CustomerRequest;
use database\Connection;
use PDO;

class CustomerDaoImp implements CustomerDaoInterface
{

    private Connection $connection;
    public function __construct()
    {
        $this->connection = new Connection();
    }

    function findAll(): array
    {
        $sql = "SELECT * FROM customers";
        $stmt = $this->connection->getConnection()->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Customer::class);
        $customers = $stmt->fetchAll();
        if(!$customers) {
            throw new \PDOException();
        }
        return $customers;
    }

    function insert(CustomerRequest $customerRequest): void
    {
        $sql = "INSERT INTO customers (name, lastname, birth) VALUES (?, ?, ?)";
        $stmt = $this->connection->getConnection()->prepare($sql);
        $stmt->bindValue(1, $customerRequest->username);
        $stmt->bindValue(2, $customerRequest->lastname);
        $stmt->bindValue(3, $customerRequest->birth);
        try {
            $stmt->execute();
        } catch (\PDOException $exception) {
            error_log("Error create user ".$exception);
        }
    }
}