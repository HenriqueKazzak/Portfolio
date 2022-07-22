<?php

include_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'conexao.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'usuario.php';

class UsuarioBD{
    private $conn;
    
    function __construct(){
        $conexao = new Conexao();
        $this->conn = $conexao->getConexao();
    }
    
    
    public function pesquisarTodosUsuarios(){
        $comandoSQL = "SELECT * FROM prova_pin2.usuario";
        $resultado = $this->conn->query($comandoSQL);
        $lista = array();
        foreach ($resultado as $umRegistro) {
            $usuario = new Usuario();
            $usuario->setCodigo($umRegistro['id']);
            $usuario->setNome($umRegistro['nome']);
            $usuario->setDataNascimento($umRegistro['dataNascimento']);
            $usuario->setEmail($umRegistro['email']);
            $usuario->setLogin($umRegistro['login']);
            $usuario->setSenha($umRegistro['senha']);
            
            $lista[] = $usuario;
        }
        
        return $lista;
    }
    public function pesquisarUsuarioPorCodigo($id)
    {
        $comandoSQL = "SELECT * FROM usuario where id=$id";
        $umRegistro = $this->conn->query($comandoSQL)->fetch();
		$usuario = new Usuario();
		$usuario->setCodigo($umRegistro['id']);
		$usuario->setNome($umRegistro['nome']);
		$usuario->setDataNascimento($umRegistro['dataNascimento']);
		$usuario->setEmail($umRegistro['email']);
		$usuario->setLogin($umRegistro['login']);
		$usuario->setSenha($umRegistro['senha']);
		return $usuario;
    }
}
