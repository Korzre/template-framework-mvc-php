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
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        if (isset($this->routes[$method][$url])) {
            $controllerAction = explode('@', $this->routes[$method][$url]);
            $controller = $controllerAction[0];
            $action = $controllerAction[1];

            $controllerObj = new $controller();
            $controllerObj->$action();
            return;
        }

        foreach ($this->routes[$method] as $route => $controller) {
            $pattern = preg_replace('#\{[^/]+\}#', '([^/]+)', $route);
            $pattern = "#^" . $pattern . "$#";

            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches); // Remove o match completo

                $controllerAction = explode('@', $controller);
                $controllerName = $controllerAction[0];
                $actionName = $controllerAction[1];

                $controllerObj = new $controllerName();
                $controllerObj->$actionName($matches);
                return;
            }
        }

        echo "404 Not Found";
    }
}
