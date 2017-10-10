<?php
session_start();
use \TestMVC\App\Models\User;
require_once 'config.php';
$user = new User($registry->db);

?>
