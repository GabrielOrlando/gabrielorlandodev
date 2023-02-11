<?php

$data_atual = date("Y-m-d");

require_once('../conn.php');
require_once('../logs/new.php');

// session_start inicia a sessão
session_start();

// Cria a conexao
$conn = mysqli_connect($servername, $username, $password, $database);
$conn->set_charset("utf8");

// Verifica se houve erro de conexão
if (!$conn) {
    logMsg('Conexão falhou: ' . mysqli_connect_error(), 'error', '../logs/');
    die("Conexão falhou: " . mysqli_connect_error());
}

$login = $_POST['usuario'];
$senha = md5($_POST['senha']);

$sql_login = "SELECT DISTINCT usu_id, usu_nome, usu_sobrenome, usu_email FROM tbl_usuarios WHERE usu_email = '$login' AND usu_senha = '$senha'"; // Consulta de login

$sql_update_data_ultimo_login = "UPDATE tbl_usuarios SET usu_data_ultimo_login = date('Y-m-d H-m-s') WHERE usu_email = '$login'";

$resultado_id = mysqli_query($conn, $sql_login); // Salvar a consulta numa variavel

// echo json_encode($resultado_id);

//Executa SQL
if ($resultado_id) {
    $dados_u = mysqli_fetch_assoc($resultado_id);

    if (isset($dados_u['usu_email'])) {
        $_SESSION['usuarios_id'] = $dados_u['usuarios_id'];
        $_SESSION['usuarios_nome'] = $dados_u['usuarios_nome'];
        $_SESSION['usuarios_sobrenome'] = $dados_u['usuarios_sobrenome'];
        $_SESSION['usuarios_email'] = $dados_u['usuarios_email'];

        mysqli_query($conn, $sql_update_data_ultimo_login);
        logMsg('Login bem sucedido! User:' . $login, 'info', '../logs/');

        // header("Location: ../../painel_controle/home.php");
    } else {
        logMsg('Login falhou. User:' . $login, 'info', '../logs/');
        echo 'Usuário ou senha incorreta.';
    }

    // echo json_encode($rows);
} else {
    logMsg("Erro na execução da consulta, favor entrar em contato com o admin do sistema.", "error", '../logs/');
    echo "Erro na execução da consulta, favor entrar em contato com o admin do sistema.";
}

mysqli_close($conn);
