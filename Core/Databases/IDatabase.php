<?php

namespace TestMVC\Core\Databases;

interface IDatabase
{
    public function __construct($dbName, $host);

    public function openConnection($user, $password);

    public function closeConnection();
}