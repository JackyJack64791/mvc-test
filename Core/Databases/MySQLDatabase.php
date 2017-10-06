<?php declare(strict_types=1);

namespace TestMVC\Core\Databases;


use TestMVC\Core\Logger;

class MySQLDatabase extends IDatabase
{
    public $dbConnection;
    private $dbName;
    private $host;
    private $isConnected = false;

    public function __construct(string $dbName, string $host)
    {
        $this->dbName = $dbName;
        $this->host = $host;
    }

    public function open_connection(string $user, string $password)
    {
        try
        {
            $this->dbConnection = new \PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName, $user, $password);
            $this->isConnected = true;
        }
        catch(\PDOException $e)
        {
            echo $e->getMessage();
            Logger::log_error(42);
        }
        if(!isset($this->dbConnection))
        print_r($this->dbConnection);
    }
    public function close_connection()
    {
        if(!isset($this->dbConnection))
        {
            Logger::log_error(43);
            return;
        }
        $this->dbConnection = null;
        $this->isConnected = false;
    }
    public function is_connected(): bool
    {
        return $this->isConnected;
    }
}