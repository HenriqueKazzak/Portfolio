<?php
include_once 'base.php';
require_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'categoriaBD.php';
require_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'usuarioBD.php';

$categoriaBD = new CategoriaBD();
$listaCategorias = $categoriaBD->pesquisarTodasCategorias();

$usuarioBD = new UsuarioBD();
$listaUsuarios = $usuarioBD->pesquisarTodosUsuarios();

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Nova Pergunta</title>
<link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

	<form class="form-horizontal" method="POST"	action="dados/salvarPergunta.php">
		<br>
		<h1 align="center">Cadastro de Pergunta</h1>
		<br>
		<div class="form-group">
			<!--User-->
			<div class="col-sm-offset-2 col-sm-5">
				 <label for="usuario">Usuário:</label>			
				 
				 <select class="form-control" name="usuario" id="usuario">

				<?php
				foreach($listaUsuarios as $umRegistro){
				    echo "<option value='{$umRegistro->getCodigo()}'>".utf8_encode($umRegistro->getNome())."</option>";
					}

				?>
				</select>
			</div>
			<!--//Categoria-->
			<div class="col-sm-offset-0 col-sm-2">
				<label for="categoria">Categoria:</label>			
				<select class="form-control" name="categoria" id="categoria">
				<?php
				foreach($listaCategorias as $umRegistro){
				    echo "<option value='{$umRegistro->getCodigo()}'>".($umRegistro->getDescricao())."</option>";
					}

				?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-7">
			<label for="descricao">Descrição:</label>			
				<textarea class="form-control" rows="5"  name="descricao" id="descricao"></textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" value="Salvar" class="btn btn-primary">
				<button name="cancelar" onClick="JavaScript: window.history.back();"
					type="button" class="btn btn-primary">Cancelar</button>
			</div>
		</div>
	</form>
	
</body>
</html>