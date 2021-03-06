<?php
session_start();
include_once("conexao.php");
$id = filter_input (INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Cadastrar de cliente</title>	
  </head>
  <body>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Painel de controle de cliente</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link  " aria-current="page" href="index.php">Cadastro</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="listar.php">Lista de clientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pesquisar.php">Pesquisar pelo nome do clientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pesquisar_por_cpf.php">Pesquisar pelo CPF do clientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sobre.html">Informação sobre o projeto</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>

		<br>
		<h1 style="font-size: 50px; text-align:center; font-style: italic;" >Alteração nos dados do cliente</h1>
		<br><hr style="height:5px;border-width:0;color:gray;background-color:gray">
		<form method="POST" action="proc_edit_usuario.php">
		<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
<br>
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br><br>

			<label>CPF </label>
			<input type="text" name="cpf" placeholder="Digite seu cpf" value="<?php echo $row_usuario['cpf']; ?>"><br><br>

			<label>Data de nascimento </label>
			<input type="date" name="nascimento" placeholder="Digite sua data de nascimento" value="<?php echo $row_usuario['nascimento']; ?>"><br><br>
			
			<br>
		    <button type="submit" class="btn btn-primary">Alterar</button>
		</form>
		<hr>
	</body>
</html>