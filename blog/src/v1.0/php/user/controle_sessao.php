<?php
    session_start();

    if ((!isset($_SESSION['usu_id']) == true)) {
        session_destroy();
        header('location:../index.php?code=2');
    }

    $usu_id        = $_SESSION['usu_id'];
    $usu_nome      = $_SESSION['usu_nome'];
    $usu_email     = $_SESSION['usu_email'];
    $usu_sobrenome = $_SESSION['usu_sobrenome'];
?>