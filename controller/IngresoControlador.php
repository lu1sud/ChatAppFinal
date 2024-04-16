<?php

    session_start();

    require_once('../model/Usuario.php');
    $usuario = new Usuario();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password)){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                
                $sql_select = $usuario->verificarEmailPassword($email, $password);
                if(!empty($sql_select)){

                    $status = 'online';

                    $_SESSION['unique_id'] = $sql_select['unique_id'];
                    $sql_update = $usuario->actualizarEstado($sql_select['unique_id'], $status);

                    echo "success";
                }else{
                    echo "EMAIL o contraseña invalidos";
                }
            }else{
                echo "Este EMAIL no es valido.";
            }
        }else{  
            echo "Llene todos los campos.";
        }   

    }

?>