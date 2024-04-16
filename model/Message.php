<?php

    require_once('Conectar.php');

    class Message{

        private $db;

        public function __construct(Type $var = null) {

            $conectar = new Conectar();
            $this->db = $conectar->conexion;

        }

        function insertMessage($emisor_id, $message, $imagen, $receptor_id){

            $valor = false;

            $query = "
            INSERT INTO `messages`(`emisor_id`, `messages`, `imagen`, `receptor_id`) 
            VALUES ('{$emisor_id}','{$message}', '{$imagen}', '{$receptor_id}')
            ";

            $resultado = mysqli_query($this->db, $query);

            if($resultado){
                $valor = true;
            }

            return $valor;

        }

        function SelectMessage($emisor_id, $receptor_id){
            
            $file = [];

            $query = "
                SELECT * FROM messages AS M
                RIGHT JOIN  usuario AS U
                ON U.unique_id = M.emisor_id
                WHERE (M.emisor_id = '{$emisor_id}' AND M.receptor_id = '{$receptor_id}')
                OR (M.emisor_id = '{$receptor_id}' AND M.receptor_id = '{$emisor_id}')
                ORDER BY M.messages__id ASC;
            ";

            $resultado = mysqli_query($this->db, $query);

            if(mysqli_num_rows($resultado) > 0){
                while($row = mysqli_fetch_array($resultado)){
                    $file[] = $row;
                }           
            }
            return $file;
            

        }

        function SelectUltimoMessage($emisor_id, $receptor_id){

            $file = [];

            $query = "
                SELECT * FROM messages AS M
                RIGHT JOIN  usuario AS U
                ON U.unique_id = M.emisor_id
                WHERE (M.emisor_id = '{$emisor_id}' AND M.receptor_id = '{$receptor_id}')
                OR (M.emisor_id = '{$receptor_id}' AND M.receptor_id = '{$emisor_id}')
                ORDER BY M.messages__id DESC;
            ";

            $resultado = mysqli_query($this->db, $query);

            if(mysqli_num_rows($resultado) > 0){
                $file[] = mysqli_fetch_assoc($resultado);
            }

            return $file;
            

        }
    }

?>