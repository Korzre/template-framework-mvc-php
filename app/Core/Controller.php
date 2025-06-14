<?php
namespace app\Core;

abstract class Controller
{
    protected function view($view, $data = [])
    {
        extract($data);
        require_once __DIR__ . "/../Views/$view.php";
    }

     protected function redirect($url)
    {
        header("Location: " . $url);
        exit;
    }
}
