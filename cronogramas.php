<?php
// Iniciando sessão
session_start();
// Verificação de sessão
include('php/verificasessao.php');
// Conexão com o BD
include('php/conexao.php');

// GET tarefas Mensais do BD
$query = 'select * from tarefa_crono_mensal';
$result = mysqli_query($conexao, $query);
?>

<!doctype html>
<html class="no-js" lang=" pt-br ">

<head>
  <meta charset="utf-8">
  <title>Cronograma Semanal</title>
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
  <link rel='stylesheet' href='css/calendario.css'>
  
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Materialize CSS -->
  <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

  <meta name="theme-color" content="#fafafa">
</head>

<body style="background-color: #38B774">

  <!-- Barra fixa -->
  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper indigo">
        <div class="row">
          <div class="col l2" style="font-size: 130%;">
          <a href="perfil.php" class="show-on-large sidenav-trigger">
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
    <div class="col l1" style="height: 200vh; background-color: #38B774;"></div>
    <div class="col l10" style="background-color: white">
      <div class="row center">
        <h2>Cronograma Semanal</h2>  
      </div>
      <div class="row center">
        <form action="php/semanal.php" method="POST">
          <div class="col l4"></div>
          <div class="input-field col l1">
            <select id="numHorarios" name="numLinhas">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
            <label>Horários</label>
          </div>
          <div class="col l3">
            <a class="btn gerarTabela" style="margin-top: 15px; text-transform: none">Gerar Tabela Semanal</a>
          </div>
          <div class="col l4"></div>
          <table id="tabelaSemana" class="centered highlight striped">
            <thead>
              <tr>
                  <th>Início</th>
                  <th>Fim</th>
                  <th>Segunda-feira</th>
                  <th>Terça-feira</th>
                  <th>Quarta-feira</th>
                  <th>Quinta-feira</th>
                  <th>Sexta-feira</th>
                  <th>Sábado</th>
                  <th>Domingo</th>
              </tr>
            </thead>
          </table>
          <button class="btn green" type="submit" style="text-transform: none; margin-bottom: 30px">Finalizar Cronograma Semanal</button>
        </form>
      </div>

      <!-- PHP --> 
      <?php
      if(isset($_SESSION['horario_campo_vazio'])){
      ?>
        <div class="row center black" style="color: white; padding: 2% 2% 2% 2%">
          <h5 style="margin-top:0">Campos vazios!</h5>
          <h6>Você deve preencher todos os períodos de horários.</h7>
        </div>
      <?php
      }
      unset($_SESSION['horario_campo_vazio']);
      ?>
      <?php
      if(isset($_SESSION['tarefas_semanais_criadas'])){
      ?>
        <div class="row center green" style="color: white; padding: 2% 2% 2% 2%">
          <h5 style="margin-top:0">Cronograma Semanal finalizado!</h5>
          <!--
          <h6>Visualizar em 
            <span class="black-text" style="font-weight: bold">PDF</span>
          </h7>
          -->
        </div>
      <?php
      }
      unset($_SESSION['tarefas_semanais_criadas']);
      ?>
      <!-- -->
   
      <div class="row blue-grey-text text-darken-3 blue-grey darken-3">espaço</div>

      <div class="row center">
        <h2>Cronograma Mensal</h2>  
      </div>
      <div class="row center">
        <div style="padding: 2%" id='calendar'></div>
      </div>
      <div class="row center" style="margin-bottom: 4%">
        <a href="perfil.php" class="btn green" style="text-transform: none">Finalizar Cronograma Mensal</a>
      </div>

      <!-- Modal -->
      <div id="modal1" class="modal">
        <div class="modal-content">
          <h4>Cadastrar evento</h4>
          <div class="divider"></div>
          <form action="php/mensal.php" method="POST">
            <div class="row" style="margin: 2% 0 0 0">
              <div class="input-field col l12">
                <i class="material-icons prefix">description</i>
                <input id="icon_prefix" type="text" class="validate" name="tarefa">
                <label for="icon_prefix">Tarefa</label>
              </div>
            </div>
            <div class="row" style="margin:0">
              <div class="input-field col l12">
                <i class="material-icons prefix">color_lens</i>
                <select name="cor">
                  <option value="#ff0000">Vermelho</option>
                  <option value="#0000ff">Azul</option>
                  <option value="#ffff00">Amarelo</option>
                  <option value="#00ff00">Verde</option>
                </select>
                <label>Cor</label>
              </div>
            </div>
            <div class="row" style="margin:0">
              <div class="input-field col l12">
                <i class="material-icons prefix">access_time</i>
                <input placeholder="" id="inicio_evento" type="text" class="validate" name="datatime_inicio">
                <label for="inicio_evento">Início do evento</label>
              </div>
            </div>
            <div class="row" style="margin:0">
              <div class="input-field col l12">
                <i class="material-icons prefix">access_time</i>
                <input placeholder="" id="final_evento" type="text" class="validate" name="datatime_fim">
                <label for="final_evento">Final do evento</label>
              </div>
            </div>
            <div class="row center" style="margin:0">
              <button class="btn green" type="submit">Finalizar</button> 
            </div> 
          </form>
        </div>
      </div>  

      <!-- Modal 2 -->
      <div id="modal2" class="modal">
        <div class="modal-content">
          <h4>Detalhes do evento</h4>
          <div class="divider"></div>
          <h5 id="evento"></h5>   
          <h5 id="hora_inicial"></h5> 
          <h5 id="hora_final"></h5>        
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-close waves-green btn-flat green white-text">Fechar</a>
        </div>
      </div>              
    </div>
    <div class="col l1" style="height: 200vh; background-color: #38B774"></div>
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

  <!-- Full Calendar -->
  <script src="js/calendario.js"></script>
  <script src="js/pt-br.js"></script>

  <script>
    var mensalInicio = "<?= $_SESSION['mensal_inicio'];?>";
    var mensalFim = "<?=$_SESSION['mensal_fim']?>";
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        validRange: {
          start: mensalInicio,
          end: mensalFim 
        },
        locale: "pt-br",
        headerToolbar: {
          left: 'title',
          right: 'prev,next',
        },
        selectable: true,
        select: function(info) {
          $('#modal1').modal('open');
          $('#modal1 #inicio_evento').val(info.start.toLocaleString());
          $('#modal1 #final_evento').val(info.end.toLocaleString());
        },
        events: [
          <?php
            while($dados = mysqli_fetch_assoc($result)){
              if($dados['timeline_id'] == $_SESSION['timeline_id']){
                ?>
                {id: '<?php echo $dados['mensal_id']; ?>',
                title: '<?php echo $dados['mensal_tarefa']; ?>',
                start: '<?php echo $dados['mensal_datetime_inicio']; ?>',
                end: '<?php echo $dados['mensal_datetime_fim']; ?>',
                color: '<?php echo $dados['mensal_cor']; ?>',
                },<?php
              }     
            }
          ?>
        ],
        dayMaxEventRows: 3,
        eventClick: function(info) {
          $('#modal2').modal('open');
          $('#modal2 #evento').html('<span style="font-weight:bold">Evento: </span>' + info.event.title);
          $('#modal2 #hora_inicial').html('<span style="font-weight:bold">Inicío do evento: </span>' + info.event.start.toLocaleString());
          $('#modal2 #hora_final').html('<span style="font-weight:bold">Fim do evento: </span>' + info.event.end.toLocaleString());
        }
      });
      calendar.render();
    });
  </script>

</body>

</html>