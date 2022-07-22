<?php 
    class Casa{
        private $linha;
        private $coluna;
        private $tipo;
        private $ocupada;
        
        public function __construct($linha, $coluna){
            $this->linha = $linha;
            $this->coluna = $coluna;
            $this->tipo = "vazia";
            $this->ocupada = false;
        }
        
        public function getLinha(){
            return $this->linha;
        }
        
        public function getColuna(){
            return $this->coluna;
        }
        
        public function getTipo(){
            return $this->tipo;
        }
        
        public function getOcupada(){
            return $this->ocupada;
        }
        
        public function setTipo($tipo){
            $this->tipo = $tipo;
        }
        
        public function setOcupada($ocupada){
            $this->ocupada = $ocupada;
        }
        
        public function __toString(){
            return $this->linha . "-" . $this->coluna;
        }
    }


?>