<?php
use \TestMVC\Core\Registry;
use \TestMVC\Core\Databases\MySQLDatabase;
use \TestMVC\Core\Logger;

final class Config
{
    private static $instance;
    private $loggers = [];
    private $registries = [];

    private function __construct(){}
    private function __clone(){}
    private function __sleep(){}
    private function __wakeup(){}

    public static function getInstance()
    {
        if (!(self::$instance instanceof self))
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function setLoggers(array $loggers)
    {
        $this->loggers = $loggers;
    }
}
//config autoloader
require_once 'AutoloaderNamespaces.php';
$autoloader = new AutoloaderNamespaces();
$autoloader->add_namespace('TestMVC', __DIR__.'');
$autoloader->add_namespace('TestMVC\Core', __DIR__ . 'Core');
$autoloader->add_namespace('TestMVC\Core\Databases', __DIR__ . 'Core/Databases');
$autoloader->add_namespace('TestMVC\Core\Interfaces',__DIR__.'Core/Interfaces');
$autoloader->add_namespace('TestMVC\App\Controllers',__DIR__ . 'App/Controllers');
$autoloader->add_namespace('TestMVC\App\Models',__DIR__ . 'App/Models');
$autoloader->add_namespace('TestMVC\App\Views',__DIR__ . 'App/Views');
$autoloader->register();
//config registry
$registry = new Registry();
//config logger
$registry->logPath = "Logs";
$registry->logger = new Logger($registry->logPath);
//config db
$registry->db = new MySQLDatabase('db','localhost', 'testroot','12345');

