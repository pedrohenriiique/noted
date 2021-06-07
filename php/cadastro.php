<?php
// Iniciando sessão
session_start();
// Conexão com o BD
include('conexao.php');

# Verifica se o usuário deixou algum campo vazio
if(empty($_POST['nome_cadastro']) || empty($_POST['nascimento_cadastro']) || empty($_POST['sexo_cadastro']) || empty($_POST['email_cadastro']) || empty($_POST['senha_cadastro'])){
    $_SESSION['cadastro_campo_vazio'] = true;
    header('Location: ../cadastro.php');
    exit();
}

# A função mysqli_real_escape_string() realiza algumas validações contra ataque de SQL Injection
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome_cadastro']));
$nasc = mysqli_real_escape_string($conexao, trim($_POST['nascimento_cadastro']));
$nasc_part1 = substr($nasc, 6);
$nasc_part2 = substr($nasc, 3, -5);
$nasc_part3 = substr($nasc, 0, 2);
$nascimento = $nasc_part1.'-'.$nasc_part2.'-'.$nasc_part3;
$sexo = mysqli_real_escape_string($conexao, $_POST['sexo_cadastro']);
$email = mysqli_real_escape_string($conexao, trim($_POST['email_cadastro']));
$senha = mysqli_real_escape_string($conexao, md5(trim($_POST['senha_cadastro'])));

# Verificando se já existe o email cadastrado
$query = "select count(*) as total from usuario where usuario_email = '$email'";
$result = mysqli_query($conexao, $query);
$row = mysqli_fetch_assoc($result);
if($row['total'] >= 1){
    $_SESSION['cadastro_email_repetido'] = true;
    header('Location: ../cadastro.php');
    exit();
}

# Inserindo o usuário no BD
$query2 = "insert into usuario (usuario_nome, usuario_nascimento, usuario_sexo, usuario_email, usuario_senha, usuario_timelines, usuario_data_cadastro) values ('$nome','$nascimento','$sexo','$email','$senha', 0, NOW())";
if($conexao->query($query2) === true){
    $_SESSION['cadastro_realizado'] = true;
    header('Location: ../cadastro.php');
    exit();
}else{
    $_SESSION['cadastro_nao_realizado'] = true;
    header('Location: ../cadastro.php');
    exit();
}