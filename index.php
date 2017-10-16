<?php

session_start();

use \TestMVC\App\Models\User;

require_once 'Bootstrap.php';
$bootstrap = Bootstrap::getInstance();
$bootstrap->init("Logs");
$user = new User($bootstrap->db);

?>
