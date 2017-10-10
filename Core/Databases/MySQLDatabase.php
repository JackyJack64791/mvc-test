<?php declare(strict_types=1);

namespace TestMVC\Core\Databases;


use TestMVC\Core\Logger;
use \PDO;
use \PDOException;
use \PDOStatement;
use TestMVC\Core\Interfaces\IDatabase;

class MySQLDatabase extends IDatabase
{
    protected $dbConnection;
    private $dbName;
    private $host;
    private $isConnected = false;
    private $logger;

    public function __construct(string $dbName, string $host, string $user, string $password)
    {
        $this->dbName = $dbName;
        $this->host = $host;
        $this->logger = new Logger();
        self::open_connection($user, $password);

    }

    public function open_connection(string $user, string $password)
    {
        try
        {
            $this->dbConnection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName, $user, $password);
            $this->isConnected = true;
            $this->logger->log_ok(20);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            $this->logger->log_error(42);
        }
    }
    public function get_dbConnection() : PDO
    {
        return $this->dbConnection;
    }
    public function close_connection()
    {
        if(!isset($this->dbConnection))
        {
            $this->logger->log_error(43);
            return;
        }
        $this->dbConnection = null;
        $this->isConnected = false;
    }


    public function is_connected(): bool
    {
        return $this->isConnected;
    }

    public function insert(string $tableName, array $params) :PDOStatement
    {
        $assoc_keys = " (`".implode("`, `", array_keys($params))."`)";
        $assoc_values = "('".implode("', '", $params)."') ";

        $query = $this->get_dbConnection()->prepare("INSERT INTO $tableName $assoc_keys VALUES $assoc_values");
        $query->execute();
        return $query;
    }

    public function get(string $tableName, int $id) :PDOStatement
    {
        $query = $this->get_dbConnection()->prepare("SELECT * FROM $tableName WHERE id=$id");
        $query->execute();
        return $query;
    }

    public function get_all(string $tableName) :PDOStatement
    {
        $query = $this->get_dbConnection()->prepare("SELECT * FROM $tableName");
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
        $query = $this->get_dbConnection()->prepare("UPDATE $tableName SET $assoc_string WHERE id=$id");
        $query->execute();
        return $query;
    }

    public function delete(string $tableName, int $id) :PDOStatement
    {
        $query = $this->get_dbConnection()->prepare("DELETE FROM $tableName WHERE id=$id");
        $query->execute();
        return $query;
    }

    public  function query(string $query): PDOStatement
    {
        $query = $this->get_dbConnection()->prepare($query);
        $query->execute();
        return $query;
    }


}