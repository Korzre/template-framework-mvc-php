<?php

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/about', 'AboutController@index');
$router->get('/fotos', 'HomeController@fotos');

$router->get('/foto/{id}', 'HomeController@foto');