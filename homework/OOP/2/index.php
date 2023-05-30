<?php
    ini_set('display_errors','On');

    function myAutoLoader(string $className)
    {
        require_once __DIR__ . '/src/' . str_replace('\\', '/', $className) . '.php';
    }

    spl_autoload_register('myAutoLoader');
    
    $route = $_GET['route'] ?? '';
    $routes = require __DIR__ . '/src/routes.php';

    $isRouteFound = true;
    
    foreach ($routes as $pattern => $controllerAndAction) {
        preg_match($pattern, $route, $matches);
        if (!empty($matches)) {
            $isRouteFound = true;
            break;
        }
    }

    if (!$isRouteFound) {
        $view = new Models\View\View('src/Templates');
        $view->renderHtml('errors/404.php', [], 404);
        return;
    }

    unset($matches[0]);

    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];
    $controller = new $controllerName();
    $controller->$actionName(...$matches);
?>