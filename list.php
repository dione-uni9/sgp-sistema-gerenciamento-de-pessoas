<?php
  include 'action2.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
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
  <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">-->

  <title>SISTEMA GESTÃO DE PESSOAS</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#" >
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
     <form class="form-inline" method="POST" action="list.php">
      <input name="pesquisar" class="form-control mr-sm-2" type="search" placeholder="Pesquise aqui " aria-label="Search">
      <button name="pesq" class="btn btn-outline-success my-2 my-sm-0" type="submit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
  <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
</svg>Pesquisar</button>
</form>

  </div>
</nav>
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-10">
<h3 class="text-center text-dark mt-2">SGP - Sistema de Cadastro Funcionário </h3>
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
</nav>


<div class="">

<!-- Listando os usuario do banco de dados  -->
<?php
$query = 'SELECT * FROM usuario';
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result(); // variavel result recebe os dados do banco 
?>
<!-- Listando os usuario do banco de dados  -->




<h3 class="text-center ">Listar de Usuário</h3>
<table class="table table-hover" id="data-table">
    <thead>
    <tr>
        <th scope="col" >Id</th>
        <th scope="col">Foto</th>
        <th scope="col">Nome</th>
        <th scope="col">Matricula</th>
        <th scope="col">Setor</th>
        <th scope="col">Login</th>
        <th scope="col">Senha</th>
        <th scope="col">Ações</th>
</tr>


    </thead>
    <tbody>




<?php 

    /*$pesquisar = $_POST['pesquisar'];
    $result_cursos = "SELECT * FROM usuario WHERE nome LIKE '%$nome%' LIMIT 5";
    $resultado_cursos = mysqli_query($conn, $result_cursos);*/

while ($row = $result->fetch_assoc()) { 




?> <!-- O comando while lista todos os dados do banco  -->


    <tr>

    
      <th scope="row"><?= $row['id']?></th> <!-- O comando $row chama os dados contidos na tabela id  -->
      <td><img src="<?= $row['photo']; ?>" width="25"></td> <!-- O comando $row chama os dados das fotos -->
      <td><?= $row['name']?></td> <!-- O comando $row chama os dados contidos na tabela nome  -->
      <td><?= $row['matricula']?></td>
      <td><?= $row['setor']?></td>
      <td><?= $row['login']?></td>
      <td><?= $row['senha']?></td>
            <td>


       <a href="details.php?details=<?= $row['id']; ?>" class="badge badge-primary  p-2"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-stickies" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 1.5A1.5 1.5 0 0 1 1.5 0H13a1 1 0 0 1 1 1H1.5a.5.5 0 0 0-.5.5V14a1 1 0 0 1-1-1V1.5z"/>
  <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 0 1 3.5 2h11A1.5 1.5 0 0 1 16 3.5v6.086a1.5 1.5 0 0 1-.44 1.06l-4.914 4.915a1.5 1.5 0 0 1-1.06.439H3.5A1.5 1.5 0 0 1 2 14.5v-11zM3.5 3a.5.5 0 0 0-.5.5v11a.5.5 0 0 0 .5.5h6.086a.5.5 0 0 0 .353-.146l4.915-4.915A.5.5 0 0 0 15 9.586V3.5a.5.5 0 0 0-.5-.5h-11z"/>
  <path fill-rule="evenodd" d="M10.5 10a.5.5 0 0 0-.5.5v5H9v-5A1.5 1.5 0 0 1 10.5 9h5v1h-5z"/>
</svg>Detalhes</a> | <!-- O comando  recebe o id para vicular  -->
       <a href="action2.php?delete=<?= $row['id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Voce deseja deletar esse usuario ??');" ><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>Excluir</a> | <!-- O comando onclick return = "" da um alerta de opção de exclusao do dado  -->
       <a href="register.php?edit=<?= $row['id']; ?>" class="badge badge-success p-2"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg>Alterar</a> 
      </td>

      </form>
    <tr>

    </tr>
   
   <?php } ?>


    <tbody>
</table>

</div>

</body>

  <script type="text/javascript">
  $(document).ready(function() {
    $('#data-table').DataTable({
      paging: true
    });
  });
  </script>
</html>