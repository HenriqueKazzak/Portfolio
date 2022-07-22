<?php
    class Jogador{
        private $tiros = 25;
        private $tirosRestantes;

        public function __construct(){
            $this->tirosRestantes = $this->tiros;
        }

        public function getTirosRestantes(){
            return $this->tirosRestantes;
        }

        public function setTirosRestantes($tirosRestantes){
            $this->tirosRestantes = $tirosRestantes;
        }

        public function atirar($linha, $coluna){
            if($this->tirosRestantes > 0){
                $this->tirosRestantes--;
                return true;
            }
            else{
                return false;
            }
        }
    }

?>