<?php
//criar um usuario para o sistema

    include '../class/usuario.php';
    include '../class/conexao.php';
    include '../PDO/UserPDO.php';
 
    $conn=new Conexao();
    $usuarioPDO = new UserPDO();                                                                                                                                                                                         
    if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setEmail($email);
        //check email       
        if($usuarioPDO->checkEmail($email, $conn->getConexao())){
            echo '
            <script>
                alert("Email já cadastrado");
            </script>';
        }
        else{
            //create user
            if($usuarioPDO->createUser($usuario, $senha, $conn->getConexao())){
                echo '
                    <script>
                        alert("Cadastro realizado com sucesso!");
                    </script>';
                    header("Location: ../index.php");
            }
            else{
                echo '
                <script>
                    alert("Erro ao cadastrar usuário!");
                </script>';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Calculadora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
    label{
        font-size: 20px;
        padding: 10px;
    }
</style>
<body>

    <div class="container" >
            <div aling='center' style="background-color:aliceblue; padding-top: 5rem;height: 100vh;border-radius: 20px;margin-top: 2rem;">
                <form method="post" style="text-align: center;">
                    <div>
                        <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome">
                    </div>
                    <div>
                        <label for="Novousuario">Email</label>
                            <input type="text" id="email" name="email">
                    </div>
                    <div>
                        <label for="SenhaDoUser">Senha</label>
                            <input type="password" id="senha" name="senha">
                    </div>
                    <div>

                        <div>
                            <input class="btn btn-dark" type="submit" value="Registrar">
                            <a class="btn btn-danger" href="index.php">Voltar</a>
                        </div>
                    </div>
                </form>
            </div>
    </div>

    
</body>
</html> 