<?php
    //classe pai que dara origem aos outros tipos de navios

    class Navio{
        private $linha = array();
        private $coluna = array();
        private $tipo;
        private $tamanho;
        private $ocupada = array();
        
        public function __construct($tamanho){
           // array_push($this->linha, $linha);
            //array_push($this->coluna, $coluna);
            //foreach($linha as $l){
              //  foreach($coluna as $c){
                //    $this->ocupada=[
                  //      $l . "-" . $c => false
                    //];
              //  };  
            //};	
            //$this->ocupada = false;
            $this->tamanho = $tamanho;
        }
        
        public function getLinha(){
            return $this->linha;
        }
        
        public function getColuna(){
            return $this->coluna;
        }
        
        public function getTamanho(){
            return $this->tamanho;
        }
        

        public function getOcupada(){
            return $this->ocupada;
        }
        
        public function setOcupada($ocupada){
            $this->ocupada = $ocupada;
        }
        
        public function __toString(){
            return $this->tipo;
        }
    }

?>