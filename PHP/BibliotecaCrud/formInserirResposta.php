<?php
include_once 'base.php';
require_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'perguntaBD.php';
require_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'usuarioBD.php';

$usuarioBD = new UsuarioBD();
$listaUsuarios = $usuarioBD->pesquisarTodosUsuarios();

$idPergunta= $_GET['id'];

$perguntaBD = new PerguntaBD();
$pergunta = $perguntaBD->pesquisarPerguntaPorId($idPergunta);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Nova Pergunta</title>
<link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

	<form class="form-horizontal" method="POST"	action="dados/salvarResposta.php">
		<br>
        <div align="center">
            <h1>Cadastro de Resposta</h1>
            <br>
            <p>
                <strong><?php echo $pergunta->getDescricao(); ?></strong>
            </p>
            <br>
            <br>
        </div>
        <div aling="left" name="idPergunta" id="idPergunta"> 
            <input type="hidden" name="idPergunta" id="idPergunta" value="<?php echo $idPergunta; ?>">
        </div>
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
        </div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-7">
			<label for="descricao">Resposta:</label>			
				<textarea class="form-control" rows="5"  name="resposta" id="resposta"></textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" value="Salvar" class="btn btn-primary">
				<button name="cancelar" onClick="JavaScript: window.history.back();"
					type="button" class="btn btn-danger">Cancelar</button>
			</div>
		</div>
	</form>
	
</body>
</html>