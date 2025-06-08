<?php

namespace app\Core;

class Router
{
    private $routes = [
        'GET' => [],
        'POST' => [],
        'PUT' => [],
        'DELETE' => []
    ];

    public function get($url, $controller)
    {
        $this->routes['GET'][$url] = $controller;
    }

    public function post($url, $controller)
    {
        $this->routes['POST'][$url] = $controller;
    }

    public function delete($url, $controller)
    {
        $this->routes['DELETE'][$url] = $controller;
    }

    public function put($url, $controller)
    {
        $this->routes['PUT'][$url] = $controller;
    }

    public function resolve()
    {
        $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes[$method] as $route => $controllerAction) {
            $routePattern = preg_replace('/:\w+/', '(\w+)', trim($route, '/'));
            $routeRegex = "#^{$routePattern}$#";

            if (preg_match($routeRegex, $uri, $matches)) {
                array_shift($matches); // remove full match
                [$controller, $action] = explode('@', $controllerAction);

                $controllerClass = "app\\Controllers\\$controller";

                if (class_exists($controllerClass) && method_exists($controllerClass, $action)) {
                    call_user_func_array([new $controllerClass, $action], $matches);
                    return;
                }
            }
        }

        http_response_code(404);
        echo "404 - Página não encontrada";
    }
}

