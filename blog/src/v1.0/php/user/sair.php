<?php

    session_start();
    
    unset($_SESSION['usr_email']);
    unset($_SESSION['usr_nome']);
    unset($_SESSION['usr_sobrenome']);
    unset($_SESSION['usr_email']);
    
    header('location: ../index.php?code=4');
    
    session_destroy();
?>