<?php

    class NavioPortaAviao extends Navio{
        
        public function __construct($tipo, $tamanho){
            parent::__construct( $tipo, $tamanho);
        }
        
        public function atacar($linha, $coluna){
            
            if($this->ocupada[$linha . "-" . $coluna] == false){
                $this->ocupada[$linha . "-" . $coluna] = true;
                return true;
            }
            else{
                return false;
            }
        }
        
        public function __toString(){
            return "Porta Avião";
        }   
    }
?>