<?php

namespace TestMVC\Core\Databases;


use TestMVC\Core\Logger;

class MySQLDatabase implements IDatabase
{
    private $dbConnection;
    private $dbName;
    private $host;

    public function __construct($dbName, $host)
    {
        $this->dbName = $dbName;
        $this->host = $host;
    }

    public function openConnection($user, $password)
    {
        try
        {
            $this->dbConnection = new \PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName, $user, $password);
        }
        catch(\PDOException $e)
        {
            echo $e->errorInfo;
            Logger::logError(42);
        }
        if(!isset($this->dbConnection))
        print_r($this->dbConnection);
    }
    public function closeConnection()
    {
        if(!isset($this->dbConnection))
        {
            Logger::logError(43);
            return;
        }
        $this->dbConnection = null;
    }
}