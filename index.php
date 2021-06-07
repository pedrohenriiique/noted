<!doctype html>
<html class="no-js" lang=" pt-br ">

<head>
  <meta charset="utf-8">
  <title>noted</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="shortcut icon" href="img/favicon_noted.ico">
 
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Materialize CSS -->
  <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

  <meta name="theme-color" content="#fafafa">
</head>

<body>

  <!-- Barra Fixa -->
  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper indigo">
        <div class="row">
          <div class="col l2" style="font-size: 130%;">
            <img src="img/logo.png" class="responsive-img left">noted
          </div>
          <div class="col l8">
            <ul class="center"> 
              <li style="float: none; display: inline-block;"><a href="#noted">O que é?</a></li>
              <li style="float: none; display: inline-block;"><a href="#recursos">Recursos ao usuário</a></li>
              <li style="float: none; display: inline-block;"><a href="#utilizar">Utilização</a></li>
              <li style="float: none; display: inline-block;"><a href="#desenvolvedor">Área do desenvolvedor</a></li>
            </ul>
          </div>
          <div class="col l1"></div>
          <div class="col l1">
            <a href="login.php" class="btn center">Entrar</a>
          </div>
        </div>          
      </div>
    </nav>
  </div>

  <!-- Conteúdo -->
  <div class="container">
    <div id="noted" class="row scrollspy center" style="padding-top: 4%;">
      <div style="display: inline-block; margin-top: 3%;"> 
        <i class="material-icons large right" style="color:#38B774">help</i>
      </div>
      <div style="display: inline-block">
        <h2 class="left">O que é noted?</h2>
      </div>
    </div>
    <div class="row">
      <h5 class="center" style="text-align: justify">
        <span style="font-weight: bold; color: #38B774">noted</span> é uma aplicação que permite ao usuário organizar suas tarefas e atividades do dia a dia, como por exemplo cuidar de suas obrigações pessoais, profissionais ou escolares, assim como suas atividades esportivas ou de lazer. Com o <span style="font-weight: bold; color: #38B774">noted</span> você organiza com facilidade todos seus afazeres diários, semanais e mensais. A aplicação está disponível tanto para web quanto para dispositivos mobile, dessa forma o usuário pode ser notificado de suas tarefas em todos seus dispositivos e a qualquer momento.
      </h5>
    </div>
    
    <div class="divider"></div>

    <div id="recursos" class="row scrollspy center" style="padding-top: 4%;">
      <div style="display: inline-block">
        <h2 class="right">Recursos ao usuário</h2>
      </div>     
      <div style="display: inline-block; margin-top: 3%"> 
        <i class="material-icons large left" style="color:#38B774">layers</i>
      </div> 
    </div>
    <div class="row">
      <h5 class="center" style="text-align: justify">
        <span style="font-weight: bold; color: #38B774">noted</span> proporciona ao usuário a criação de Timelines que são compostos por Cronogramas Mensais e Semanais, os quais possuem calendários que podem ser personalizados ao gosto do usuário, para que o mesmo tenha uma visão ampla de todas suas atividades.
        Além disso, o usuário tem a opção de escolher as tarefas que deseja receber notificações.
      </h5>
    </div>
    
    <div class="divider"></div>

    <div id="utilizar" class="row scrollspy center" style="padding-top: 4%;">
      <div style="display: inline-block; margin-top: 3%">
        <i class="material-icons large left" style="color:#38B774">assignment</i>
      </div> 
      <div style="display: inline-block;">
        <h2 class="right">Utilização</h2>
      </div>
    </div>
    <div class="row" style="font-size: 120%;">
      <h5>Abaixo estão representados passos a serem seguidos, para que o usuário possa utilizar o <span style="font-weight: bold; color: #38B774;" class="">noted</span>.</h5>
      </br>
      <a class="btn-floating btn-large waves-effect waves-light red" style="font-weight:bold">1</a>
      <span class="center">
        O usuário inicialmente deve se autenticar. Para isso, ele deve fazer <a href="login.php">Login</a> ou se <a href="cadastro.php">Cadastrar</a>.
      </span>
      </br>
      </br>
      <a class="btn-floating btn-large waves-effect waves-light red" style="font-weight:bold">2</a>
      <span class="center">Após autenticado o usuário deve criar uma Timeline.</span>
      </br>
      </br>
      <a class="btn-floating btn-large waves-effect waves-light red" style="font-weight:bold">3</a>
      <span class="center">Ao criar uma Timeline o usuário pode optar pela criação de Cronogramas Mensais e/ou Semanais.</span>
      </br>
      </br>
      <a class="btn-floating btn-large waves-effect waves-light red" style="font-weight:bold">4</a>
      <span class="center">O usuário deve escolher quais atividades ele deseja receber notificações.</span>
      </br>
      </br>
      <a class="btn-floating btn-large waves-effect waves-light red" style="font-weight:bold">5</a>
      <span class="center">Por fim, o usuário finaliza a criação do Timeline.</span>
    </div>

    <div class="divider"></div>

    <div id="desenvolvedor" class="row scrollspy center" style="padding-top: 4%;">
      <div style="display: inline-block;">
        <h2 class="right">Área do Desenvolvedor</h2>
      </div>
      <div style="display: inline-block; margin-top: 3%">
        <i class="material-icons large left" style="color:#38B774">developer_mode</i>
      </div> 
    </div>
    <div class="row" style="text-align: justify">
      <h5 class="center" style="text-align: justify">
        Esta área é destinada aos que desejam conhecer melhor o projeto 
        <span style="font-weight: bold; color: #38B774">noted</span> 
        "por de trás dos panos". Como, as linhas de códigos e as tecnologias utilizadas.
      </h5>
      <h5 class="center" style="text-align: justify">O projeto encontra-se hospedado em 
        <a href="https://github.com/peeeeedro/noted">GitHub</a>
      </h5>
    </div>
    <div class="row center">
      <div style="display: inline-block;">
        <h5 style="font-weight: bold; color: #38B774" class="center">Tecnologias utilizadas</h5> 
      </div>  
    </div>
    <div class="row">
      <div class="col l6">
        <span class="indigo-text" style="font-weight: bold">Aplicação Web</span>
        <div class="card">
          <div class="card-image" style="background-color: #222222">
            <img src="img/htmlboilerplate.png" style="width: 100px">
          </div>
          <div class="card-content">
            <span class="card-title" style="font-weight: bold">HTML5 Boilerplate</span>
            <p style="text-align: justify">
              É um template HTML, CSS e JavaScript para criar sites HTML5 com compatibilidade entre navegadores, tornando a criação rápida, robusta e adaptável. 
            </p>
          </div>
          <div class="card-action">
            <a href="https://html5boilerplate.com/">Site</a>
          </div>
        </div>
      </div>
      <div class="col l6">
        <span style="color: white" style="font-weight: bold">espaço</span>
        <div class="card">
          <div class="card-image" style="background-color: pink">
            <img src="img/materialize.png" style="width: 100px">
          </div>
          <div class="card-content">
            <span class="card-title" style="font-weight: bold">Materialize</span>
            <p style="text-align: justify">
              É um framework CSS baseado em Material Design utilizado para tornar o desenvolvimento de sites e sistemas online muito mais dinâmico e fácil.
            </p>
          </div>
          <div class="card-action">
            <a href="https://materializecss.com/">Site</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col l6">
        <div class="card">
          <div class="card-image" style="background-color: #0769ad">
            <img src="img/jquery.png" style="width: 100px">
          </div>
          <div class="card-content">
            <span class="card-title" style="font-weight: bold">jQuery</span>
            <p style="text-align: justify">
              jQuery é uma biblioteca de funções JavaScript que interage com o HTML, desenvolvida para  simplificar os scripts interpretados no navegador do cliente.
            </p>
          </div>
          <div class="card-action">
            <a href="https://jquery.com/">Site</a>
          </div>
        </div>
      </div>
            <div class="col l6">
        <div class="card">
          <div class="card-image" style="background-color: #20232a">
            <img src="img/fullcalendar.png" style="width: 100px">
          </div>
          <div class="card-content">
            <span class="card-title" style="font-weight: bold">FullCalendar</span>
            <p style="text-align: justify">
              O FullCalender é um calendário de eventos em JavaScript completo e popular. Possui diversas funcionalidades e ferramentas que facilitam a manipulação de calendários.
            </p>
          </div>
          <div class="card-action">
            <a href="https://fullcalendar.io/">Site</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col l6">
        <span class="indigo-text" style="font-weight: bold">Aplicação Mobile</span>
        <div class="card">
          <div class="card-image" style="background-color: #222222">
            <img src="img/reactnative.png" style="width: 100px;">
          </div>
          <div class="card-content">
            <span class="card-title" style="font-weight: bold">React Native</span>
            <p style="text-align: justify">
              É uma biblioteca Javascript criada pelo Facebook usada para desenvolver aplicativos para os sistemas Android e iOS de forma nativa.
            </p>             
          </div>
          <div class="card-action">
            <a href="https://reactnative.dev/">Site</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col l6">
        <span class="indigo-text" style="font-weight: bold">Back-end</span>
        <div class="card">
          <div class="card-image" style="background-color: #4766cc">
            <img src="img/php.jpg" style="width: 100px">
          </div>
          <div class="card-content">
            <span class="card-title" style="font-weight: bold">PHP</span>
            <p style="text-align: justify">
              É uma linguagem interpretada livre, usada originalmente apenas para o desenvolvimento de  
              aplicações presentes e atuantes no lado do servidor, capazes de gerar conteúdo dinâmico na 
              World Wide Web.
            </p>
          </div>
          <div class="card-action">
            <a href="https://www.php.net/">Site</a>
          </div>
        </div>
      </div>
      <div class="col l6">
        <span style="color: white" style="font-weight: bold">espaço</span>
        <div class="card">
          <div class="card-image" style="background-color: #4479a1">
            <img src="img/mysql.png" style="width: 100px">
          </div>
          <div class="card-content">
            <span class="card-title" style="font-weight: bold">MySQL</span>
            <p style="text-align: justify">
              É um sistema de gerenciamento de banco de dados, que utiliza a linguagem SQL como 
              interface. É atualmente um dos sistemas de gerenciamento de bancos de dados mais populares 
              da Oracle Corporation.
            </p>
          </div>
          <div class="card-action">
            <a href="https://www.mysql.com/">Site</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col l6">
        <div class="card">
          <div class="card-image" style="background-color: #8c52ff">
            <img src="img/laragon.png" style="width: 100px">
          </div>
          <div class="card-content">
            <span class="card-title" style="font-weight: bold">Laragon</span>
            <p style="text-align: justify">
              Laragon é uma ferramenta de desenvolvimento local. Ela é portátil, rápida e possui suporte para tecnologias como o PHP, Node.js, Python, Java, Go e Ruby.
            </p>
          </div>
          <div class="card-action">
            <a href="https://laragon.org/">Site</a>
          </div>
        </div>
      </div>
    </div>  

  </div>

  <!-- JQuery -->
  <script src="js/jquery-3.6.0.min.js"></script>

  <!-- Materialize JS -->
  <script type="text/javascript" src="js/materialize.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>

  <!-- Java Script -->
  <script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

</body>

</html>