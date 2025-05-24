<?php
class Router
{
    private $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function get($url, $controller)
    {
        $this->routes['GET'][$url] = $controller;
    }

    public function post($url, $controller)
    {
        $this->routes['POST'][$url] = $controller;
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
            $pattern = preg_replace('#\{([^/]+)\}#', '([^/]+)', $route);  // Ajustado para capturar o nome da chave
            $pattern = "#^" . $pattern . "$#";

            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches); // Remove o match completo

                preg_match_all('#\{([^/]+)\}#', $route, $keys);
                $params = array_combine($keys[1], $matches);  // Associa a chave ao valor do parâmetro

                $controllerAction = explode('@', $controller);
                $controllerName = $controllerAction[0];
                $actionName = $controllerAction[1];

                $controllerObj = new $controllerName();
                $controllerObj->$actionName($params);  // Passa o array associativo
                return;
            }
        }

        echo "404 Not Found";
    }
}

