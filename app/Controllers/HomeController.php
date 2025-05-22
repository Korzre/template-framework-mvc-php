<?php

class HomeController extends Controller
{
    public function index()
    {

       $posts = [
            ['titulo'=> 'Teste1', 'corpo'=>'Testando!'],
            ['titulo'=> 'Teste14e', 'corpo'=>'Testandoee!'],
            ['titulo'=> 'Teste14e', 'corpo'=>'Testandoee!']
            
        ];

         $nome="Danilo";
         $this->view('home', 
         ['nome'=>$nome,
                'idade'=>10,
                'posts'=>$posts
         ]
           
        );
        
    }

    public function fotos()
    {
        echo "Fotos!";
    }

    public function foto($parametros){
        echo "Acessando a foto: ".$parametros['id'];
    }
}
