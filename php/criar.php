<?php
// Iniciando sessão
session_start();
// Conexão com o BD
include('conexao.php');

# Verifica se o usuário deixou algum campo vazio
if(empty($_POST['nome']) || empty($_POST['periodoInicial']) || empty($_POST['periodoFinal'])){
    $_SESSION['timeline_campo_vazio'] = true;
    header('Location: ../criar.php');
    exit();
}

# A função mysqli_real_escape_string() realiza algumas validações contra ataque de SQL Injection
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$per_ini = mysqli_real_escape_string($conexao, trim($_POST['periodoInicial']));
$per_ini_part1 = substr($per_ini, 6);
$per_ini_part2 = substr($per_ini, 3, -5);
$per_ini_part3 = substr($per_ini, 0, 2);
$periodo_inicial = $per_ini_part1.'-'.$per_ini_part2.'-'.$per_ini_part3;
$per_fin = mysqli_real_escape_string($conexao, trim($_POST['periodoFinal']));
$per_fin_part1 = substr($per_fin, 6);
$per_fin_part2 = substr($per_fin, 3, -5);
$per_fin_part3 = substr($per_fin, 0, 2);
$periodo_final = $per_fin_part1.'-'.$per_fin_part2.'-'.$per_fin_part3;
$id_usuario = $_SESSION['usuario_id'];

# Inserindo a Timeline no BD
$query = "insert into timeline (timeline_nome, timeline_periodo_inicial, timeline_periodo_final, usuario_id) values ('$nome','$periodo_inicial','$periodo_final',$id_usuario)";

if($conexao->query($query) === true){
    // Pega o id do timeline criado
    $query2 = "select timeline_id from timeline where (timeline_nome, timeline_periodo_inicial, timeline_periodo_final, usuario_id) = ('$nome','$periodo_inicial','$periodo_final',$id_usuario)";
    $result = mysqli_query($conexao, $query2);
    $dados = mysqli_fetch_assoc($result);
    $_SESSION['timeline_id'] = $dados['timeline_id'];

    // Alterando o campo usuario_timelines da tabela usuario do BD
    $query3 = "select usuario_timelines from usuario where usuario_id = $id_usuario";
    $result = mysqli_query($conexao, $query3);
    $dados = mysqli_fetch_assoc($result);
    $contador = $dados['usuario_timelines'] + 1;
    $_SESSION['usuario_timelines'] = $contador;
    $query4 = "update usuario set usuario_timelines = $contador where usuario_id = $id_usuario";
    mysqli_query($conexao, $query4);

    // Guarda valores do período do timeline na sessão
    $_SESSION['mensal_inicio'] = $periodo_inicial;
    $per_fin_part3 = $per_fin_part3 + 1;
    $periodo_final = $per_fin_part1.'-'.$per_fin_part2.'-'.$per_fin_part3;
    $_SESSION['mensal_fim'] = $periodo_final;
    
    header('Location: ../cronogramas.php');
    exit();
}