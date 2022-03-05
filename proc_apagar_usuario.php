<?php
session_start();
include_once("conexao.php");

$id = filter_input (INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "DELETE FROM usuarios WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Cliente deletado com sucesso</p>";
	header("Location: listar.php");
  }else{
	$_SESSION['msg'] = "<p style='color:red;'>Erro ao deletar o cliente</p>";
	header("Location: listar.php");
    
}