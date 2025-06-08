<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Framework Pessoal MVC</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: rgb(40, 40, 40);
      color: white;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    header {
      background-color: rgb(134, 134, 134);
      padding: 20px 40px;
      text-align: center;
      border-bottom: 4px solid orange;
      box-shadow: 0 2px 10px rgba(255, 165, 0, 0.3);
    }

    header h1 {
      font-size: 1.8rem;
      color: white;
      letter-spacing: 2px;
    }

    main {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
      flex-direction: column;
      text-align: center;
    }

    .title {
      font-size: 2.5rem;
      font-weight: bold;
      color: orange;
      margin-bottom: 30px;
      letter-spacing: 3px;
      text-transform: uppercase;
      text-shadow: 1px 1px 4px rgba(255, 165, 0, 0.5);
    }

    .desc {
      max-width: 700px;
      font-size: 1.1rem;
      line-height: 1.8;
      color: rgb(200, 200, 200);
      margin-bottom: 50px;
    }

    .desc ul {
      list-style: none;
      padding-left: 0;
    }

    .desc li {
      margin: 10px 0;
      background: rgba(255, 255, 255, 0.05);
      padding: 10px 15px;
      border-left: 4px solid orange;
      border-radius: 4px;
      text-align: left;
    }

    footer {
      background-color: rgb(134, 134, 134);
      padding: 15px 20px;
      text-align: center;
      font-size: 0.9rem;
      color: white;
      letter-spacing: 1px;
      border-top: 2px solid orange;
      box-shadow: 0 -2px 8px rgba(255, 165, 0, 0.2);
    }

    footer span {
      color: orange;
      font-weight: bold;
      text-shadow: 0 0 5px rgba(255, 165, 0, 0.6);
    }
  </style>
</head>
<body>

  <header>
    <h1>🚀 Meu Framework MVC Pessoal</h1>
  </header>

  <main>
    <div class="title">Framework Padrão MVC - Pessoal</div>

    <div class="desc">
      <p>Bem-vindo ao seu próprio framework MVC, leve, limpo e eficiente! Aqui estão os principais recursos:</p>
      <ul>
        <li>✅ Sistema de rotas simples e direto</li>
        <li>📁 Estrutura de pastas bem organizada</li>
        <li>⚙️ Configurações prontas para conexão com o banco de dados</li>
        <li>🧠 Controllers desacoplados e fáceis de escalar</li>
        <li>💾 Model flexível com suporte a consultas encadeadas (query builder)</li>
      </ul>
      <p>Ideal para projetos pessoais, estudos ou até mesmo MVPs profissionais. Feito para crescer com você.</p>
    </div>
  </main>

  <footer>
    Desenvolvido por <span>Danilo Manuel</span> • 2025
  </footer>

</body>
</html>
