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
}
