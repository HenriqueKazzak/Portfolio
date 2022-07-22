<?php

include_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'conexao.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'categoria.php';

class CategoriaBD{
    private $conn;
    
    function __construct(){
        $conexao = new Conexao();
        $this->conn = $conexao->getConexao();
    }
    
    public function pesquisarTodasCategorias(){
        $comandoSQL = "SELECT * from categoria";
        $resultado = $this->conn->query($comandoSQL);
        $lista = array();
        foreach ($resultado as $umRegistro) {
            $cat = new Categoria();
            $cat->setCodigo($umRegistro['id']);
            $cat->setDescricao($umRegistro['descricao']);
            
            $lista[] = $cat;
        }
        
        return $lista;
    }
    
    public function pesquisarCategoriaPorCodigo($id){
        $comandoSQL = "SELECT * from categoria where id = ".$id;
        $resultado = $this->conn->query($comandoSQL)->fetch();
    
        $cat = new Categoria();
        $cat->setCodigo($resultado['id']);
        $cat->setDescricao($resultado['descricao']);
            
        return $cat;
    }

}
