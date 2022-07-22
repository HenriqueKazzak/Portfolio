<?php


class Categoria {
    private $_id, $_descricao;
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

    

}

?>