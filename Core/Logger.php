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

    public function logOk($code, bool $console = false)
    {
        $date = '['.date("H:m:s").']';
        $msg = '';
        switch ($code)
        {
            case 1:
                $msg = "Bootstrap: OK;\n";
                break;
            case 2:
                $msg = "Router: OK;\n";
                break;
            case 20:
                $msg = "Connection : OK;\n";
                break;
            default:
                $msg = "Q_Q\n";
                break;
        }
        if($console) echo $msg="$date ".$msg;
        file_put_contents($this->path,$msg, FILE_APPEND);
    }
    public function logError($code, bool $console=false)
    {
        $date = '['.date("H:m:s").']';
        $msg = '';
        switch ($code)
        {
            case 41:
                $msg = "The table is not specified for this Model. Use findTable() before.\n";
                break;
            case 42:
                $msg = "Connection is broken. Check your database;\n";
                break;
            case 43:
                $msg = "Connection is already closed;\n";
                break;
            case 80:
                $msg = "Property is already used. Access denied;\n";
                break;
            default:
                $msg = "Unknown error. Please, try again;\n";
                break;
        }
        if($console) echo $msg="$date ".$msg;
        file_put_contents($this->path,$msg, FILE_APPEND);
    }

    public function logWarning($code)
    {
        $date = '['.date("H:m:s").']';
        $msg = '';

    }

}