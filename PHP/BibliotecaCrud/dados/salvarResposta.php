<?php
include '../base.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'pergunta.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'usuario.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'categoria.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'resposta.php';
include_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'respostaBD.php';
include_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'perguntaBD.php';


$codigoUsuario = $_POST['usuario'];
$descricao = $_POST['resposta'];
$idPergunta = $_POST['idPergunta'];

$resposta = new Resposta();
$resposta->setDescricao($descricao);
$resposta->setData(date('Y-m-d H:i:s'));

$usuario = new Usuario();
$usuario->setCodigo($codigoUsuario);
$resposta->setUsuario($usuario);


$perguntaBD = new PerguntaBD();
$pergunta = $perguntaBD->pesquisarPerguntaPorId($idPergunta);
$resposta->setPergunta($pergunta);

$respostaBD = new RespostaBD();
$respostaBD->inserirResposta($resposta);


header('location: ../dados/gerenciarResposta.php?id='.$idPergunta.'');


