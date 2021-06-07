<?php
// Iniciando sessão
session_start();
// Verificação de sessão
include('php/verificasessao.php');
// Conexão com o BD
include('php/conexao.php');
?>

<!doctype html>
<html class="no-js" lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>Perfil</title>
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
  
  <!-- Menu lateral -->
  <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="img/agenda.jpg">
      </div>
      <i class="material-icons medium" style="color:white">account_circle</i>
      <a>
        <span class="white-text name">
          <?php
          echo $_SESSION['usuario_nome'];
          ?>
        </span>
      </a>
      <a>
        <span class="white-text email">
          <?php
          echo $_SESSION['usuario_email'];
          ?>
        </span>
      </a>
    </div></li>
    <li><a href="perfil.php"><i class="material-icons">assignment_ind</i>Perfil</a></li>
    <li><div class="divider"></div></li>
    <li><a href='#modal2' class="modal-trigger"><i class="material-icons">timeline</i>Meus Timelines</a></li>
    <li><a href="criar.php"><i class="material-icons">post_add</i>Criar Timeline</a></li>
    <li><div class="divider"></div></li>
    <li><a href="php/logout.php"><i class="material-icons">logout</i>Sair</a></li>
  </ul>

  <!-- Barra fixa -->
  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper indigo">
        <div class="row">
          <div class="col l2" style="font-size: 130%;">
            <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large">
              <i class="material-icons left">menu</i>
            </a>
            Perfil
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
  <div class="row center" style="background-color: #38B774; margin-bottom:0">
    <div style="display: inline-block"> 
      <i class="material-icons large right black-text">person</i>
    </div>
    <div style="display: inline-block; text-align: left">
      <ul style="color:white">
        <li style="font-weight:bold">
          <?php
          echo $_SESSION['usuario_nome'];
          ?>
        </li>
        <li>
          <span style= "font-weight: bold">Idade: </span>
          <?php
          $dataNascimento = $_SESSION['usuario_nascimento'];
          $data = new DateTime($dataNascimento);
          $resultado = $data->diff( new DateTime( date('Y-m-d') ) );
          echo $resultado->format( '%Y anos' );
          ?>
        </li>
        <li>
          <span style= "font-weight: bold">Sexo: </span>
          <?php
          if($_SESSION['usuario_sexo'] == 'M' || $_SESSION['usuario_sexo'] == 'm')
            echo 'Masculino';
          elseif($_SESSION['usuario_sexo'] == 'F' || $_SESSION['usuario_sexo'] == 'f')
            echo 'Feminino'
          ?>
        </li>
        <li>
          <span style= "font-weight: bold">Timelines criados: </span>
          <?php
          echo $_SESSION['usuario_timelines'];
          ?>
          </li>
      </ul>
    </div>
  </div>
  
  <div class="row" style="font-size: 120%;">
    <div class="col l1"></div>
    <div class="col l10">
      <div class="row">
        <div style="display: inline-block; margin-top: 3%">
          <i class="material-icons large left" style="color:black">assignment</i>
        </div> 
        <div style="display: inline-block;">
          <h4 class="right">Passo a Passo inicial</h4>
        </div>
      </div>
      <a class="btn-floating btn-large waves-effect waves-light red" style="font-weight:bold">1</a>
      <span class="center">Após autenticado o usuário deve criar uma Timeline.</span>
      </br>
      </br>
      <a class="btn-floating btn-large waves-effect waves-light red" style="font-weight:bold">2</a>
      <span class="center">
        Ao criar uma Timeline o usuário pode optar pela criação de Cronogramas Mensais e/ou Semanais.
      </span>
      </br>
      </br>
      <a class="btn-floating btn-large waves-effect waves-light red" style="font-weight:bold">3</a>
      <span class="center">O usuário deve escolher quais atividades ele deseja receber notificações.</span>
      </br>
      </br>
      <a class="btn-floating btn-large waves-effect waves-light red" style="font-weight:bold">4</a>
      <span class="center">Por fim, o usuário finaliza a criação do Timeline.</span>
    </div>
    <div class="col l1"></div>
  </div>

  <!-- Modal -->
  <div id="modal2" class="modal">
    <div class="modal-content">
      <h4>Seus Timelines</h4>
      <?php
        // GET Timelines do usuário
        $usuario_id = $_SESSION['usuario_id'];
        $query = "select * from timeline where usuario_id = '$usuario_id'";
        $result = mysqli_query($conexao, $query);
        $row = mysqli_num_rows($result);
        if($row == 0){
          echo 'Você ainda não criou nenhum Timeline.';
        }
        else{
          while($dados = mysqli_fetch_assoc($result)){
            ?> 
            <a href="timeline.php?variavel=<?php echo $dados['timeline_id']?>" style="font-weight: bold">
              <?php echo $dados['timeline_nome'];?>
            </a></br>
            <?php
          }
        }
      ?>
    </div>
    <div class="modal-footer">
      <a class="modal-close waves-effect waves-green btn-flat left">Fechar</a>
    </div>
  </div>

  <!-- JQuery -->
  <script src="js/jquery-3.6.0.min.js"></script>

  <!-- Materialize JS -->
  <script type="text/javascript" src="js/materialize.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon');
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>

  <!-- Java Script -->
  <script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  
</body>

</html>