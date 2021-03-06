<?php
session_start();
ini_set('display_errors', true);
error_reporting(E_ALL);

setlocale(LC_ALL, 'nl_BE');

// basic .env file parsing
if (file_exists("../.env")) {
  $variables = parse_ini_file("../.env", true);
  foreach ($variables as $key => $value) {
    putenv("$key=$value");
  }
}

$routes = array(
  'home' => array(
    'controller' => 'Products',
    'action' => 'index'
  ),
  'detail' => array(
    'controller' => 'Products',
    'action' => 'detail'
  ),
  'cart' => array(
    'controller' => 'Order',
    'action' => 'cart'
  ),
  'order' => array(
    'controller' => 'Order',
    'action' => 'order'
  ),
  'neuromancer' => array(
    'controller' => 'Longread',
    'action' => 'neuromancer'
  )
);

if (empty($_GET['page'])) {
  $_GET['page'] = 'home';
}
if (empty($routes[$_GET['page']])) {
  header('Location: index.php');
  exit();
}

$route = $routes[$_GET['page']];
$controllerName = $route['controller'] . 'Controller';

require_once __DIR__ . '/controller/' . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->route = $route;
$controllerObj->filter();
$controllerObj->render();
