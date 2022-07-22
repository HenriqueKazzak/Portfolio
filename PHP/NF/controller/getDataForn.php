<?php
    include '../class/conexao.php';
    include '../PDO/fornecedorPDO.php';

    $conn=new Conexao();
    $fornecedorPDO = new FornecedorPDO();

    if(isset($_POST['page'])){
        $page = $_POST['page'];
    }else{
        $page = 1;
    }
    if(isset($_POST['rows'])){
        $rows = $_POST['rows'];
    }else{
        $rows = 10;
    }
    if(isset($_POST['searchTerm'])){
        $searchTerm = $_POST['searchTerm'];
    }else{
        $searchTerm = "";
    }

    //$fornecedores = $fornecedorPDO->getAllJson($conn->getConexao(),$page,$rows,$searchTerm);
    //echo $fornecedores;
$array = [];
$array['total'] = 128;
$array['rows'] = [['id'=> "1", "nome"=> "hjhjhjh"]];

echo json_encode($array);


?>