<?php
  include 'action.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="Dione Lima">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="../assets/css/bootstrap.css" rel="stylesheet">


<link rel="shortcut icon" href="imagem/logo.png" type="image/x-icon">
  <!-- Required meta tags -->
   <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <!-- Bootstrap CSS -->
  <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">-->

  <title>sgp</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#" >
  <img width="90px" height="70px" src="imagens/logo.png"/>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/sgp/index.php">Home<span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="/sgp/register.php">Cadastrar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/sgp/list.php">Listar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Suporte</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sobre</a>
      </li>
     </ul>
     <form class="form-inline" action="/action_page.php">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquise aqui " aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
    </form>
  </div>
</nav>
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-10">
<h3 class="text-center text-dark mt-2">SGP - Sistema de Cadastro Funcionário</h3>
<hr>
</nav>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 mt-3 bg-success p-4 rounded">
        <h2 class="bg-light p-2 rounded text-center text-dark">Matricula : <?= $vmatricula; ?></h2>
        <div class="text-center">
          <br>
          <img src="<?= $vphoto; ?>" width="300" class="img-thumbnail">
        </div>
        <br>
        <h4 class="text-light">Nome : <?= $vname; ?></h4>
        <h4 class="text-light">idade : <?= $vidade; ?></h4>
        <h4 class="text-light">Setor : <?= $vsetor; ?></h4>
        <h4 class="text-light">Login : <?= $vlogin; ?></h4>
        <h4 class="text-light">Senha : <?= $vsenha; ?></h4>
      </div>
    </div>
  </div>
</body>

</html>