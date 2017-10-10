<?php

//config logger
$GLOBALS['log_path'] = "Logs";
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
//config db
$GLOBALS['db'] = new \TestMVC\Core\Databases\MySQLDatabase('db','localhost', 'testroot','12345');

