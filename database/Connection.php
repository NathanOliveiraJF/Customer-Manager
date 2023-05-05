<?php
namespace database;
use PDO;
use PDOException;

class Connection
{
    private PDO $connection;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=Jwt_log';
        $user = '';
        $password = '';
        try {
            $this->connection = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function getConnection(): PDO
    {
        return $this->connection;
    }
}