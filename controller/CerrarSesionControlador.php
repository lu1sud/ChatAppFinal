<?php

    session_start();

    require_once('../model/Usuario.php');
    $usuario = new Usuario();
    if(isset($_SESSION['unique_id'])){
        if(isset($_GET['logout'])){
            $status = "offline";
            $sql_update = $usuario->actualizarEstado($_GET['logout'], $status);
            unset($_SESSION['unique_id']);
            header('location: ../index.php');
        }else{
            header('location: ../chat.html');
        }
    }else{
        header('location: ../index.html');
    }


?>