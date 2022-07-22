<?php
include '../base.php';
include_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'perguntaBD.php';

$codigo = $_GET['id'];

$perguntaBD = new PerguntaBD();
$perguntaBD->removerPergunta($codigo);

header('location: ../index.php');

