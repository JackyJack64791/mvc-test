<?php
require_once 'autoloader.php';
    echo "Hello World";
    $autoloader = new NamespaceAutoloader();
    $autoloader->addNamespace('TestMVC', '../');
    $autoloader->register();
require_once 'config.php';
?>