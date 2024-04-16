<?php

    require_once("../model/Usuario.php");
    session_start();

    $usuario = new Usuario();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre_usuario = $_POST['nombre_usuario'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $verificar_password = $_POST['verificar_password'];

        if(
            !empty($nombre_usuario) &&
            !empty($email) &&
            !empty($password) &&
            !empty($verificar_password)
        ){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                if(!$usuario->verificacionEmailExist($email)){
                    if($password == $verificar_password){

                        $upload = "../assets/img/";
                        $img_name = $_FILES['imagen']['name'];
                        $img_tmp = $_FILES['imagen']['tmp_name'];
                        $img_type = $_FILES['imagen']['type'];

                        $img_new_name = uniqid() . $img_name;

                        $unique_id = uniqid();

                        $types = ['image/jpeg', 'image/jpeg', 'image/png'];

                        if(in_array($img_type, $types)){
                            
                            if(move_uploaded_file($img_tmp, $upload.$img_new_name)){
                                $status = 'online';
                                
                                $passwordAux = md5($password);

                                $sql_insert = $usuario->insertarUsuario($nombre_usuario, $email, $passwordAux, $img_new_name, $status, $unique_id);
                                
                                if($sql_insert){
                                    $_SESSION['unique_id'] = $unique_id;
                                    echo "sussess";
                                }else{
                                    echo "ERROR no se pudo guardar";
                                }
                            }
                        }else{
                            echo "Debe ingresar un archivo .jpeg, .png o .jpg";
                        }
                        
                    }else{
                        echo "Las contraseñas no son iguales";
                    }
                }else{
                    echo "EMAIL ya existe";
                }
            }else{
                echo "El email no es valido";
            }
        }else{
            echo "llene todos lo campos";
        }

    }
?>