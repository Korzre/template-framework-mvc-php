<?php

require_once __DIR__ . '/../app/Core/Controller.php';
require_once __DIR__ . '/../app/Core/Router.php';
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/AboutController.php';

// Carregar rotas
require_once __DIR__ . '/../config/routes.php';

$router->resolve();
