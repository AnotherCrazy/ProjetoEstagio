<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$nascimento = filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "CPF: $cpf <br>";
//echo "Data de nascimento: $nascimento <br>";

$result_usuario = "UPDATE usuarios SET nome='$nome', CPF='$cpf', nascimento='$nascimento', modified=NOW() WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Informações editadas com sucesso</p>";
	header("Location: listar.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Informações não editadas com sucesso</p>";
	header("Location: edit.php?id=$id");
}
