<?php
    class ItemPDO{

        public function insert($item,$conn){
            $sql = "INSERT INTO tb_item (nome,descricao) VALUES (:nome, :descricao)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':nome', $item->getNome());
            $stmt->bindValue(':descricao', $item->getDescricao());
            $stmt->execute();
        }

        public function getItemByName($name,$conn){
            $sql = "SELECT * FROM tb_item WHERE nome LIKE :nome";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':nome', $name);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_OBJ);
            if($resultado){
                //retorna json do resultado para usar Ajax e jquery na tela de lançamento de item
                return json_encode($resultado);
            }else{
                return false;
            }
        }

        public function getAllItens($conn){
            $sql = "SELECT * FROM tb_item";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
            $itens = array();
            foreach ($resultado as $Rowitem) {
                $item= new Item();
                $item->setId($Rowitem->id);
                $item->setNome($Rowitem->nome);
                $item->setDescricao($Rowitem->descricao);
                $itens[] = $item;
            }
            return $itens;
        }


    }


?>