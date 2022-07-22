<?php
    //This program will create a system that will allow the user to create a new account, login, and logout. and also will post a simple invoice.
    //This program will also allow the user to view their invoice history.

    //inicia sessao com tempo de vida de 30 minutos
    session_start();
    //require_once 'class/conexao.php';
    if(isset($_SESSION['user'])){
        if(isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)){
            session_unset();     
            session_destroy();
        }
    }
    else{
        $_SESSION['LAST_ACTIVITY'] = time();
       
        //redirect to login page
        header("Location: controller/login.php");
    }
    
    //Verifica se o usuário está logado
    //Incluir o arquivo de conexão com o banco de dados

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kazzak System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    </style>
</head>
    <header>
        <nav class="navbar navbar-expand-sm navbar-light" style="background-color:lightblue">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    Kazzak Invoice System
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">Ações</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown03">
                                <li><a class="dropdown-item" href="./action/lancarNota.php">Lançar Nota </a></li>
                                <li><a class="dropdown-item" href="#">Cadastrar Fornecedor</a></li>
                                <li><a class="dropdown-item" href="controller/AddItem.php">Cadastrar Item</a></li>
                                <li><a class="dropdown-item" href="#">Extrair Relatório</a></li>
                            </ul>
                        </li>
                    </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="material-icons">account_circle</i>
                                    <span class="nav-link-text"><?php $_SESSION['user']?></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown04">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="./controller/logout.php">Sair</a></li>
                                </ul>
                            </li>
                        <form class="form-inline my-2 my-md-0" style="padding-left: 3px;">
                            <input class="form-control" type="text" placeholder="Search">
                        </form>
                    </div>
            </div>
        </nav>
    </header>
    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row" style="margin-top:5rem">
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                <h2>Lançamento de Notas</h2>
                <p>Efetuar o lançamento.</p>
                <p><a class="btn btn-secondary" href="./action/lancarNota.php">Lançar &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

                <h2>Relatório</h2>
                <p>lorem ipsum dolor sit amet.</p>
                <p><a class="btn btn-secondary" href="#">Relatório &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

                <h2>Modificar Nota</h2>
                <p>Modificar notas com 5 dias de antecedencia</p>
                <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div>



