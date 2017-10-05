<?php

namespace TestMVC;

interface IDatabase
{
    public function __construct($dbName, $host);

    public function openConnection($user, $password);

    public function closeConnection();
}