<?php

namespace Helper;

use \Helper\RouteHandler;
use \Helper\ExceptionHandler;
use \Controller\HomeController;

class Router
{

    function __construct()
    {

    }

    public function dispatch()
    {
        $route = RouteHandler::route();

        if(count($route) > 0)
        {
            // Gestion middleware, controller, parametres
            $method = $route['method'];
            $controllerName = '\\Controller\\' . $route['controller'];
            $controller = new $controllerName();
            $controller->$method();
        }
        else
            ExceptionHandler::error404();
    }

}