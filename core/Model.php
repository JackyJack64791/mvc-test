<?php

namespace TestMVC;


class Model
{
    public static function connectDatabase()
    {
        $db = new MySQLDatabase();
    }

    public function __construct()
    {

    }
}