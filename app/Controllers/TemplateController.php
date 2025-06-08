<?php

namespace app\Controllers;

use app\Core\Controller;


class TemplateController extends Controller
{
    public function index(){
        $this->view('template');
    }
}