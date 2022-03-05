<?php
session_start();
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
              <a class="nav-link active " aria-current="page" href="index.php">Cadastro</a>
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
  <h1 style="font-size: 50px; text-align:center; font-style: italic;" >Cadastro de cliente</h1>
<br><hr style="height:5px;border-width:0;color:gray;background-color:gray">
  <form method="POST" action="processa.php">
    <div class="mb-3">
      <label style="font-size: 25px" class="form-label">Nome completo</label>
      <input type="text" class="form-control" name="nome">
      <div class="form-text">Digite o nome completo do cliente</div>
    </div>
<br>
    <div class="mb-3">
      <label style="font-size: 25px"  class="form-label">CPF</label>
      <input type="number" class="form-control" name="cpf">
      <div class="form-text">Digite o CPF do cliente</div>
    </div>
<br>
    <div class="mb-3">
      <label style="font-size: 25px" class="form-label">Data nascimento</label>
      <input type="date" class="form-control" name="nascimento">
      <div class="form-text">Escolha a data de nascimento do cliente</div>
    </div>
<br>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>

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

