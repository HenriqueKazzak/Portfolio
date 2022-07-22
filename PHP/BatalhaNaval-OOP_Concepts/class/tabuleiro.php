<?php

    class Tabuleiro{
        private $linhas;
        private $colunas;
        private $tabuleiro;
        
        public function __construct($linhas, $colunas){
            $this->linhas = $linhas;
            $this->colunas = $colunas;
            $this->tabuleiro = array();
            for($i = 0; $i < $linhas; $i++){
                for($j = 0; $j < $colunas; $j++){
                    $this->tabuleiro[$i][$j] = new Casa($i, $j);
                }
            }
        }
        
        public function getCasa($linha, $coluna){
            return $this->tabuleiro[$linha][$coluna];
        }
        
        public function getLinhas(){
            return $this->linhas;
        }
        
        public function getColunas(){
            return $this->colunas;
        }
        
        public function getTabuleiro(){
            return $this->tabuleiro;
        }
        
        public function setTabuleiro($tabuleiro){
            $this->tabuleiro = $tabuleiro;
        }
        
        public function __toString(){
            $s = "";
            for($i = 0; $i < $this->linhas; $i++){
                for($j = 0; $j < $this->colunas; $j++){
                    $s .= $this->tabuleiro[$i][$j];
                }
                $s .= "\n";
            }
            return $s;
        }
    }


?>