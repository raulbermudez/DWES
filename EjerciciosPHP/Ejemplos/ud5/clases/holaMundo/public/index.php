<?php
// Importamos el archivo de configuracio y el autoload del composer
require_once "../app/Config/config.php";
require_once "../vendor/autoload.php";

// Usamos el espacio de nombres
use App\Controllers\IndexControllers;
use App\Controllers\NumerosControllers;
use App\Core\Router;

$router = new Router();
$router->add(array(
        'name'=>'home',
        'path'=>'/^\/$/',
        'action'=>[IndexControllers::class, 'IndexAction']));
$router->add(array(
        'name'=>'home_saludo',
        'path'=>'/^\/saludo\/[a-z]+$/',
        'action'=>[IndexControllers::class, 'SaludoAction']));
$router->add(array(
        'name'=>'home_numeros',
        'path'=>'/^\/numeros\/pares\/$/',
        'action'=>[NumerosControllers::class, 'NumerosAction']));
$router->add(array(
        'name'=>'home_numeros_pares',
        'path'=>'/^\/numeros\/pares\/[0-9]+$/',
        'action'=>[NumerosControllers::class, 'PersonalizParesAction']));
$request=str_replace(DIRBASEURL, "", $_SERVER['REQUEST_URI']);
$route = $router->match($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
}
else {
    echo "No route";
}