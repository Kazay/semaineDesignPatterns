<?php

namespace Helper;
use \Helper\ExceptionHandler;

class RouteHandler
{
    static function route()
    {
        $return = [];
        
        $routes = include '../config/route.php';
        $route = self::getRoute(self::trimUri($_SERVER['REQUEST_URI']), $routes);
        if(count($route) > 0)
        {
            if(self::checkRoute($route))
                $return = $route; 
        }
        return $return;
            
    }

    private static function trimUri($uri)
    {
        return explode('/', ltrim($uri, '/'), 2);
    }

    // Get current route parameters if it has been declared in route.php
    private static function getRoute($currentRoute, $routes)
    {
        $return = [];
 
        // if controller is empty, HomeController is called by default
        if(!isset($currentRoute[0]) || $currentRoute[0] === '')
            $currentRoute[0] = 'home';

        // if method is not set, index method is called by default
        if(!isset($currentRoute[1]) || $currentRoute[1] === '')
            $currentRoute[1] = 'index';
        
        foreach($routes as $route)
        {
            if($route['controller'] === ucfirst($currentRoute[0]) . 'Controller' && $route['method'] === $currentRoute[1])
            {
                $return = $route;
                break;
            }
        }
  
        return $return;
    }

    // Check if Controller/Method exists
    private static function checkRoute($route)
    {
        $return = FALSE;

        $class = $route['controller'];
        $method = $route['method'];

        if(file_exists('../controller/' . $class . '.php'))
        {
            $class = '\\Controller\\' . $class;
            $controller = new $class();

            if(method_exists($controller, $method))
                $return = TRUE;
        }

        return $return;
    }
}