<?php

namespace TestMVC\Core\Interfaces;
use \PDO;
use \PDOStatement;

abstract class IDatabase
{
    protected $dbConnection;

    public abstract function __construct(string $dbName, string $host, string $user, string $password);

    public abstract function open_connection(string $user, string $password);

    public abstract function get_dbConnection() : PDO;

    public abstract function close_connection();

    public abstract function is_connected():bool;

    public abstract function insert(string $tableName, array $params) :PDOStatement;

    public abstract function get(string $tableName, int $id) :PDOStatement;

    public abstract function get_all(string $tableName) :PDOStatement;

    public abstract function update(string $tableName, int $id,  array $params) :PDOStatement;

    public abstract function delete(string $tableName, int $id) :PDOStatement;

    public abstract function query(string $query): PDOStatement;




}