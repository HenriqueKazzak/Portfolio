<?php
include_once 'conexao.php';
include_once 'usuarioBD.php';
include_once 'categoriaBD.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'pergunta.php';

class RespostaBD{
    private $conn;

    function __construct(){
        $conexao = new Conexao();
        $this->conn = $conexao->getConexao();
    }
    public function inserirResposta($resposta){
        $comandoSQL = "INSERT INTO resposta (descricao, idpergunta, idusuario) VALUES ('".$resposta->getDescricao()."', ".$resposta->getPergunta()->getCodigo().", ".$resposta->getUsuario()->getCodigo().")";
        $this->conn->exec($comandoSQL);
    }
    public function respostaPorIDPergunta($id){
        $comandoSQL = "SELECT * FROM resposta WHERE idpergunta = $id";
        $resultado = $this->conn->query($comandoSQL);
        $lista = [];
        foreach ($resultado as $umRegistro) {
            $resposta = new Resposta();
            $resposta->setCodigo($umRegistro['id']);
            $resposta->setDescricao($umRegistro['descricao']);
            $resposta->setData($umRegistro['data']);

            $usuarioBD = new UsuarioBD();
            $usuario = $usuarioBD->pesquisarUsuarioPorCodigo($umRegistro['idusuario']);
            $resposta->setUsuario($usuario);

            $perguntaBD = new PerguntaBD();
            $pergunta = $perguntaBD->pesquisarPerguntaPorId($umRegistro['idpergunta']);
            $resposta->setPergunta($pergunta);
            $lista[] = $resposta;
        }
        return $lista;
    }
    
    public function respostaPorId($id){
        $comandoSQL = "SELECT * FROM resposta WHERE id = $id";
        $resultado = $this->conn->query($comandoSQL);
        $umRegistro = $resultado->fetch();
        $resposta = new Resposta();
        $resposta->setCodigo($umRegistro['id']);
        $resposta->setDescricao($umRegistro['descricao']);
        $resposta->setData($umRegistro['data']);

        $usuarioBD = new UsuarioBD();
        $usuario = $usuarioBD->pesquisarUsuarioPorCodigo($umRegistro['idusuario']);
        $resposta->setUsuario($usuario);

        $perguntaBD = new PerguntaBD();
        $pergunta = $perguntaBD->pesquisarPerguntaPorId($umRegistro['idpergunta']);
        $resposta->setPergunta($pergunta);
        return $resposta;
    }


    public function deleteRespostaPorId($id){
        try{
            $this->conn->beginTransaction();
            $comandoSQL = "DELETE FROM `resposta` WHERE id = $id";
            $this->conn->exec($comandoSQL);
            $this->conn->commit();
        }catch(Exception $e){
            $this->conn->rollBack();
        }
       
    }

}




?>