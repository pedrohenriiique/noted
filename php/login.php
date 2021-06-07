<?php
// Iniciando sessão
session_start();
// Conexão com o BD
include('conexao.php');

# Verifica se o usuário deixou algum campo vazio
if(empty($_POST['email_login']) || empty($_POST['senha_login'])){
    $_SESSION['login_campo_vazio'] = true;
    header('Location: ../login.php');
    exit();
}

# A função mysqli_real_escape_string() realiza algumas validações contra ataque de SQL Injection
$email = mysqli_real_escape_string($conexao, trim($_POST['email_login']));
$senha = mysqli_real_escape_string($conexao, md5(trim($_POST['senha_login'])));

# Query SELECT que será feita no BD
$query = "select * from usuario where usuario_email = '$email' and usuario_senha = '$senha'";

# Resultado da Query
$result = mysqli_query($conexao, $query);

# A função mysqli_num_rows() retorna o número de linhas da variável result
$row = mysqli_num_rows($result);

if($row == 1){
    while($dados = mysqli_fetch_assoc($result)){
        $_SESSION['usuario_id'] = $dados['usuario_id'];
        $_SESSION['usuario_nome'] = $dados['usuario_nome'];
        $_SESSION['usuario_nascimento'] = $dados['usuario_nascimento'];
        $_SESSION['usuario_sexo'] = $dados['usuario_sexo'];
        $_SESSION['usuario_email'] = $dados['usuario_email'];
        $_SESSION['usuario_timelines'] = $dados['usuario_timelines'];
    }
    header('Location: ../perfil.php');
    exit();  
}else{
    $_SESSION['login_invalido'] = true;
    header('Location: ../login.php');
    exit();  
}