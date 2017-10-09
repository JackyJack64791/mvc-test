<?php
session_start();
require_once 'config.php';
$user = new \TestMVC\App\Models\User($GLOBALS['db']);


?>
