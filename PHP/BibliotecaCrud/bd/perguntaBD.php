<?php

include_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'conexao.php';
include_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'usuarioBD.php';
include_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'categoriaBD.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'pergunta.php';

class PerguntaBD{
    private $conn;
    
    function __construct(){
        $conexao = new Conexao();
        $this->conn = $conexao->getConexao();
    }
    
    public function pesquisarTodasPerguntas(){
        $comandoSQL = "SELECT * from pergunta";
        $resultado = $this->conn->query($comandoSQL);
         $lista = [];
        foreach ($resultado as $umRegistro) {
            $pergunta = new Pergunta();
            $pergunta->setCodigo($umRegistro['id']);
            $pergunta->setDescricao($umRegistro['descricao']);
            $catBD = new CategoriaBD();
            $cat = $catBD->pesquisarCategoriaPorCodigo($umRegistro['idcategoria']);
            $pergunta->setCategoria($cat);
            $pergunta->setData($umRegistro['data']);
            $usuarioBD = new UsuarioBD();
            $usuario = $usuarioBD->pesquisarUsuarioPorCodigo($umRegistro['idusuario']);
            $pergunta->setUsuario($usuario);
            
            $lista[] = $pergunta;
        }
      
        return $lista;
    }

    public function pesquisarPerguntaPorId($id)
    {
        $comandoSQL = "SELECT * FROM pergunta where id=$id";
        $umRegistro = $this->conn->query($comandoSQL)->fetch();
       
		$pergunta = new Pergunta();
	 	$pergunta->setCodigo($umRegistro['id']);
		$pergunta->setDescricao($umRegistro['descricao']);
		$catBD = new CategoriaBD();
		$cat = $catBD->pesquisarCategoriaPorCodigo($umRegistro['idcategoria']);
		$pergunta->setCategoria($cat);
		$pergunta->setData($umRegistro['data']);
		$usuarioBD = new UsuarioBD();
		$usuario = $usuarioBD->pesquisarUsuarioPorCodigo($umRegistro['idusuario']);
		$pergunta->setUsuario($usuario);
		return $pergunta;
    }
    
    public function inserirPergunta(Pergunta $pergunta){
        $comandoSQL = "INSERT INTO pergunta (descricao,  idusuario, idcategoria) VALUES (?,  ?,  ?)";
        $st = $this->conn->prepare($comandoSQL);
        $resultado = $st->execute(array(
            $pergunta->getDescricao(),
            $pergunta->getCategoria()->getCodigo(),
            $pergunta->getUsuario()->getCodigo()
        ));
        
        return $resultado;
            
    }
    
    public function removerPergunta($id){
        try {
                       
            $this->conn->beginTransaction();
            
            $comandoSQL = "delete from  pergunta where id=?";
            $st = $this->conn->prepare($comandoSQL);
            $resultado = $st->execute(array(
                $id
            ));
            
            
            $this->conn->commit();
        } 
        catch (Exception $e) {
            $this->conn->rollBack();
        }
        return $resultado;
    }
}
