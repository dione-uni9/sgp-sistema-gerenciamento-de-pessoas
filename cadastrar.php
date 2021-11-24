<?php
include 'action2.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="author" content="DIONE LIMA">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="../assets/css/bootstrap.css" rel="stylesheet">


<link rel="shortcut icon" href="imagem/logo.png" type="image/x-icon">
  <!-- Required meta tags -->
   <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <!-- Bootstrap CSS -->
  <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
  integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">-->

<title>Sgp</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
  <img width="80px" height="60px" src="imagens/logo.png"/>
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
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquise aqui " aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="pesquisar"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
  <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
</svg>Pesquisar</button>
    </form>
  </div>
</nav>
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-10">
<h3 class="text-center text-dark mt-2">Sistema de Cadastro Funcionário</h3>
<hr>

 <!-- Alerta de inserido  -->
<?php if (isset($_SESSION['response'])) { ?>
      <div class="alert alert-success alert-<?= $_SESSION['res_type']; ?> 
      alert-dismissible text-center" role="alert">
      <button  type="button" class="close" data-dismiss ="alert">&times;</button>
      <b><?= $_SESSION['response']; ?></b>    
      </div>
      <?php } unset($_SESSION['response']); ?>
 <!-- Alerta de inserido  -->

</div>
</div>
<p align="center"><table align="center">
<tr>
<td>
 <div class="col-md-15">

<h3 class="text-center ">Cadastrar Funcionário</h3>
<form action="action2.php" method="post" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?= $id; ?>">  <!-- Comando para atualização do funmulario de dados   -->
  
  <h7 class="text-left ">Nome:</h7>
  <div class="form-group">
    <input type="text" class="form-control" value="<?= $name; ?> "  name="name"  required> <!--O comando value  nos campos imprime os dado do usuario do banco de dados   --> 
  </div>
  <h7 class="text-left ">Idade:</h7>
  <div class="form-group">
    <input type="text" class="form-control" value="<?= $idade; ?> " name="idade"  required>
  </div>
  <h7 class="text-left ">Matricula:</h7>
  <div class="form-group">
    <input type="text" class="form-control" value="<?= $matricula; ?> "  name="matricula"  required>
  </div>
  <h7 class="text-left ">Setor:</h7>
  
  <div class="form-group">
    <input type="text" class="form-control" value="<?= $setor; ?> " name="setor" required>
  </div>
  <div class="mb-3">
          <label for="username">Login:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" name="login" value="<?= $login; ?>" required >
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
  </div>

  </div>
  <h7 class="text-left ">Senha:</h7>
  <div class="form-group">
    <input type="text" class="form-control"  value="<?= $senha; ?> "name="senha" required>
  </div>
    <div class="form-group">
    <h4>Carregar Foto:</h4>

    <input type="hidden" name="oldimage" value="<?= $photo; ?>" >  <!--Comando imprime a imagem atua do usuario para alterar  -->
    
    <input type="file" name="image" class="custom-file">
    <img src="<?= $photo; ?>" width="120" class="img-thumbnail">
  </div>

  <div class="form-group">

  <?php if($update==true){?> <!--Comando mostrar o butao de alterar na pagina caso click em alterar na lista de  usuarios  -->
    
        <input type="submit" name="update" class="btn btn-success btn-block" value="Alterar">
  <?php }else{ ?>
        <input type="submit" name="add" class="btn btn-success btn-block" value="Cadastrar">
  <?php } ?>      
  
</div>
</td>
</tr>
</table></p>
  </form>

</body> 

 <script type="text/javascript">
  $(document).ready(function() {
    $('#data-table').DataTable({
      paging: true
    });
  });
  </script>
</html>