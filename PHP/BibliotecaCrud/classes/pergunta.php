<?php

class Pergunta {
    private $_id, $_descricao, $_categoria, $_data, $_usuario;
    /**
     * @return the $_id
     */
    public function getCodigo()
    {
        return $this->_id;
    }

    /**
     * @return the $_descricao
     */
    public function getDescricao()
    {
        return $this->_descricao;
    }

    /**
     * @return the $_categoria
     */
    public function getCategoria()
    {
        return $this->_categoria;
    }

    /**
     * @return the $_data
     */
    public function getData()
    {
        return $this->_data;
    }

    /**
     * @return the $_usuario
     */
    public function getUsuario()
    {
        return $this->_usuario;
    }

    /**
     * @param field_type $_id
     */
    public function setCodigo($_id)
    {
        $this->_id = $_id;
    }

    /**
     * @param field_type $_descricao
     */
    public function setDescricao($_descricao)
    {
        $this->_descricao = $_descricao;
    }

    /**
     * @param field_type $_categoria
     */
    public function setCategoria($_categoria)
    {
        $this->_categoria = $_categoria;
    }

    /**
     * @param field_type $_data
     */
    public function setData($_data)
    {
        $this->_data = $_data;
    }

    /**
     * @param field_type $_usuario
     */
    public function setUsuario($_usuario)
    {
        $this->_usuario = $_usuario;
    }

    
}