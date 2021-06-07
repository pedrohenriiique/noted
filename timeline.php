<?php
// Iniciando sessão
session_start();
// Verificação de sessão
include('php/verificasessao.php');
// Conexão com o BD
include('php/conexao.php');

$id = $_GET["variavel"];
$query = "select * from timeline where timeline_id = '$id'";
$result = mysqli_query($conexao, $query);
while($dados = mysqli_fetch_assoc($result)){
  $timeline_id = $dados['timeline_id'];
  $timeline_nome = $dados['timeline_nome'];
  $timeline_periodo_inicial = $dados['timeline_periodo_inicial'];
  $timeline_periodo_final = $dados['timeline_periodo_final'];
}
?>

<!doctype html>
<html class="no-js" lang=" pt-br ">

<head>
  <meta charset="utf-8">
  <title>Timeline 1</title>
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
          <a href="perfil.php" class="sidenav-trigger show-on-large">
            <i class="material-icons left">arrow_back</i>
          </a>             
          Timeline
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
    <div class="col l1" style="height: 30vh"></div>
    <div class="col l10" style="background-color: white">
      <div class="row center">
        <h2>
        <?php
        echo $timeline_nome;
        ?>
        </h2>  
      </div>
      <div class="row center">
        <h5>Período</h5>  
        <h5>
        <?php
        $novaData = date("d/m/Y", strtotime($timeline_periodo_inicial));
        echo $novaData;
        ?>
        até
        <?php
        $novaData = date("d/m/Y", strtotime($timeline_periodo_final));
        echo $novaData;
        ?>
        </h5>  
      </div>
    </div>
    <div class="col l1" style="height: 30vh; background-color: #38B774"></div>
  </div>

  <div style="margin: 0" class="row blue-grey-text text-darken-3 blue-grey darken-3">espaço</div>

  <div class="row" style="margin: 0">
    <div class="col l1" style="height: 20vh"></div>
    <div class="col l10" style="background-color: white">
      <div class="row center">
        <h2>Cronograma Semanal</h2>  
        <?php
          $query = "select * from tarefa_crono_semanal where timeline_id = $timeline_id";
          $result = mysqli_query($conexao, $query);
          $row = mysqli_num_rows($result);
          if($row == 0){
            ?>
            <h6>Você não possui.</h6>
            <?php
          }
          if($row > 0){
            $dados = mysqli_fetch_assoc($result);
            $i = 0;
            $data_ini[$i] = $dados['semanal_hora_inicio'];
            $data_fim[$i] = $dados['semanal_hora_fim'];
            $data_ref = $dados['semanal_hora_inicio'];
            while($dados = mysqli_fetch_assoc($result)){
              if($dados['semanal_hora_inicio'] != $data_ref){
                $data_ref = $dados['semanal_hora_inicio'];
                $i++;
                $data_ini[$i] = $dados['semanal_hora_inicio'];
                $data_fim[$i] = $dados['semanal_hora_fim'];
              }
            } 
        ?>
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
          <tbody>
            <?php
              for($j = 0; $j < $i+1; $j++){ 
                ?>
                <tr>
                <td><?php echo $data_ini[$j]?></td>
                <td><?php echo $data_fim[$j]?></td>
                <td id="Seg<?php echo $j ?>"></td>
                <td id="Ter<?php echo $j ?>"></td>
                <td id="Qua<?php echo $j ?>"></td>
                <td id="Qui<?php echo $j ?>"></td>
                <td id="Sex<?php echo $j ?>"></td>
                <td id="Sab<?php echo $j ?>"></td>
                <td id="Dom<?php echo $j ?>"></td>  
                <?php 
                $query = "select * from tarefa_crono_semanal where timeline_id = $timeline_id";
                $result = mysqli_query($conexao, $query);
                while($dados = mysqli_fetch_assoc($result)){
                  if($dados['semanal_hora_inicio'] == $data_ini[$j]){
                    if($dados['semanal_dia_semana'] == 'Seg'){
                      echo 
                      "<script>
                      var tarefa = ".json_encode($dados['semanal_tarefa']).";
                      document.getElementById('Seg".$j."').innerHTML = tarefa;
                      </script>";                 
                    }
                    if($dados['semanal_dia_semana'] == 'Ter'){
                      echo 
                      "<script>
                      var tarefa = ".json_encode($dados['semanal_tarefa']).";
                      document.getElementById('Ter".$j."').innerHTML = tarefa;
                      </script>";                 
                    }
                    if($dados['semanal_dia_semana'] == 'Qua'){
                      echo 
                      "<script>
                      var tarefa = ".json_encode($dados['semanal_tarefa']).";
                      document.getElementById('Qua".$j."').innerHTML = tarefa;
                      </script>";                 
                    }
                    if($dados['semanal_dia_semana'] == 'Qui'){
                      echo 
                      "<script>
                      var tarefa = ".json_encode($dados['semanal_tarefa']).";
                      document.getElementById('Qui".$j."').innerHTML = tarefa;
                      </script>";                 
                    }
                    if($dados['semanal_dia_semana'] == 'Sex'){
                      echo 
                      "<script>
                      var tarefa = ".json_encode($dados['semanal_tarefa']).";
                      document.getElementById('Sex".$j."').innerHTML = tarefa;
                      </script>";                 
                    }
                    if($dados['semanal_dia_semana'] == 'Sab'){
                      echo 
                      "<script>
                      var tarefa = ".json_encode($dados['semanal_tarefa']).";
                      document.getElementById('Sab".$j."').innerHTML = tarefa;
                      </script>";                 
                    }
                    if($dados['semanal_dia_semana'] == 'Dom'){
                      echo 
                      "<script>
                      var tarefa = ".json_encode($dados['semanal_tarefa']).";
                      document.getElementById('Dom".$j."').innerHTML = tarefa;
                      </script>";                    
                    }
                  }
                }
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col l1" style="height: 20vh; background-color: #38B774"></div>
  </div>

  <div style="margin: 0" class="row blue-grey-text text-darken-3 blue-grey darken-3">espaço</div>

  <div class="row" style="margin: 0">
    <div class="col l1" style="height: 20vh"></div>
      <div class="col l10" style="background-color: white">
        <div class="row center">
          <h2>Cronograma Mensal</h2>  
        </div>  
        <div class="row center">
          <div style="padding: 2% 2% 0 2%" id='calendar'></div>
        </div>  
      </div> 
    <div class="col l1" style="height: 20vh; background-color: #38B774"></div>  
  </div> 

  <!-- Modal -->
  <div id="modal" class="modal">
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
    var mensalInicio = "<?=$timeline_periodo_inicial?>";
    var mensalFim = "<?=$timeline_periodo_final?>";
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        locale: "pt-br",
        validRange: {
          start: mensalInicio,
          end: mensalFim 
        },
        headerToolbar: {
          left: 'title',
          right: 'prev,next',
        },
        selectable: true,
        events: [
          <?php
            $query = "select * from tarefa_crono_mensal where timeline_id = '$timeline_id'";
            $result = mysqli_query($conexao, $query);
            while($dados = mysqli_fetch_assoc($result)){
              ?>
              {id: '<?php echo $dados['mensal_id']; ?>',
              title: '<?php echo $dados['mensal_tarefa']; ?>',
              start: '<?php echo $dados['mensal_datetime_inicio']; ?>',
              end: '<?php echo $dados['mensal_datetime_fim']; ?>',
              color: '<?php echo $dados['mensal_cor']; ?>',
              },<?php
            }     
          ?>
        ],
        dayMaxEventRows: 3,
        eventClick: function(info) {
          $('#modal').modal('open');
          $('#modal #evento').html('<span style="font-weight:bold">Evento: </span>' + info.event.title);
          $('#modal #hora_inicial').html('<span style="font-weight:bold">Inicío do evento: </span>' + info.event.start.toLocaleString());
          $('#modal #hora_final').html('<span style="font-weight:bold">Fim do evento: </span>' + info.event.end.toLocaleString());
        }
      });
      calendar.render();
    });
  </script>

</body>

</html>