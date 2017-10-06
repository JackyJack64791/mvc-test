<?php
//config autoloader
require_once 'Autoloader.php';
$autoloader = new Autoloader();
$autoloader->addNamespace('TestMVC', __DIR__.'');
$autoloader->addNamespace('TestMVC\Core', __DIR__.'Core');
$autoloader->addNamespace('TestMVC\Core\Databases', __DIR__.'Core/Databases');
$autoloader->register();
//config db
$db = new \TestMVC\Core\Databases\MySQLDatabase('db','localhost');
$db->openConnection('user','password');