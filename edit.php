<?php
session_start();
include_once("conexao.php");
$id = filter_input (INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Editar dados do cliente</title>		
	</head>
	<body>
		<a href="index.php">Cadastrar de cliente</a><br>
		<a href="listar.php">Lista de clientes</a><br>
		<a href="edit.php">Editar dados do clientes</a><br>
		<h1>Editar dados do cliente</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_edit_usuario.php">
		<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">

			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br><br>

			<label>CPF </label>
			<input type="text" name="cpf" placeholder="Digite seu cpf" value="<?php echo $row_usuario['cpf']; ?>"><br><br>

			<label>Data de nascimento </label>
			<input type="date" name="nascimento" placeholder="Digite sua data de nascimento" value="<?php echo $row_usuario['nascimento']; ?>"><br><br>
			
			<input type="submit" value="Alterar">
		</form>
	</body>
</html>