<?php

namespace TestMVC\Core;

use TestMVC\Core\Interfaces\ILogger;

class Logger implements ILogger
{
    private $path;
    private $logPath;
    private $fileName;
    private static $count = 0;

    public function __construct(string $logPath)
    {
        $this->logPath = $logPath;
        $this->fileName = date("Y-m-d_H:m:s_").self::$count.".txt";
        $this->path= __DIR__.'/../'.$this->logPath.'/'.$this->fileName;
        self::$count++;
    }

    public function __destruct()
    {
        self::$count--;
    }

    public function logOk($code)
    {
        $date = '['.date("H:m:s").']';
        $msg = '';
        switch ($code)
        {
            case 1:
                $msg = "$date Bootstrap: OK;\n";
                break;
            case 20:
                $msg = "$date Connection : OK;\n";
                break;
            default:
                $msg = "Q_Q\n";
                break;
        }
        echo $msg;
        file_put_contents($this->path,$msg, FILE_APPEND);
    }
    public function logError($code)
    {
        $date = '['.date("H:m:s").']';
        $msg = '';
        switch ($code)
        {
            case 42:
                $msg = "$date Connection is broken. Check your database;\n";
                break;
            case 43:
                $msg = "$date Connection is already closed;\n";
                break;
            case 80:
                $msg = "$date Property is already used. Access denied;\n";
                break;
            default:
                $msg = "$date Unknown error. Please, try again;\n";
                break;
        }
        echo $msg;
        file_put_contents($this->path,$msg, FILE_APPEND);
    }

    public function logWarning($code)
    {
        $date = '['.date("H:m:s").']';
        $msg = '';

    }

}