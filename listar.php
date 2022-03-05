<?php
session_start();
include_once ("conexao.php");

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
              <a class="nav-link  " aria-current="page" href="index.php">Cadastro</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="listar.php">Lista de clientes</a>
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
  <br>	
  <h1 style="font-size: 50px; text-align:center; font-style: italic;" >Lista de cliente</h1>
<br><hr style="height:5px;border-width:0;color:gray;background-color:gray">
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		//Quebra de pagina caso a pagina tenha mais de 20 cliente
			$pagina_atual = filter_input (INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
		
			$pagina = (!empty($pagina_atual)) ?  $pagina_atual : 1;

		//Fim quebra de pagina

		//Quantos clientes quero por paginas

			$qnt_result_pagina = 20;

		// Fim quantos clientes por pagina

		//calculo para quanto cliente a pagina deve exbir

			$incio = ($qnt_result_pagina * $pagina) - $qnt_result_pagina;

		// Fim calculo

		//Configuração paginação 
			$result_usuarios = "SELECT * FROM usuarios LIMIT $incio, $qnt_result_pagina";
			$resultado_usuarios = mysqli_query ($conn, $result_usuarios);
			
			while ($row_usuario = mysqli_fetch_assoc ($resultado_usuarios)){
				echo "ID:" . $row_usuario ['id'] . "<br>";
				echo "Nome:" . $row_usuario ['nome'] . "<br>";
				echo "CPF:" . $row_usuario ['cpf'] . "<br>";
				echo "Data de nascimento:" . $row_usuario ['nascimento'] . "<br>";
				echo "<a href='edit.php?id=" . $row_usuario ['id'] . "'>Alterar</a>";
				echo "<a href='proc_apagar_usuario.php?id=" . $row_usuario ['id'] . "'> Apagar</a><br><hr>";
		}
		//Fim da configuração de paginação 			
		
		//Somar quantidade de usuarios para criar paginas
		$result_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];

		//Quantidade de paginas dividir pelo valor de resultado

		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pagina);

		//Quantidade de paginas que vão aparecer

		$max_links = 5;
		echo "<a href='listar.php?pagina=1'>Primeira</a> ";

		for($pag_anterior = $pagina - $max_links; $pag_anterior <= $pagina - 1; $pag_anterior ++){
			
			if($pag_anterior >= 1){

			echo "<a href='listar.php?pagina=$pag_anterior'>$pag_anterior</a> ";
			}
		}

		echo "$pagina ";

		for($pag_depois = $pagina + 1; $pag_depois <= $pagina + $max_links; $pag_depois++){
			if($pag_depois <= $quantidade_pg){
			echo "<a href='listar.php?pagina=$pag_depois'>$pag_depois</a>";
			}
		}

		echo "<a href='listar.php?pagina=$quantidade_pg'>Ultima</a> ";


		?>

	<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

	</body>
</html>