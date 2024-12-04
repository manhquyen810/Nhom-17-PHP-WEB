<?php
require_once 'models/Database.php';
require_once 'controllers/NewsController.php';
require_once 'controllers/AdminController.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'news';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

$controllerClass = ucfirst($controller) . "Controller";
$controllerInstance = new $controllerClass();

if ($id !== null) {
    $controllerInstance->$action($id);
} else {
    $controllerInstance->$action();
}
?>
