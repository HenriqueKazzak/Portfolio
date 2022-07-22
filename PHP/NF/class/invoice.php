<?php
class Invoice 
{
    private $numero;
    private $data;
    private $valor;
    private $fornecedor;
    private $items;

    //getters and setters
    public function getNumero()
    {
        return $this->numero;
    }
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function getData()
    {
        return $this->data;
    }
    public function setData($data)
    {
        $this->data = $data;
    }
    public function getValor()
    {
        return $this->valor;
    }
    public function setValor($valor)
    {
        $this->valor = $valor;
    }
    public function getFornecedor()
    {
        return $this->fornecedor;
    }
    public function setFornecedor($fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }
    public function getItems()
    {
        return $this->items;
    }
    public function setItems($items)
    {
        $this->items.array_push($items);
    }


}
?>