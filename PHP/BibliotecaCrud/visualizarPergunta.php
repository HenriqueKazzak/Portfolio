<?php
	require_once 'base.php';
	require_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'perguntaBD.php';
	$pergBD = new PerguntaBD();

	$id = $_GET['id'];

	
	$pergunta = $pergBD->pesquisarPerguntaPorId($id);
	$data =  $pergunta->getData();
	$descricao = $pergunta->getDescricao();
	$categoria = $pergunta->getCategoria()->getDescricao();
	$usuario = $pergunta->getUsuario();
    	


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
	<h1 style="color: black">Dados da Pergunta </h1>
	<div>
		
		
			<spam style="width: 100px; float: left;"><b>Data: </b></spam>
			<p><?php echo $data ?></p>
		</div>
		<div>
		
			<div  style="width: 100px; float: left;"><b>Descrição</b></div>
			<p><?php echo $descricao ?></p>
		</div>
		<div>
		
			<div  style="width: 100px; float: left;" ><b>Categoria</b></div>
			<p><?php echo $categoria; ?></p>
		</div>
		<div>
		
			<div  style="width: 100px; float: left;"><b>Usuário</b></div>
			<p><?php echo $usuario->getNome(); ?></p>
		</div>
		
			

	<a onclick="window.history.back()" class="btn btn-info">Voltar</a>
</body>
</html>