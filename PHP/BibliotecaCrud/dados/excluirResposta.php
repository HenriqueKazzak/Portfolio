<?php
include '../base.php';

include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'resposta.php';
include_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'respostaBD.php';

$idResposta = $_GET['id'];
$idPergunta = $_GET['idPergunta'];

$respostaBD = new RespostaBD();
$respostaBD->deleteRespostaPorId($idResposta);

header('location: ../dados/gerenciarResposta.php?id='.$idPergunta.'');


