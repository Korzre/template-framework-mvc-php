<?php

class Router
{
    private $routes = [];

    public function get($url, $controller)
    {
        $this->routes['GET'][$url] = $controller;
    }

    public function resolve()
    {
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        if (isset($this->routes[$method][$url])) {
            $controllerAction = explode('@', $this->routes[$method][$url]);
            $controller = $controllerAction[0];
            $action = $controllerAction[1];

            $controllerObj = new $controller();
            $controllerObj->$action();
        } else {
            echo "404 Not Found";
        }
    }
}
