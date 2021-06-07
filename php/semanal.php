<?php
// Iniciando a sessão
session_start();
// Conexão com o BD
include('conexao.php');

// Número de linhas
$num_linhas = mysqli_real_escape_string($conexao, trim($_POST['numLinhas']));
$num_linhas = ($num_linhas + 1);
// Número de colunas + 1
$num_colunas = 8;

$contador = 0;

for($i = 1; $i < $num_linhas; $i++){
    for($j = 1; $j < $num_colunas; $j++){
        $hora_inicial = mysqli_real_escape_string($conexao, trim($_POST['horaIni_'.$i]));
        $hora_final = mysqli_real_escape_string($conexao, trim($_POST['horaFim_'.$i]));
        if ($hora_inicial == null || $hora_final == null){
            $contador = $contador + 1;
        }
    }
}
if($contador == 0){
    for($i = 1; $i < $num_linhas; $i++){
        for($j = 1; $j < $num_colunas; $j++){
            $tarefa = mysqli_real_escape_string($conexao, trim($_POST['tarefa_'.$i.$j]));
            $hora_inicial = mysqli_real_escape_string($conexao, trim($_POST['horaIni_'.$i]));
            $hora_final = mysqli_real_escape_string($conexao, trim($_POST['horaFim_'.$i]));
            if ($tarefa != null){
                if($j == 1){
                    $dia_semana = 'Seg';
                }
                elseif($j == 2){
                    $dia_semana = 'Ter';
                }
                elseif($j == 3){
                    $dia_semana = 'Qua';
                }
                elseif($j == 4){
                    $dia_semana = 'Qui';
                }
                elseif($j == 5){
                    $dia_semana = 'Sex';
                }
                elseif($j == 6){
                    $dia_semana = 'Sab';
                }
                elseif($j == 7){
                    $dia_semana = 'Dom';
                }

                $timeline_id = $_SESSION['timeline_id'];

                # Inserindo tarefas semanais no BD
                $query = "insert into tarefa_crono_semanal (semanal_dia_semana, semanal_hora_inicio, semanal_hora_fim, semanal_tarefa, timeline_id) values ('$dia_semana','$hora_inicial','$hora_final','$tarefa','$timeline_id')";
                $conexao->query($query); 
                
            }           
        }
    }
    $_SESSION['tarefas_semanais_criadas'] = true;
    header('Location: ../cronogramas.php');
    exit();
}else{
    $_SESSION['horario_campo_vazio'] = true;
    header('Location: ../cronogramas.php');
    exit();
}