<?php

session_start();

use \TestMVC\App\Models\User;
use \TestMVC\Core\Router;
use \TestMVC\App\Controllers\UserController;

require_once 'Bootstrap.php';
$bootstrap = Bootstrap::getInstance();
$bootstrap->init("Logs");
$user = new User($bootstrap->db);
$controller = new UserController($user);
$controller->indexAction();
#require_once ("App/Views/layout.php");
?>
