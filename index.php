<?php ini_set('error_reporting', E_ALL);

session_start();

use \TestMVC\App\Models\User;
use \TestMVC\Core\Router;
use \TestMVC\App\Controllers\UserController;
use \TestMVC\App\Controllers\SiteController;

require_once 'Bootstrap.php';
$bootstrap = Bootstrap::getInstance();
$bootstrap->init("Logs");
?>