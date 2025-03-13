<?php
session_start();
// Si existe la sesion perfil se mantiene sino, es invitado
if (!isset($_SESSION["perfil"])){
    $_SESSION["perfil"] = "invitado";
}
require_once "../bootstrap.php";
require_once "../vendor/autoload.php";

use App\Core\Router;
use App\Controllers\DefaultController;
use App\Controllers\UsuarioController;
use App\Controllers\MultasController;
use App\Controllers\AuthController;

$router = new Router();

$router->add([  'name' => 'index',
                'path' => '/^\/$/',
                'action' => [DefaultController::class, 'IndexAction']]);
                                
$router->add(['name' => 'login',
                'path' => '/^\/login$/',
                'action' => [UsuarioController::class, 'loginAction']]);

$router->add(['name' => 'logout',
                'path' => '/^\/logout$/',
                'action' => [UsuarioController::class, 'logoutAction'],
                "perfil" => ["admin", "agente", "conductor"]]);

$router->add(['name' => 'conductor',
                'path' => '/^\/multas$/',
                'action' => [MultasController::class, 'multasAction'],
                "perfil" => ["conductor"]]);

$router->add(['name' => 'agente',
                'path' => '/^\/agente\/multas$/',
                'action' => [MultasController::class, 'MultasAgenteAction'],
                "perfil" => ["agente"]]);

$router->add(['name' => 'agente nueva multa',
                'path' => '/^\/poner\/multa$/',
                'action' => [MultasController::class, 'MultasAgenteAddAction'],
                "perfil" => ["agente"]]);

$router->add(['name' => 'pagar multa conductor',
                'path' => '/^\/pagar\/[0-9]+$/',
                'action' => [MultasController::class, 'pagarMultasAction'],
                "perfil" => ["conductor"]]);

$router->add(['name' => 'perfil de administrador',
                'path' => '/^\/conductores$/',
                'action' => [AuthController::class, 'indexAction'],
                "perfil" => ["admin"]]);


$request = $_SERVER['REQUEST_URI'];
$route = $router->match($request);

if($route){
    if (isset($route['perfil']) && !in_array($_SESSION['perfil'], $route['perfil'])) {
        header("Location: /");
    } else{
        $controllerName = $route['action'][0];
        $actionName = $route['action'][1];
        $controller = new $controllerName;
        $controller->$actionName($request);
    }
}else{
    echo "No route";
}
?>
