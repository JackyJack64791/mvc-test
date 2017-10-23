<?php

namespace TestMVC\Core\Interfaces;
use \PDO;
use \PDOStatement;

interface IDatabase
{
    public function __construct(string $dbName, string $host, string $user, string $password);

    public function openConnection(string $user, string $password);

    public function getDbConnection() : PDO;

    public function closeConnection();

    public function isConnected():bool;

    public function insert(string $tableName, array $params) :array;

    public function get(string $tableName, int $id) :array;

    public function getAll(string $tableName) :array;

    public function update(string $tableName, int $id,  array $params) :array;

    public function delete(string $tableName, int $id) :array;

    public function query(string $query): array;




}