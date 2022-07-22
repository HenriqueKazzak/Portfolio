<?php
    //navio batedor de duas casas
    class NavioBatedor extends Navio{
        public function __construct( $tipo, $tamanho){
            $this->tamanho = 2;
            parent::__construct($tipo, $tamanho);
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
            return "Batedor";
        }

        
    }
?>