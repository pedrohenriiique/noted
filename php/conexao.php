<?php
# Definição de 4 constantes para conexão com o BD
# IP do BD
define('HOST','127.0.0.1');
# Usuário do BD
define('USUARIO','root');
# Senha do BD
define('SENHA','root');
# Nome do banco
define('BD','noted');

# Variável conexão
$conexao = mysqli_connect(HOST, USUARIO, SENHA, BD) or die ('Não foi possível conectar.');