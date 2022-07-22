<?php
    $user_name = '';
    var_dump($_COOKIE);
   
    if(isset($_COOKIE['login']))
    { 
        $user_name = $_COOKIE['login'];
        $selecionado = 'checked';
    }

    session_start();
    if (isset($_POST['user_name']) && isset($_POST['senha']))
    {
        if(isset($_POST['lembrar']) && $_POST['lembrar']=='on')
        { 
            echo '<script>alert("Lembrar senha ativado")</script>';
            setcookie('login', $user_name, time()+3600);
        } else{
            setcookie('login', null, -1);
        }
        var_dump($_POST);
        $user_name = $_POST['user_name'];
        $senha = $_POST['senha'];


        if ($user_name == 'admin' && $senha == 'admin')
        {
            session_start();
            $_SESSION['autenticado'] = true;
            $_SESSION['login'] = $user_name;
            header('Location: index.php');
        }
        else
        {
            session_destroy();
            //header('Location: login.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Calculadora</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
</head>
<style>
</style>
<body>
    <div align:center>
        <div id="login-row" class="row justify-content-center align-items-center">
            <div aling='center' style="background-color:aliceblue; display: block;">
                <form method="post">
                    <div>
                        <label for="usuario">Usuario<br></label>
                            <input type="text" id="user_name" name="user_name" value="<?=$user_name?>">
                    </div>
                    <div>
                        <label for="senha">Senha<br></label>
                            <input type="password" id="senha" name="senha">
                    </div>
                    <div>
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lembrar" id="lembrar"  checked="<?$selecionado?>">
                            <label class="form-check-label" for="lembrar">
                                Lembrar usuario
                            </label>
                        </div>
                        <div>
                            <input class="btn btn-dark" type="submit" value="Entrar">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    
</body>
</html>