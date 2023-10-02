<?php

namespace User\TestTaskPhp;

use User\TestTaskPhp\controllers\UserController;

$userController = new UserController();
$routes = [
    '/' => ['controller' => $userController, 'action' => 'register'],
    '/register' => ['controller' => $userController, 'action' => 'register'],
    '/list-users' => ['controller' => $userController, 'action' => 'listUsers'],
];

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (array_key_exists($path, $routes)) {
    $route = $routes[$path];
    $controller = $route['controller'];
    $action = $route['action'];
    $controller->$action();
} else {
    header('HTTP/1.1 404 Not Found');
    echo '404 Page Not Found';
}
?>
