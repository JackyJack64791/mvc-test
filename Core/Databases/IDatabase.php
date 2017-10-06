<?php

namespace TestMVC\Core\Databases;

abstract class IDatabase
{
    protected $db;

    public abstract function __construct(string $dbName, string $host);

    public abstract function open_connection(string $user, string $password);

    public abstract function close_connection();

    public abstract function is_connected():bool;



}