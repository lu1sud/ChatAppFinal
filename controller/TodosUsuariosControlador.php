<?php

    session_start();

    require_once('../model/Usuario.php');
    $usuario = new Usuario();

    $userTabla = $usuario->todosUsuarios($_SESSION['unique_id']); 
    
    $output = "";

    if(!empty($userTabla)){
        require_once('./UltimoMensajeControlador.php');
        
    }else{
        echo "no hay usuarios";
    }


?>