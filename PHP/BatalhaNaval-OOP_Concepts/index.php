<?php
    //esse programa sera usado com Orientacao a Objetos
    //Criaremos um jogo de batalha naval

    //Criar um tabuleiro

    include_once 'class/tabuleiro.php';
    include_once 'class/casa.php';
    include_once 'class/navio.php';
    include_once 'class/navio-batedor.php';
    include_once 'class/navio-fragata.php';
    include_once 'class/navio-portaAviao.php';

    $tabuleiro = new Tabuleiro(10, 10);

    $navio1 = new NavioBatedor("Batedor", 2);
    $navio2 = new NavioBatedor("Batedor", 2);
    $navio3 = new NavioBatedor("Batedor", 2);

    $navio4 = new NavioFragata("Fragata", 3);
    $navio5 = new NavioFragata("Fragata", 3);

    $navio6 = new NavioPortaAviao("Porta-Avioes", 4);
    

    //Criar um navio de tamanho 2

?>
<html>
    <head>
        <title>Batalha Naval</title>
        <!--bootstrap-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <style>
        td{
            text-align: center;
            width: 50px;
            height: 50px;
        }
    </style>
    <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
        }
    </script>
    <body>
</head>
<body>

        <!--navbar com o titulo-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height:5rem;">
            <a class="navbar-brand" style="position: absolute; left: 47%; transform: translatex(-50%);"href="#"> <h1>Batalha Naval</h1></a>
        </nav>
        <!-- barra lateral paraSelecao dos navios-->
        <!--Porta Aviao = 4 casas -->
        <!--submarino = 3 casas -->
        <!--batedor = 2 casas -->

        <!-- criar tabela do tabuleiro -->
        <div class="container" aling="center" style="padding-top: 2rem;">
        <img id="drag1" src="images/images.png" draggable="true" ondragstart="drag(event)" width="50" height="50">
            <table border="1" class="table table-bordered align-middle">
                <tbody>
                    <?php
                        for($i = 0; $i < $tabuleiro->getLinhas(); $i++){
                            echo "<tr>";
                            for($j = 0; $j < $tabuleiro->getColunas(); $j++){
                                echo "<td id='".$tabuleiro->getCasa($i, $j)."' ondrop='drop(event)' ondragover='allowDrop(event)'>";
                                //echo $tabuleiro->getCasa($i, $j);
                                echo "</td>";
                            }
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        
        


    </body>