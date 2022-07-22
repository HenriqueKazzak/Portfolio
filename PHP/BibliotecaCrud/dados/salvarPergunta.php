<?php
include '../base.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'pergunta.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'usuario.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'categoria.php';
include_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'perguntaBD.php';

$codigoUsuario = $_POST['usuario'];
$codigoCategoria = $_POST['categoria'];
$descricao = $_POST['descricao'];


$pergunta = new Pergunta();
$pergunta->setDescricao($descricao);

$categoria = new Categoria();
$categoria->setCodigo($codigoCategoria);
$pergunta->setCategoria($categoria);

$usuario = new Usuario();
$usuario->setCodigo($codigoUsuario);
$pergunta->setUsuario($usuario);


$perguntaBD = new PerguntaBD();
$resultado = $perguntaBD->inserirPergunta($pergunta);

header('location: ../index.php');

