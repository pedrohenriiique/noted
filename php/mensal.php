<?php
// Iniciando sessão
session_start();
// Conexão com o BD
include('conexao.php');

# Verifica se o usuário deixou algum campo vazio
if(empty($_POST['tarefa']) || empty($_POST['datatime_inicio']) || empty($_POST['datatime_fim'])){
    $_SESSION['mensal_campo_vazio'] = true;
    header('Location: ../cronogramas.php');
    exit();
}

# A função mysqli_real_escape_string() realiza algumas validações contra ataque de SQL Injection
$tarefa = mysqli_real_escape_string($conexao, trim($_POST['tarefa']));
$cor = mysqli_real_escape_string($conexao, trim($_POST['cor']));
$ini = mysqli_real_escape_string($conexao, trim($_POST['datatime_inicio']));
$ini_part1 = substr($ini, 6, 4);
$ini_part2 = substr($ini, 3, 2);
$ini_part3 = substr($ini, 0, 2);
$ini_part4 = substr($ini, 10, 9);
$inicio = $ini_part1.'-'.$ini_part2.'-'.$ini_part3.$ini_part4;
$fi = mysqli_real_escape_string($conexao, trim($_POST['datatime_fim']));
$fi_part1 = substr($fi, 6, 4);
$fi_part2 = substr($fi, 3, 2);
$fi_part3 = substr($fi, 0, 2);
$fi_part4 = substr($fi, 10, 9);
$fim = $fi_part1.'-'.$fi_part2.'-'.$fi_part3.$fi_part4;
$timeline_id = $_SESSION['timeline_id'];

# Inserindo tarefa mensal no BD
$query = "insert into tarefa_crono_mensal (mensal_tarefa, mensal_cor, mensal_datetime_inicio, mensal_datetime_fim, timeline_id) values ('$tarefa','$cor','$inicio','$fim','$timeline_id')";
if($conexao->query($query) === true){
    $_SESSION['tarefa_mensal_cadastrada'] = true;
    header('Location: ../cronogramas.php');
    exit();
}else{
    $_SESSION['tarefa_mensal_nao_cadastrada'] = true;
    header('Location: ../cronogramas.php');
    exit();
}