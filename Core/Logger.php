<?php

namespace TestMVC\Core;

class Logger
{
    private $path;
    private $file;
    private $fileName;
    private static $count = 0;
    public function __construct()
    {
        $this->fileName = date("Y-m-d_H:m:s_").self::$count.".txt";
        $this->path= __DIR__.'/../'.$GLOBALS['log_path'].'/'.$this->fileName;
        self::$count++;
    }

    public function __destruct()
    {
        self::$count--;
    }

    public function log_ok($code)
    {
        switch ($code)
        {
            case 20:
                echo "Connection : OK;\n";
                file_put_contents($this->path,"Connection : OK\n");
                break;
            default:
                echo "Q_Q\n";
                break;
        }
    }
    public function log_error($errorCode)
    {
        switch ($errorCode)
        {
            case 42:
                echo "Connection is broken. Check your database;\n";
                file_put_contents($this->path,"Connection is broken. Check your database;\n");
                break;
            case 43:
                echo "Connection is already closed;\n";
                file_put_contents($this->path,"Connection is already closed;\n");
                break;
            default:
                echo "Unknown error. Please, try again;\n";
                file_put_contents($this->path,"Unknown error. Please, try again;\n");
                break;
        }
    }

    public function log_warning($code)
    {

    }

}