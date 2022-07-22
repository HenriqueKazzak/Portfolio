<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/main.css">
	<title>Todos Cadastro</title>
</head>
<body>

<header>
        <div class="siteheader">
            <div class="brand-image1">
                <img id="imagelogorosa"src="/images/logorosa.png">
            </div>
            <div class="brand-main">
                <img id="escrita"src="/images/btnderosa.png">
            </div>
            <div class="brand-image2">
                <img id="logopassaro"src="/images/passaro.png">
            </div>
        </div>
	<nav id="navegation">
		<a href="/index.php">Página Inicial</a>	
		<a href="add.php">Adicionar Registro</a>
	</nav>
</header>
<div class="tabela"></div>
<table border="1">
	<thead>
		<th>CPF</th>
		<th>Nome</th>
		<th>Sobrenome</th>
		<th>Endereço</th>
		<th>Email</th>
		<th>Ação</th>
	</thead>
	<tbody>
		<?php
			$data = file_get_contents('members.json');
			$data = json_decode($data);

			$index = 0;
			foreach($data as $row){
				echo "
					<tr>
						<td>".$row->cpf."</td>
						<td>".$row->firstname."</td>
						<td>".$row->lastname."</td>
						<td>".$row->address."</td>
						<td>".$row->email."</td>
						<td>
							<a class='acao' href='edit.php?index=".$index."'>Editar</a>
							<a class='acao' href='delete.php?index=".$index."'>Deletar</a>
						</td>
					</tr>
				";
				$index++;
			}
		?>
	</tbody>
</table>
</body>
</html>