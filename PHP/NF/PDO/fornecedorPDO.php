<?php

    class FornecedorPDO{

        public function getAll($conn){
            $sql = "SELECT * FROM tb_fornecedor";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
            $fornecedores=array();
            foreach($resultado as $fornecedor){

                $tmpfornecedor= new Fornecedor();
                $tmpfornecedor->setId($fornecedor->id);
                $tmpfornecedor->setNome($fornecedor->nome);
                $tmpfornecedor->setCnpj($fornecedor->cnpj);
                $tmpfornecedor->setEndereco($fornecedor->endereco);
                $tmpfornecedor->setTelefone($fornecedor->telefone);
                $tmpfornecedor->setEmail($fornecedor->email);

                $fornecedores[] = $tmpfornecedor;
            }
            return $fornecedores;
        }

        public function getAllJson($conn,$searchTerm,$page,$rows){
            $response = array();
            $offset = ($page-1)*$rows;
            $whereSQL = "nome LIKE '$searchTerm%' OR cnpj LIKE '$searchTerm%'";
            $sql = "SELECT COUNT(*) FROM tb_fornecedor";
            $result = $conn->prepare($sql);
            $result->execute();
            $row = $result->fetchAll();
            $response["total"] = $row[0];
            $sql = "SELECT * FROM tb_fornecedor WHERE $whereSQL LIMIT $offset,$rows";
            $result = $conn->prepare($sql);
            $fornecedores = array();
            while($row = $result->fetchAll()){
                array_push($fornecedores,$row);
            }
            $response["rows"] = $fornecedores;
            var_dump($response);
            return json_encode($response);
        }

        public function delete($conn){
            $sql = "DELETE FROM tb_fornecedor WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
        }

        public function insert($fornecedor, $conn){
            $sql = "INSERT INTO tb_fornecedor (nome,cnpj,endereco,telefone,email) VALUES (:nome, :cnpj, :endereco, :telefone, :email)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':nome', $fornecedor->getNome());
            $stmt->bindValue(':cnpj', $fornecedor->getCnpj());
            $stmt->bindValue(':endereco', $fornecedor->getEndereco());
            $stmt->bindValue(':telefone', $fornecedor->getTelefone());
            $stmt->bindValue(':email', $fornecedor->getEmail());
            $stmt->execute();

        }

        public function getByName($nome,$conn){
            $sql = "SELECT * FROM tb_fornecedor WHERE nome LIKE :nome";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':nome', $nome);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_OBJ);
            if($resultado){
                //retorna json do resultado para usar Ajax e jquery 
                return json_encode($resultado);
            }else{
                return false;
            }

        }


    }
?>