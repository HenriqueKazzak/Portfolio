<?php
    include 'pessoa.php';
    $pessoa = new Pessoa();
    $pessoa->setNome('João');
    $res=$pessoa->setIdade(20);
   // $pessoa->setCidade('São Paulo');

    echo $pessoa->getNome() . '<br>';
    echo $pessoa->getIdade() . '<br>';
   // echo $pessoa->getCidade() . '<br>';

    $pessoa2= new Pessoa();
    $pessoa2->setNome('Maria');
    $pessoa2->setIdade(30);
    echo $pessoa2->getNome() . '<br>';
    echo $pessoa2->getIdade() . '<br>';

?>