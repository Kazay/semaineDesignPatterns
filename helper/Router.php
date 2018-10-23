<?php

namespace Helper;
use \Helper\ExceptionHandler;
use \Controller\HomeController;
use \Controller\ContactController;

class Router
{
    public function route()
    {
        $uri = $this->trimUri($_SERVER['REQUEST_URI']);

        if(isset($uri[0]) && $uri[0] != '')
            $class =  ucfirst($uri[0]) . 'Controller';
        else
            $class = 'HomeController';

        if(isset($uri[1]) && $uri[1] != '')
            $method = $uri[1];
        else
            $method = 'index';

        if(file_exists('./controller/' . $class . '.php'))
        {
            $class = '\\Controller\\' . $class;
            $controller = new $class();

            if(method_exists($controller, $method))
                $controller->$method();
        }
        ExceptionHandler::error404();
    }

    private function trimUri($uri)
    {
        return explode('/', ltrim($uri, '/'), 2);
    }
}