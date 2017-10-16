<?php

use \TestMVC\Core\Registry;
use \TestMVC\Core\Databases\MySQLDatabase;
use \TestMVC\Core\Logger;
require_once 'AutoloaderNamespaces.php';



final class Bootstrap
{
    private static $instance;
    private static $loggers = [];
    private static $registries = [];

    private function __construct(){}
    private function __clone(){}
    private function __sleep(){}
    private function __wakeup(){}

    public function __get($key)
    {
        return end(self::$registries)->db == null ? null : end(self::$registries)->db;
    }
    public function __set($key, $value)
    {
        if(!isset(end(self::$registries)->$key))
        {
            end(self::$registries)->$key = $value;
        }
        else
        {
            end(self::$loggers)->log_error(80);
        }

    }

    public static function getInstance()
    {
        if (!(self::$instance instanceof self))
        {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function init(string $logPath)
    {
        $this->autoloadNamespaces();
        $this->addRegistry();
        $this->addLogger($logPath);
        $this->configDatabase();
        $this->getLogger()->logOk(1);
    }

    public function addRegistry()
    {
        self::$registries[] = new Registry();
    }

    public function getLogger()
    {
        return end(self::$loggers);
    }
    public function addLogger(string $logPath)
    {
        end(self::$registries)->logPath = $logPath;
        self::$loggers[] = new Logger(end(self::$registries)->logPath);
    }

    public function autoloadNamespaces()
    {
        $autoloader = new AutoloaderNamespaces();
        $autoloader->addNamespace('TestMVC', __DIR__.'');
        $autoloader->addNamespace('TestMVC\Core', __DIR__ . 'Core');
        $autoloader->addNamespace('TestMVC\Core\Databases', __DIR__ . 'Core/Databases');
        $autoloader->addNamespace('TestMVC\Core\Interfaces',__DIR__.'Core/Interfaces');
        $autoloader->addNamespace('TestMVC\App\Controllers',__DIR__ . 'App/Controllers');
        $autoloader->addNamespace('TestMVC\App\Models',__DIR__ . 'App/Models');
        $autoloader->addNamespace('TestMVC\App\Views',__DIR__ . 'App/Views');
        $autoloader->register();
    }

    public function configDatabase()
    {
        end(self::$registries)->db = new MySQLDatabase('db','localhost', 'testroot','12345');
    }
}


