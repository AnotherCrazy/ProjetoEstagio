<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastrar de cliente</title>		
	</head>
	<body>
		<a href="index.php">Cadastrar de cliente</a><br>
		<a href="listar.php">Lista de clientes</a><br>

		<h1>Cadastrar de cliente</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="processa.php">
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo"><br><br>

			<label>CPF </label>
			<input type="text" name="cpf" placeholder="Digite seu cpf"><br><br>

			<label>Data de nascimento </label>
			<input type="date" name="nascimento" placeholder="Digite sua data de nascimento"><br><br>
			
			<input type="submit" value="Cadastrar">
		</form>
	</body>
</html>