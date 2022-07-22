<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro</title>
	<link rel="stylesheet" href="/main.css">
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
		<a href="allCad.php">Todos Registros</a>	
	</nav>
</header>
<div class="formulario">
	<form method="POST">
		<p>
			<label for="cpf">CPF (Apenas números)</label>
			<input type="text" id="cpf" name="cpf">
		</p>

		<p>
			<label for="firstname">Nome</label>
			<input type="text" id="firstname" name="firstname">
		</p>
		<p>
			<label for="lastname">Sobrenome</label>
			<input type="text" id="lastname" name="lastname">
		</p>
		<p>
			<label for="address">Endereço</label>
			<input type="text" id="address" name="address">
		</p>
		<p>
			<label for="email">Email</label>
			<input type="text" id="email" name="email">
		</p>
		<input style="width: 100px; background-color: whitesmoke; padding: 20px;" type="submit" name="save" value="Salvar">
	</form>
</div>
<?php
	if(isset($_POST['save'])){
		$data = file_get_contents('members.json');
		$data = json_decode($data);

		//array dos dados coletados nos input
		$input = array(
			'cpf' => $_POST['cpf'],
			'firstname' => $_POST['firstname'],
			'lastname' => $_POST['lastname'],
			'address' => $_POST['address'],
			'email' => $_POST['email']
		);

		//atualzar o json
		$data[] = $input;
		$data = json_encode($data, JSON_PRETTY_PRINT);
		file_put_contents('members.json', $data);

		header('location: /index.php');
	}
?>
</body>
</html>