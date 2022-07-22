<?php
    class Pessoa{
        private $nome;
        private $idade;
        private $cidade;

        public function setNome($nome){
            $this->nome = $nome;
        }
        public function getNome(){
            return $this->nome;
        }

        public function setIdade($idade){
            if ($idade > 0) {
                $this->idade = $idade;
                return true;
            }
            else{
                return false;
            }
        }
        public function getIdade(){
            return $this->idade;
        }
    }
    class Livro{
        
    }
?>