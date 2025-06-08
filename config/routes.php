<?php

use app\Core\Router;

$router = new Router();


$router->get('/', "TemplateController@index");
