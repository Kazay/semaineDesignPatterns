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
            $controllerName = '\\Controller\\' . $route['controller'];
            $controller = new $controllerName();

            // Gestion middleware, controller, parametres
        }
        else
            ExceptionHandler::error404();
    }

}