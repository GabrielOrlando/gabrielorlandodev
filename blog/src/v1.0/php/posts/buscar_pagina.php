<?php

$data_atual = date("Y-m-d");

require_once('../conn.php');
require_once('../logs/new.php');

session_start();

$conn = mysqli_connect($servername, $username, $password, $database);
$conn->set_charset("utf8");

$id_post = $_POST["id"];

if (!$conn) {
    logMsg('Conexão falhou: ' . mysqli_connect_error(), 'error', '../logs/');
    die("Conexão falhou: " . mysqli_connect_error());
}

$sql_view = "SELECT * FROM view_posts_publicados WHERE id = $id_post"; // Consulta de post

$resultado_id = mysqli_query($conn, $sql_view); // Salvar a consulta numa variavel

if ($resultado_id) {
    $rows = array();
    while ($dados_post = mysqli_fetch_assoc($resultado_id)) {
        $rows[] = $dados_post;
    }

    logMsg('[buscar_pagina.php] Buscar posts publicados: ' . $rows, 'info', '../logs/');
    echo json_encode($rows);
} else {
    logMsg("Erro na execução da consulta, favor entrar em contato com o admin do sistema.", "error", '../logs/');
    echo "Erro na execução da consulta, favor entrar em contato com o admin do sistema.";
}

mysqli_close($conn);
