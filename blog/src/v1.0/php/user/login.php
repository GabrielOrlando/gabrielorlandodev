<?php

$data_atual = date("Y-m-d");

require_once('../conn.php');
require_once('../logs/new.php');

session_start();

$conn = mysqli_connect($servername, $username, $password, $database);
$conn->set_charset("utf8");

if (!$conn) {
    logMsg('Conexão falhou: ' . mysqli_connect_error(), 'error', '../logs/');
    die("Conexão falhou: " . mysqli_connect_error());
}

$login = $_POST['usuario'];
$senha = md5($_POST['senha']);

$sql_login = "SELECT DISTINCT usu_id, usu_nome, usu_sobrenome, usu_email, usu_type FROM tbl_usuarios WHERE usu_email = '$login' AND usu_senha = '$senha'"; // Consulta de login

$sql_update_data_ultimo_login = "UPDATE tbl_usuarios SET usu_data_ultimo_login = date('Y-m-d H-m-s') WHERE usu_email = '$login'";

$resultado_id = mysqli_query($conn, $sql_login); // Salvar a consulta numa variavel

if ($resultado_id) {
    $rows = array();
    while ($dados_u = mysqli_fetch_assoc($resultado_id)) {
        $rows[] = $dados_u;
        $_SESSION['usuarios_id'] = $dados_u['usu_id'];
        $_SESSION['usuarios_nome'] = $dados_u['usu_nome'];
        $_SESSION['usuarios_sobrenome'] = $dados_u['usu_sobrenome'];
        $_SESSION['usuarios_email'] = $dados_u['usu_email'];
        $_SESSION['usuarios_type'] = $dados_u['usu_type'];
    }

    mysqli_query($conn, $sql_update_data_ultimo_login);
    logMsg('Login: ' . $rows, 'info', '../logs/');
    echo json_encode($rows);
} else {
    logMsg("Erro na execução da consulta, favor entrar em contato com o admin do sistema.", "error", '../logs/');
    echo "Erro na execução da consulta, favor entrar em contato com o admin do sistema.";
}

mysqli_close($conn);
