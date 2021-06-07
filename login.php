<?php
// Iniciando sessão
session_start();
?>

<!doctype html>
<html class="no-js" lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>Login</title>
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
  <div class="row" style="margin-bottom: 0">
    <div class="col l3 indigo" style="height: 115vh"></div>
    <div class="col l6">
      <div class="row center" style="margin-top: 3%">
        <img src="img/logo-2.png" width="25%">  
      </div>

      <!-- PHP -->
      <?php
      if(isset($_SESSION['login_campo_vazio'])){
      ?>
        <div class="row center black" style="margin-top: 5%; color: white; padding: 2% 2% 2% 2%">
          <h5 style="margin-top:0">Campos vazios!</h5>
          <h6>Preencha todos os campos para prosseguir com o login.</h7><br/>
        </div>
      <?php
      }
      unset($_SESSION['login_campo_vazio']);
      ?>

      <?php
      if(isset($_SESSION['login_invalido'])){
      ?>
        <div class="row center"></div>
        <div class="row center grey darken-2" style="margin-top: 5%; color: white; padding: 2% 2% 2% 2%">
          <h6 style="margin-top:0">Email ou senha inválidos.</h6>
        </div>
      <?php
      }
      unset($_SESSION['login_invalido']);
      ?>
      <!-- -->

      <form action="php/login.php" method="POST">
        <div class="row">
          <div class="col l3"></div>
          <div class="input-field col l6">
            <input name="email_login" id="email" type="email" class="validate">
            <label for="email">Email</label>
          </div> 
          <div class="col l3"></div>
        </div>
        <div class="row" style="margin-top: -3%">
          <div class="col l3"></div>
          <div class="input-field col l6">
            <input name="senha_login" id="senha" type="password" class="validate">
            <label for="senha">Senha</label>
          </div>
          <div class="col l3"></div>
        </div>
        <div class="row center">
          <button class="btn" type="submit">Entrar</button>
        </div>
      </form>
      <div class="row center" style="margin-top: 5%">
        <h7 style="font-weight: bold">ou</h7>
      </div>
      <div class="row center">
        <a class="btn" style="background-color: #f53e28;">
          <img src="img/gplus.png" style="margin-right: 5px; margin-top: 2px;" class="left">
          <span style="text-transform: none; font-size: medium">Entrar com Google</span>
        </a>
      </div>
      <div class="row center" style="margin-top: 5%">
        <h7>Não possui conta?</h7>
        </br>
        <a href="cadastro.php">Criar conta</a>
      </div>
    </div>
    <div class="col l3 indigo" style="height: 115vh"></div>
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