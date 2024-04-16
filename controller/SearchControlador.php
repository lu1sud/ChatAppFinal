<?php

    session_start();

    if(!isset($_SESSION['unique_id'])){
        header("location: ../index.html");
    }

    require_once('../model/Usuario.php');
    $usuario = new Usuario();

    $search = $_POST['search'];

    $output = "";

    if(!empty($search)){

        $userTabla = $usuario->buscarUsuarios($search, $_SESSION['unique_id']);

        if(!empty($userTabla)){
            require_once('./UltimoMensajeControlador.php');
        }else{
            echo "no hay usuarios";
        }

        
    }

?>