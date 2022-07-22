<?php
    
    class UserPDO
    {
        function __destruct(){
            $this->conn = null;
        }
        
        function login($email, $senha, $conn){
            try {
                $stmt = $conn->prepare("SELECT * FROM tb_usuario WHERE email = :email AND senha = :senha");
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':senha', $senha);
                $stmt->execute();
                $resultado = $stmt->fetch(PDO::FETCH_OBJ);
                if($resultado){
                    session_start();
                    $_SESSION['id'] = $resultado->id;
                    $_SESSION['nome'] = $resultado->user;
                    $user = new Usuario();
                    $user->setId($resultado->id);
                    $user->setNome($resultado->nome);
                    $user->setEmail($resultado->email);
                    return $user;
                }else{

                    return false;
                }
            } 
            catch (PDOException $e) 
            {
                echo "Erro: " . $e->getMessage();    
            }
        }
        function createUser($user,$senha, $conn){
            try {
                $stmt = $conn->prepare("INSERT INTO tb_usuario (user, email, senha) VALUES (:user, :email, :senha)");
                $stmt->bindParam(':user', $user->getNome());
                $stmt->bindParam(':email', $user->getEmail());
                $stmt->bindParam(':senha', $senha);
                $stmt->execute();
                return true;
            } 
            catch (PDOException $e) 
            {
                echo "Erro: " . $e->getMessage();    
            }
        }
        function checkEmail($email, $conn){
            try {
                $stmt = $conn->prepare("SELECT * FROM tb_usuario WHERE email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $resultado = $stmt->fetch(PDO::FETCH_OBJ);
                if($resultado != null){
                    return true;
                }else{
                    return false;
                }
            } 
            catch (PDOException $e) 
            {
                echo "Erro: " . $e->getMessage();    
            }
        }
    }
?>