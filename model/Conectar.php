<?php

class Conectar{  
        
    private $localhost = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db = 'chatapp_final';
    
    public $conexion;

    public function __construct() {

        try{
            $this->conexion = mysqli_connect($this->localhost, $this->user, $this->pass, $this->db);
        }catch(Exception $e){
            die("no se encontro base de datos");
        }
    }
    
}

?>