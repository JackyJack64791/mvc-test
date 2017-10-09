<?php
//config autoloader
require_once 'Autoloader.php';
$autoloader = new Autoloader();
$autoloader->add_namespace('TestMVC', __DIR__.'');
$autoloader->add_namespace('TestMVC\Core', __DIR__ . 'Core');
$autoloader->add_namespace('TestMVC\Core\Databases', __DIR__ . 'Core/Databases');
$autoloader->register();
//config db

$GLOBALS['db'] = new \TestMVC\Core\Databases\MySQLDatabase('db','localhost', 'testroot','12345');
