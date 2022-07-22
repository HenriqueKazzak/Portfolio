<?php
include '../base.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'pergunta.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'usuario.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'categoria.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'resposta.php';
include_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'perguntaBD.php';
include_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'respostaBD.php';
$idPergunta = $_GET['id'];

$respostaBD= new RespostaBD();
$resposta = $respostaBD->respostaPorIDPergunta($idPergunta);
$perguntaBD = new PerguntaBD();
$pergunta = $perguntaBD->pesquisarPerguntaPorId($idPergunta);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
	    <link rel="stylesheet" href="../css/styles.css">
        <title> Gerenciar Respostas</title>
    </head>
    <body>
        <h1 style="color: black; text-align: left">Gerenciar Respostas</h1>
        <p>
            <strong>Data: </strong> <?php echo $pergunta->getData(); ?>
            <br>
            <strong>Pergunta: </strong> <?php echo $pergunta->getDescricao(); ?>
            <br>
            <strong>Categoria: </strong> <?php echo $pergunta->getCategoria()->getDescricao(); ?>
            <br>
            <strong>Usuário: </strong> <?php echo $pergunta->getUsuario()->getNome(); ?>
        </p>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Descrição</th>
                    <th scope="col">Data</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($resposta as $resp) {
                    ?>
                    <tr>
                        <td><?php echo $resp->getDescricao(); ?></td>
                        <td><?php echo $resp->getData(); ?></td>
                        <td><?php echo $resp->getUsuario()->getNome(); ?></td>
                        <td>
                            <a href="../visualizarResposta.php?id=<?php echo $resp->getCodigo(); ?>" class="btn btn-info">Visualizar</a>
                            <a href="excluirResposta.php?id=<?php echo $resp->getCodigo(); ?>&idPergunta=<?php echo $idPergunta;?>" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <a id="voltar" name="voltar" href="../index.php" class="btn btn-danger">Voltar</a>
        <a id="cadNew" name="cadNew"class="btn btn-info" href="../formInserirResposta.php?id=<?php echo $idPergunta; ?>">Cadastrar Resposta</a>

    </body>
</html>