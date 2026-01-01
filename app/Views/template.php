<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tagesschrift&display=swap');

        * {
            margin: 0;
            padding: 0;
            outline: 0;
            box-sizing: border-box;
        }

        body{
            background-color: #fff;
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .text-main{
            width: 35rem;
            height: 650px;
            padding: 15px;
            border-top: 10px solid #ce7171;
        }
        article{
            text-align: justify;
            color: rgb(40, 40, 40);
            font-family: "Tagesschrift", system-ui;
            font-size: 12pt;
            font-weight: 400;
        }
    </style>
</head>
<body>

    <div class="text-main">

        <article>
                Este framework nasceu de um desejo nostálgico: revisitar as raízes do PHP e colocar em prática os conceitos fundamentais que regem a web moderna. Em vez de depender de soluções prontas e complexas, decidi construir do zero uma estrutura que prioriza a simplicidade e o aprendizado. Ele funciona como um motor leve seguindo o padrão MVC (Model-View-Controller), onde o objetivo principal não é competir com gigantes do mercado, mas sim oferecer um ambiente controlado e elegante para entender como as requisições fluem desde a URL até a renderização final na tela.
                <br>
                <br>
                A arquitetura de pastas foi desenhada para ser intuitiva e organizada. No coração do sistema temos a pasta app, subdividida em Core (onde mora a inteligência do roteamento), Controllers, Models e Views. O ponto de entrada é o diretório public/index.php, garantindo que o restante do código fique protegido fora da raiz do servidor web. Para a configuração, utilizei uma pasta config dedicada, e o gerenciamento de ambiente é feito via arquivos .env, seguindo as melhores práticas de segurança para lidar com credenciais de banco de dados e chaves de API sem expô-las no código principal.
                <br>
                <br>
                O sistema de rotas é o grande destaque técnico: ele utiliza Expressões Regulares (Regex) para interpretar URLs amigáveis e despachar a execução para o Controller e a ação (método) corretos. Para não "reinventar a roda" em tudo, integrei o pacote vlucas/phpdotenv via Composer, facilitando a gestão de variáveis de ambiente, e utilizei os polyfills da Symfony para garantir compatibilidade e robustez. O resultado é um sistema que suporta os verbos HTTP essenciais (GET, POST, PUT, DELETE) e permite injetar parâmetros dinâmicos diretamente nas rotas, como IDs de usuários ou slugs de posts.
        </article>
        
    </div>
    
</body>
</html>