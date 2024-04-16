<?php

    
    require_once('Conectar.php');

    class Usuario{

        public $db;

        public function __construct(){
            
            $conectar = new Conectar();
            $this->db = $conectar->conexion;
        }

        function actualizarEstado($unique_id, $status){
            $query = "
            UPDATE `usuario` SET `status`='{$status}' 
            WHERE unique_id = '{$unique_id}'
            ";

            $resultado = mysqli_query($this->db, $query);


        }

        function verificarEmailPassword($email, $password){
            $passwordAux = md5($password);
            $query = "SELECT * FROM usuario WHERE email = '{$email}' AND password = '{$passwordAux}'";
            $resultado = mysqli_query($this->db, $query);

            if(mysqli_num_rows($resultado) > 0){
                $file = mysqli_fetch_assoc($resultado);
            }else{
                $file = null;
            }

            return $file;
        }

        function verificacionEmailExist($date){
            
            $dateAux = false;

            $query = "SELECT * FROM usuario WHERE email = '{$date}'";
            $resultado = mysqli_query($this->db, $query);

            if(mysqli_fetch_row($resultado) > 0){
                $dateAux = true;
            }

            return $dateAux;

        }

        function insertarUsuario($nombre, $email, $password, $imagen, $status, $unique_id){
            $dateAux = false;

            $query = "
                INSERT INTO `usuario`(`nombre`, `email`, `password`, `img`, `status`, `unique_id`) 
                VALUES ('{$nombre}','{$email}','{$password}','{$imagen}', '{$status}' ,'$unique_id')
            ";

            $resultado = mysqli_query($this->db, $query);
            if($resultado){
                $dateAux = true;
            }
            
            return $dateAux;
        }

        function selecionarUsuario($unique_id){
            $file = null;
            $query = "
                SELECT * FROM usuario WHERE unique_id = '{$unique_id}';
            ";

            $resultado = mysqli_query($this->db, $query);

            if(mysqli_num_rows($resultado) > 0){
                $file = mysqli_fetch_assoc($resultado);
            }

            return $file;

        }

        function buscarUsuarios($search, $unique_id){

            $file = [];

            $query = "
                SELECT * FROM usuario
                WHERE NOT unique_id = '{$unique_id}' AND
                nombre LIKE '%{$search}%'
                
            ";

            $resultado = mysqli_query($this->db, $query);

            if(mysqli_num_rows($resultado) > 0){
                while($row = mysqli_fetch_array($resultado)){
                    $file[] = $row;
                }
            }

            return $file;

        }

        function todosUsuarios($unique_id){
            $file = [];
            $query = "
                SELECT * FROM usuario WHERE NOT unique_id = '{$unique_id}';
            ";

            $resultado = mysqli_query($this->db, $query);

            if(mysqli_num_rows($resultado) > 0){
                while($row = mysqli_fetch_array($resultado)){
                    $file[] = $row;
                }
            }

            return $file;
        }

    }

?>