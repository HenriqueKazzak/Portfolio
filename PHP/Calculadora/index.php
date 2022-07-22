<?php

session_start();
if(isset($_SESSION['autenticado'])==false || $_SESSION['autenticado']==false){
	header('Location: login.php');
}
$login = $_SESSION['login'];
    var_dump($_POST);
    if (isset($_POST['rdOP']) && isset($_POST['nm1']) && isset($_POST['nm2'])){

        switch ($_POST['rdOp']) {
            case 'sum':
                $result =  $_POST['nm1'] + $_POST['nm2'];
                break;
            case 'sub':
                $result =  $_POST['nm1'] - $_POST['nm2'];
                break;
            case 'div':
                if ($_POST['nm2'] == 0) {
                    $result = 'Erro: Division by zero';
                } else {
                    $result =  $_POST['nm1'] / $_POST['nm2'];
                }
                break;
            case 'mult':
                $result =  $_POST['nm1'] * $_POST['nm2'];
                break;
            default:
                # code...
                break;
        } 
    }
    else
    {
        $result = 'ERROR: Valor nao pode ser nulo nem 0';
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Calculadora</title>
    <script>
        function clearForm(){
            document.getElementById("formulario").reset();
            document.getElementById("result").innerHTML = "";
        }
         
    </script>
</head>
<body>
    <header>
        <nav>
            <div class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Calculadora</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
    </header>
    <div style="background-color: lightblue;">
            <div style="background-color: whitesmoke; border-radius: 3px;" aling="center" class="container">
                <h1> Calculadora Simples </h1>
                <br>
                <br>
                <form id="formulario" name="formulario"class="form-control" method="post" >
                    <div class="form-inp"> 
                        <p>Numero 1</p>
                        <input type="text" name="nm1" id="nm1">
                    </div>
                    <br>
                    <br>
                    <div class="form-inp">
                        <p>Numero 2</p>
                        <input type="text" name="nm2" id="nm2">
                    </div>
                    <br>
                    <br>
                    <div class="form-check">
                        <input  class="form-check-input"type="radio" name="rdOp" checked="checked" id="sum" value="sum">
                            <label  class="form-check-label" for="sum">Soma</label>
                    </div>
                    <div class="form-check">
                        <input  class="form-check-input"type="radio" name="rdOp" id="sub" value="sub">
                            <label  class="form-check-label" for="sub">Subtração</label>
                    </div>
                    <div class="form-check">
                        <input  class="form-check-input"type="radio" name="rdOp" id="mult" value="mult">
                            <label  class="form-check-label" for="mult">Multiplicação</label>
                    </div>
                    <div class="form-check">
                        <input  class="form-check-input"type="radio" name="rdOp" id="div" value="div">
                            <label  class="form-check-label" for="div">Divisão</label>
                    </div>

                    <br>
                    <input class="btn btn-primary" type="submit" value="Calcular">
                    <input class="btn btn-primary" type="button" value="Limpar" onclick="clearForm()">

                </form>
                <div id="result">
                <?php

                    if (!(empty($result)))
                    {
                        echo '<h4> Resultado: '.$result.'</h4>';
                    }
                    else
                    {
                        $result='';
                        echo '<h4>'.$result.'</h4>';
                    }
                ?>
            </div>
            </div>
        </div>
</html>