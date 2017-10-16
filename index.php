<?php

session_start();

use \TestMVC\App\Models\User;
use \TestMVC\Core\Router;

require_once 'Bootstrap.php';
$bootstrap = Bootstrap::getInstance();
$bootstrap->init("Logs");
$user = new User($bootstrap->db);
$router = new Router();
require_once ("App/Views/layout.php");
?>
