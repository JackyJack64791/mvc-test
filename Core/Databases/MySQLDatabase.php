<?php declare(strict_types=1);

namespace TestMVC\Core\Databases;


use TestMVC\Core\Logger;
use \PDO;
use \PDOException;
use \PDOStatement;
use TestMVC\Core\Interfaces\IDatabase;

class MySQLDatabase extends IDatabase
{
    private $bootstrap;
    protected $dbConnection;
    private $dbName;
    private $host;
    private $isConnected = false;
    private $logger;


    public function __construct(string $dbName, string $host, string $user, string $password)
    {
        $this->bootstrap = \Bootstrap::getInstance();
        $this->dbName = $dbName;
        $this->host = $host;
        $this->logger = $this->bootstrap->getLogger();
        self::openConnection($user, $password);

    }

    public function openConnection(string $user, string $password)
    {
        try
        {
            $this->dbConnection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName, $user, $password);
            $this->isConnected = true;
            $this->logger->logOk(20);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            $this->logger->logError(42);
        }
    }
    public function getDbConnection() : PDO
    {
        return $this->dbConnection;
    }
    public function closeConnection()
    {
        if(!isset($this->dbConnection))
        {
            $this->logger->logError(43);
            return;
        }
        $this->dbConnection = null;
        $this->isConnected = false;
    }


    public function isConnected(): bool
    {
        return $this->isConnected;
    }

    public function insert(string $tableName, array $params) :PDOStatement
    {
        $assoc_keys = " (`".implode("`, `", array_keys($params))."`)";
        $assoc_values = "('".implode("', '", $params)."') ";

        $query = $this->getDbConnection()->prepare("INSERT INTO $tableName $assoc_keys VALUES $assoc_values");
        $query->execute();
        return $query;
    }

    public function get(string $tableName, int $id) :PDOStatement
    {
        $query = $this->getDbConnection()->prepare("SELECT * FROM $tableName WHERE id=$id");
        $query->execute();
        return $query;
    }

    public function getAll(string $tableName) :PDOStatement
    {
        $query = $this->getDbConnection()->prepare("SELECT * FROM $tableName");
        $query->execute();
        return $query;
    }

    public function update(string $tableName, int $id, array $params) :PDOStatement
    {
        $assoc_string = '';
        foreach($params as $first=>$second)
        {
            $assoc_string .= $first.' = '."'$second',";
        }
        $query = $this->getDbConnection()->prepare("UPDATE $tableName SET $assoc_string WHERE id=$id");
        $query->execute();
        return $query;
    }

    public function delete(string $tableName, int $id) :PDOStatement
    {
        $query = $this->getDbConnection()->prepare("DELETE FROM $tableName WHERE id=$id");
        $query->execute();
        return $query;
    }

    public  function query(string $query): PDOStatement
    {
        $query = $this->getDbConnection()->prepare($query);
        $query->execute();
        return $query;
    }


}