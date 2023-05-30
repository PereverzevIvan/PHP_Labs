<?php
ini_set('display_errors','On');

spl_autoload_register(function(string $className){
    require_once(__DIR__ . '/src/' . $className.'.php');
});

$route = $_GET['route'] ?? '';
$routes =  require_once('../src/routes.php');
$isRouteFound = false;

foreach ($routes as $pattern => $controllerandAction) {
    preg_match($pattern, $route, $matches);
    if (!empty($matches)){
        $isRouteFound = true;
        break;
    }
}
if (!$isRouteFound){
    echo 'Страница не найдена!';
    return;
}

unset($matches[0]);

$controllerName = $controllerandAction[0];
$actionName = $controllerandAction[1];
$controller = new $controllerName();
$controller->$actionName(...$matches);