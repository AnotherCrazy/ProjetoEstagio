<?php
include_once "conexao.php";
?>
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
              <a class="nav-link " aria-current="page" href="index.php">Cadastro</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="listar.php">Lista de clientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pesquisar.php">Pesquisar pelo nome do clientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="pesquisar_por_cpf.php">Pesquisar pelo CPF do clientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sobre.html">Informação sobre o projeto</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
	<br>	
  <h1 style="font-size: 50px; text-align:center; font-style: italic;" >Buscar pelo CPF do cliente</h1>
<br><hr style="height:5px;border-width:0;color:gray;background-color:gray">

		<form method="POST" action="">
    <label>CPF: </label>
			<input type="text" name="cpf" placeholder="Digite o nome"><br><br>
			
      <button type="submit" name="enviar" value="Pesquisar" class="btn btn-primary">Buscar</button>
      <hr>
		</form><br><br>
        <?php
        $enviar = filter_input(INPUT_POST, 'enviar', FILTER_SANITIZE_STRING);
        if($enviar) {
			$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
			$result_usuario = "SELECT * FROM usuarios WHERE cpf LIKE '$cpf'";
			$resultado_usuario = mysqli_query($conn, $result_usuario);
			while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
				echo "ID: " . $row_usuario['id'] . "<br>";
                echo "nome: " . $row_usuario['nome'] . "<br>";
                echo "cpf: " . $row_usuario['cpf'] . "<br>";
                echo "nascimento: " . $row_usuario['nascimento'] . "<br>";
                echo "<a href='edit.php?id=" . $row_usuario['id'] . "'>Editar</a>";
				echo "<a href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "'> Apagar</a><br><hr>";

            }
        }
        
        ?>
	</body>
</html>