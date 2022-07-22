<?php
    class Conexao
    {
        private $conn;
        
        function __construct(){
            $this->conn = new PDO("mysql:host=localhost;dbname=db_invoice", "root", "teste@123");
        }
        function getConexao(){
            return $this->conn;
        }
        function __destruct(){
            $this->conn = null;
        }

    }

?>