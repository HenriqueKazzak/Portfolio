<?php
	require_once 'base.php';
	require_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'respostaBD.php';
    require_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'perguntaBD.php';
    require_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'pergunta.php';
    require_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'resposta.php';


    $respostaBD= new RespostaBD();
	$id = $_GET['id'];
	
	$resposta = $respostaBD->RespostaPorId($id);
	$data =  $resposta->getData();
	$descricao = $resposta->getDescricao();
    $pergunta = $resposta->getPergunta()->getDescricao();
	$usuario = $resposta->getUsuario();

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<title></title>
	
</head>
<body>
	<h1 style="color: black">Dados da resposta </h1>
    <div>
        <div  style="width: 100px; float: left;"><b>Pergunta</b></div>
        <p><?php echo $pergunta ?></p>
    </div>
    <div>
    
        <div  style="width: 100px; float: left;" ><b>Resposta</b></div>
        <p><?php echo $resposta->getDescricao(); ?></p>
    </div>
    <div>
        <div  style="width: 100px; float: left;"><b>Usuário</b></div>
        <p><?php echo $usuario->getNome(); ?></p>
    </div>
    <div>
        <spam style="width: 100px; float: left;"><b>Data: </b></spam>
        <p><?php echo $data ?></p>
    </div>
		
			

	<a onclick="window.history.back()" class="btn btn-info">Voltar</a>
</body>
</html>