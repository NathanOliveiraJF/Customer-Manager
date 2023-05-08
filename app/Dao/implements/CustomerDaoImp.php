<?php

namespace app\Dao\implements;

use app\Dao\CustomerDaoInterface;
use app\Http\Models\Customer;
use app\Http\Models\User;
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
}