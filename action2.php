<?php

session_start(); // inicia seçãoa com o formuladorio para os alertas 

include 'config.php';

$update=false; //se a nao for clicado o butão alterar ele nao adiciona os dados nos campos 

$id=""; //deixa os campos todos vazios no formuladorio 
$name="";
$idade="";
$matricula="";
$setor="";
$login="";
$senha="";
$photo="";
	
 //função de inserir no banco
if(isset($_POST['add'])){
$name=$_POST['name'];
$idade=$_POST['idade'];
$matricula=$_POST['matricula'];
$setor=$_POST['setor'];
$login=$_POST['login'];
$senha=$_POST['senha'];

$photo=$_FILES['image']['name'];
$upload="uploads/".$photo;

$query=" INSERT INTO usuario(name,idade,matricula,setor,login,senha,photo)VALUES(?,?,?,?,?,?,?)";
$stmt=$conn->prepare($query);
$stmt->bind_param("sssssss",$name,$idade,$matricula,$setor,$login,$senha,$upload);
$stmt->execute();
move_uploaded_file($_FILES['image']['tmp_name'], $upload);
header('location:register.php');
 //função de inserir no banco

 //função de alerta inserido no banco
$_SESSION['response']="Inserido no Banco com Sucesso!";
$_SESSION['res_type']="Sucesso";
 //função de alerta inserido no banco
}

//função para deletar no banco
if(isset($_GET['delete'])){

//deleta foto
$id=$_GET['delete'];

$sql="SELECT photo FROM usuario WHERE id=?";
$stmt2=$conn->prepare($sql);
$stmt2->bind_param("i",$id);
$stmt2->execute();
$result2=$stmt2->get_result();
$row=$result2->fetch_assoc();

//deleta foto do diretorio uploads para nao ter fotos duplicadas 
$imagepath=$row['photo'];
unlink($imagepath);
//deleta foto



//deleta id usuario
$query="DELETE FROM usuario WHERE id=?";
$stmt=$conn->prepare($query);
$stmt->bind_param("i",$id);
$stmt->execute();
//deleta id usuario


header('location:list.php');
$_SESSION['response']="Deletado com Sucesso!";
$_SESSION['res_type']="danger";
}
//função para deletar no banco


//função para alterar no banco

if(isset($_GET['edit'])){

$id=$_GET['edit'];

$query="SELECT * FROM usuario WHERE id=?";
$stmt=$conn->prepare($query);
$stmt->bind_param("i",$id);
$stmt->execute();
$result=$stmt->get_result();
$row=$result->fetch_assoc();

$id=$row['id']; // tiras os dados do banco
$name=$row['name'];
$idade=$row['idade'];
$matricula=$row['matricula'];
$setor=$row['setor'];
$login=$row['login'];
$senha=$row['senha'];
$photo=$row['photo'];

$update=true; //o botao for alterar clicado ele lista as imformaçoes no formulario

}
//função para deletar no banco




if(isset($_POST['update'])){

$id=$_POST['id'];
$name=$_POST['name'];
$idade=$_POST['idade'];
$matricula=$_POST['matricula'];
$setor=$_POST['setor'];
$login=$_POST['login'];
$senha=$_POST['senha'];
$oldimage=$_POST['oldimage']; //carrega imagem atual do usuario 


 //função para atualizar a imagem do usuario 
if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")){  //carrega imagem atual do usuario

$newimage="uploads/".$_FILES['image']['name'];
unlink($oldimage);
move_uploaded_file($_FILES['image']['tmp_name'], $newimage); //move para pasta uploads
}else{

$newimage=$oldimage; //altera a imagem antiga para a nova 
}
$query="UPDATE usuario SET name=?,idade=?, matricula=?,setor=?,login=?,senha=?,photo=?  WHERE id=?";
$stmt=$conn->prepare($query);
$stmt->bind_param("sssssssi",$name,$idade,$matricula,$setor,$login,$senha,$newimage,$id);
$stmt->execute();

$_SESSION['response']="Alterado com Sucesso!";
$_SESSION['res_type']="primary";
header('location:register.php');

}
 //função para atualizar a imagem do usuario


if(isset($_GET['details'])){ //função para mostrar dados completo dos usuarios 

		$id=$_GET['details'];
		$query="SELECT * FROM usuario WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$vid=$row['id'];
		$vname=$row['name'];
		$vidade=$row['idade'];
		$vmatricula=$row['matricula'];
		$vsetor=$row['setor'];
		$vlogin=$row['login'];
		$vsenha=$row['senha'];
		$vphoto=$row['photo'];
	}


?>