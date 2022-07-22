<?php
    //criar um novo item no banco de dados
    include '../PDO/ItemPDO.php';
    include '../class/conexao.php';
    include '../class/item.php';

    //instanciar um objeto da classe conexao
    $conexao = new Conexao();
    //chamar o metodo getConexao
    $conn = $conexao->getConexao();
    $itemPDO = new ItemPDO();

    
    //receber os dados do formulario
    if(isset($_POST['nome'])){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $categoria = $_POST['categoria'];
        //criar um novo item
        $item = new Item();
        //setar os atributos do item
        $item->setNome($nome);
        $item->setDescricao($descricao);
        //salvar o item no banco de dados
        $itemPDO->insert($item, $conn);
        //redirecionar o usuario para a pagina de login
        //header('location: ../index.php');
    }
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Item</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1>Item</h1>
                <form action="addItem.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" name="descricao" id="descricao" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <input type="text" name="categoria" id="categoria" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Cadastrar" class="btn btn-primary">
                        <a class="btn btn-danger" href="../index.php">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
        <!--tabela com todos os itens!-->
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1>Todos os itens</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Categoria</th>
                            <th>Açao</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $itens= $itemPDO->getAllItens($conn);
                            foreach($itens as $item){
                                echo '<tr>';
                                echo '<td>'.$item->getNome().'</td>';
                                echo '<td>'.$item->getDescricao().'</td>';
                                echo '<td>'.$item->getCategoria().'</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>


    </div>
    
</body>
</html>