<?php

class Conexao
{
    private $conn;
    
    function __construct()
    {	
        $this->conn = new PDO('mysql:host=localhost;dbname=prova_pin2','root','teste@123');
		
    }
    
    function getConexao(){
        return $this->conn;
    }
}