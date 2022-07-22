<?php
    include_once('../class/conexao.php' );
    include_once('../class/usuario.php' );
    include_once('../PDO/UserPDO.php' );
    //instanciar um objeto da classe conexao
    $conexao = new Conexao();
    //chamar o metodo getConexao
    $conn = $conexao->getConexao();
    $userPDO = new UserPDO();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1>Login</h1>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Entrar" class="btn btn-primary">
                    </div>
                    </form action="register.php" method="post">
                        <a class="btn btn-danger" href="register.php">Cadastrar</a>
                    </form>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
//verificar se o usuario clicou no botao entrar
if(isset($_POST['email'])){
    //pegar os dados do formulario
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $user = $userPDO->login($email, $senha, $conn);

    if($user != null){
        //criar uma sessao
        session_start();
        $_SESSION['user'] = $user;
        header('Location: ../index.php');
    }else{
        echo '
            <script>
                alert("Usuário ou senha incorretos");
            </script>';
    }      
}


