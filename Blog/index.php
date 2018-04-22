<?php


// общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);
// подключение фалов 
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Router.php');
include_once (ROOT. '/components/DataBasa.php');

$router = new Router();
$router->run();
?>
