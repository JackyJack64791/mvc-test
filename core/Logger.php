<?php

namespace TestMVC;


class Logger
{
    static function logError($errorCode)
    {
        switch ($errorCode)
        {
            case 42:
                echo "Connection is broken. Check your database";
                break;
            case 43:
                echo "Connection is already closed";
                break;
            default:
                echo "Unknown error. Please, try again";
                break;
        }
    }

}