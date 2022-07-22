<?PHP 

require_once 'base.php';

require_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'perguntaBD.php';

$pBD = new PerguntaBD();


$listaPerguntas = $pBD->pesquisarTodasPerguntas();
?>


<!DOCTYPE html>
<html>
<head>
<?php 
$idade = "10";
if($idade == 10){

	print("Idade igual a 10 \n");
  
  } else{
  
	print("Idade diferente de 10 \n");
  
  }
  
  print("Saindo");
  die();

?>

	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<style>
/* Tooltip container */
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
}

/* Tooltip text */
.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    padding: 5px 0;
    border-radius: 6px;
 
    /* Position the tooltip text - see examples below! */
    position: absolute;
    z-index: 1;
}

/* Show the tooltip text when you mouse over the tooltip container */
.tooltip:hover .tooltiptext {
    visibility: visible;
}
</style>
	
	<title>Prova 1</title>
	

	 
</head>

<body>
	<h1 style="color: black; text-align: center">Listagem de Perguntas</h1>
	<table class="table table-striped table-bordered" id="listagemPerguntas">
	  <thead>
	    <tr>
	      <th scope="col">Data</th>
	      <th scope="col">Usuário</th>
	      <th scope="col">Descrição</th>
	      <th scope="col">Detalhes</th>
	    </tr>
	  </thead>
	  <tbody>
	    	<?php
	    	 
	    		$aux = 1;
	    		foreach ($listaPerguntas as $umRegistro) {
	    		    $codigo = $umRegistro->getCodigo();
					
	    		    $data = $umRegistro->getData();
					$dataObj = new DateTime($data);
					$data = $dataObj->format("d/m/Y H:i:s");
	    		    $nome_usuario = $umRegistro->getUsuario()->getNome();
	    		    $descricao = $umRegistro->getDescricao();

	    	 ?>

			<tr>
				<td><?php echo $data;?></td>
				<td><?php echo $nome_usuario; ?></td>
				<td><?php echo $descricao; ?></td>
				<td>
				
					<a href="visualizarPergunta.php?id=<?php echo $codigo; ?>" > 
						<span class="glyphicon glyphicon-eye-open" data-toggle="tooltip"  title="Abrir Detalhes"></span>
					</a>
					<a href="dados/removerPergunta.php?id=<?php echo $codigo; ?>" > <span class="glyphicon glyphicon-remove"  data-toggle="tooltip"  title="Remover"></span></a>
					<a href="dados/gerenciarResposta.php?id=<?php echo $codigo;?>" > <span class="glyphicon glyphicon-list-alt"  data-toggle="tooltip"  title="Gerenciar Respostas"></span></a>
					
				</td>
			</tr>

			<?php 
					
				}
			 ?>

	      
	  </tbody>
	  
	</table>

	<a class="btn btn-info" href="formInserirPergunta.php">Nova Pergunta</a>
	
	
	
	
	
</body>
</html>