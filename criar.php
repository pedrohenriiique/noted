<?php
// Iniciando sessão
session_start();
// Verificação de sessão
include('php/verificasessao.php');
?>

<!doctype html>
<html class="no-js" lang=" pt-br ">

<head>
  <meta charset="utf-8">
  <title>Criar Timeline</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="shortcut icon" href="favicon_noted.ico">
 
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Materialize CSS -->
  <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

  <meta name="theme-color" content="#fafafa">
</head>

<body>
     
  <!-- Barra fixa -->
  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper indigo">
        <div class="row">
          <div class="col l2" style="font-size: 130%;">
            <a href="perfil.php" class="sidenav-trigger show-on-large">
              <i class="material-icons left">arrow_back</i>
            </a>           
            Criar Timeline
          </div>
          <div class="col l8">
            <ul class="center"> 
              <li style="float: none; display: inline-block;">
                <a style="font-size: 130%;">
                  <img src="img/logo.png" class="responsive-img left">noted
                </a>
              </li>
            </ul>
          </div>
        </div>          
      </div>
    </nav>
  </div>

  <!-- Conteúdo -->
  <div class="row" style="margin-bottom: 0">
    <div class="col l3" style="height: 91vh; background-color: #38B774"></div>
    <div class="col l6">
      <div class="row center">
        <h2>Timeline</h2>  
      </div>

      <!-- PHP --> 
      <?php
      if(isset($_SESSION['timeline_campo_vazio'])){
      ?>
        <div class="row center black" style="margin-top: 5%; color: white; padding: 2% 2% 2% 2%">
          <h5 style="margin-top:0">Campos vazios!</h5>
          <h6>Preencha todos os campos para prosseguir com a criação do timeline.</h7><br/>
        </div>
      <?php
      }
      unset($_SESSION['timeline_campo_vazio']);
      ?>
      <!-- -->

      <form action="php/criar.php" method="POST">
        <div class="row" style="margin-top: -3%">
          <div class="col l3"></div>
          <div class="input-field col l6">
            <input name="nome" id="nome" type="text" class="validate">
            <label for="nome">Nome</label>
          </div> 
          <div class="col l3"></div>
        </div>
        <div class="row" style="margin-top: -3%">
          <div class="col l3"></div>
          <div class="input-field col l6">
            <input name="periodoInicial" id="periodoInicial" type="text" class="datepicker_timeline validate">
            <label for="periodoInicial">Período Inicial</label>
          </div> 
          <div class="col l3"></div>
        </div>
        <div class="row" style="margin-top: -3%">
          <div class="col l3"></div>
          <div class="input-field col l6">
            <input name="periodoFinal" id="periodoFinal" type="text" class="datepicker_timeline validate">
            <label for="periodoFinal">Período Final</label>
          </div> 
          <div class="col l3"></div>
        </div>
        <div class="row center">
          <button class="btn" type="submit">Prosseguir</button>
        </div>
      </form>
    </div>
    <div class="col l3" style="height: 91vh; background-color: #38B774"></div>
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