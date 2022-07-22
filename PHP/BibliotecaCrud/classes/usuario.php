<?php

class Usuario{
		private $_id, $_nome, $_dataNascimento, $_email, $_login, $_senha;
        /**
         * @return the $_id
         */
        public function getCodigo()
        {
            return $this->_id;
        }
    
        /**
         * @return the $_nome
         */
        public function getNome()
        {
            return $this->_nome;
        }
    
        /**
         * @return the $_dataNascimento
         */
        public function getDataNascimento()
        {
            return $this->_dataNascimento;
        }
    
        /**
         * @return the $_email
         */
        public function getEmail()
        {
            return $this->_email;
        }
    
        /**
         * @return the $_login
         */
        public function getLogin()
        {
            return $this->_login;
        }
    
        /**
         * @return the $_senha
         */
        public function getSenha()
        {
            return $this->_senha;
        }
    
        /**
         * @param field_type $_id
         */
        public function setCodigo($_id)
        {
            $this->_id = $_id;
        }
    
        /**
         * @param field_type $_nome
         */
        public function setNome($_nome)
        {
            $this->_nome = $_nome;
        }
    
        /**
         * @param field_type $_dataNascimento
         */
        public function setDataNascimento($_dataNascimento)
        {
            $this->_dataNascimento = $_dataNascimento;
        }
    
        /**
         * @param field_type $_email
         */
        public function setEmail($_email)
        {
            $this->_email = $_email;
        }
    
        /**
         * @param field_type $_login
         */
        public function setLogin($_login)
        {
            $this->_login = $_login;
        }
    
        /**
         * @param field_type $_senha
         */
        public function setSenha($_senha)
        {
            $this->_senha = $_senha;
        }
    
    
       
   
    
}