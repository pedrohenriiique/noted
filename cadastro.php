<?php
// Iniciando sessão
session_start();
?>

<!doctype html>
<html class="no-js" lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>Cadastro</title>
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
    <div class="col l3 indigo" style="height: 155vh"></div>
    <div class="col l6">
      <div class="row center" style="margin-top: 3%">
        <img src="img/logo-2.png" width="25%">  
      </div>

      <!-- PHP --> 
      <?php
      if(isset($_SESSION['cadastro_campo_vazio'])){
      ?>
        <div class="row center black" style="margin-top: 5%; color: white; padding: 2% 2% 2% 2%">
          <h5 style="margin-top:0">Campos vazios!</h5>
          <h6>Preencha todos os campos para prosseguir com o cadastro.</h7><br/>
        </div>
      <?php
      }
      unset($_SESSION['cadastro_campo_vazio']);
      ?>

      <?php
      if(isset($_SESSION['cadastro_email_repetido'])){
      ?>
        <div class="row center red" style="margin-top: 5%; color: white; padding: 2% 2% 2% 2%">
          <h5 style="margin-top:0">O endereço de email já está sendo utilizado!</h5>
          <h6>Refaça o cadastro informando outro endereço de email.</h7><br/>
        </div>
      <?php
      }
      unset($_SESSION['cadastro_email_repetido']);
      ?>

      <?php
      if(isset($_SESSION['cadastro_realizado'])){
      ?>
        <div class="row center green" style="margin-top: 5%; color: white; padding: 2% 2% 2% 2%">
          <h5 style="margin-top:0">Cadastro efetuado!</h5>
          <h6>Faça login informando seu usuário e senha.</h7><br />
          <a class="btn indigo" href="login.php" style="margin-top: 2%">Fazer login</a>
        </div>
      <?php
      }
      unset($_SESSION['cadastro_realizado']);
      ?>

      <?php
      if(isset($_SESSION['cadastro_nao_realizado'])){
      ?>
        <div class="row center gray darken-2" style="margin-top: 5%; color: white; padding: 2% 2% 2% 2%">
          <h5 style="margin-top:0">Ocorreu um erro no processo!</h5>
          <h6>Tente novamente mais tarde.</h7><br/>
          <a class="btn indigo" href="login.php" style="margin-top: 2%">Fazer login</a>
        </div>
      <?php
      }
      unset($_SESSION['cadastro_nao_realizado']);
      ?>
      <!-- -->

      <form action="php/cadastro.php" method="POST">
        <div class="row">
          <div class="col l3"></div>
          <div class="input-field col l6">
            <input name="nome_cadastro" id="nome" type="text" class="validate">
            <label for="nome">Nome</label>
          </div> 
          <div class="col l3"></div>
        </div>
        <div class="row" style="margin-top: -3%">
          <div class="col l3"></div>
          <div class="input-field col l6">
            <input name="nascimento_cadastro" id="data" type="text" class="datepicker_nasc validate">
            <label for="data">Data de nascimento</label>
          </div> 
          <div class="col l3"></div>
        </div>
        <div class="row" style="margin-top: -3%">
          <div class="col l3"></div>
          <div class="input-field col l6">
            <span style="font-weight: bold">Sexo</span>
            <p>
              <label>
                <input name="sexo_cadastro" type="radio" class="with-gap" value="M"/>
                <span>Masculino</span>
              </label>
            </p>
            <p>
              <label>
                <input name="sexo_cadastro" type="radio" class="with-gap" value="F"/>
                <span>Feminino</span>
              </label>
            </p>   
          </div>
          <div class="col l3"></div>
        </div>
        <div class="row" style="margin-top: -3%">
          <div class="col l3"></div>
          <div class="input-field col l6">
            <input name="email_cadastro" id="email" type="email" class="validate">
            <label for="email">Email</label>
          </div> 
          <div class="col l3"></div>
        </div>
        <div class="row" style="margin-top: -3%">
          <div class="col l3"></div>
          <div class="input-field col l6">
            <input name="senha_cadastro" id="password" type="password" class="validate">
            <label for="password">Senha</label>
          </div>
          <div class="col l3"></div>
        </div>
        <div class="row center">
          <button class="btn" type="submit">Cadastrar</button>
        </div>
      </form>
      <div class="row center" style="margin-top: 5%">
        <h7>Já possui conta?</h7>
        </br>
        <a href="login.php">Entrar</a>
      </div>  
    </div>
    <div class="col l3 indigo" style="height: 155vh"></div>
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