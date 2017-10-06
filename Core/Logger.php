<?php

namespace TestMVC\Core;


class Logger
{
    private function __construct()
    {

    }

    static function log_error($errorCode)
    {
        switch ($errorCode)
        {
            case 42:
                echo "Connection is broken. Check your database\n";
                break;
            case 43:
                echo "Connection is already closed\n";
                break;
            default:
                echo "Unknown error. Please, try again\n";
                break;
        }
    }

}