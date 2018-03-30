<?php

class Banco{
    private $conn;
    
    function pegarConexao(){
        $this->conn = new PDO("mysql:host=localhost;dbname=biblioteca;charset=UTF8", "root", "");
        
        return $this->conn;
    }
    
    
    
}

?>