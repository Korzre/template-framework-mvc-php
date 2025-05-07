<?php

class HomeController extends Controller
{
    public function index()
    {
        $data = ['title' => 'Home Page'];
        $this->view('home', $data);
    }

    public function fotos()
    {
        echo "Fotos!";
    }

    public function foto($parametros){
        echo "Acessando a foto: ".$parametros['id'];
    }
}
