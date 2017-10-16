<?php

namespace TestMVC\Core\Interfaces;
use \PDO;
use \PDOStatement;

abstract class IDatabase
{
    protected $dbConnection;

    public abstract function __construct(string $dbName, string $host, string $user, string $password);

    public abstract function openConnection(string $user, string $password);

    public abstract function getDbConnection() : PDO;

    public abstract function closeConnection();

    public abstract function isConnected():bool;

    public abstract function insert(string $tableName, array $params) :PDOStatement;

    public abstract function get(string $tableName, int $id) :PDOStatement;

    public abstract function getAll(string $tableName) :PDOStatement;

    public abstract function update(string $tableName, int $id,  array $params) :PDOStatement;

    public abstract function delete(string $tableName, int $id) :PDOStatement;

    public abstract function query(string $query): PDOStatement;




}