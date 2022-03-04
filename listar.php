<?php
session_start();
include_once ("conexao.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Lista de clientes</title>		
	</head>
	<body>
		<a href="index.php">Cadastrar de cliente</a><br>
		<a href="listar.php">Lista de clientes</a><br>
		<a href="edit.php">Editar dados do clientes</a><br>
		<h1>Lista de clientes</h1>
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
				echo "cpf:" . $row_usuario ['cpf'] . "<br>";
				echo "Data de nascimento:" . $row_usuario ['nascimento'] . "<br><hr>";
				echo "<a href='edit.php?id=" . $row_usuario ['id'] . "'>Alterar</a><br><hr>";

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

	</body>
</html>