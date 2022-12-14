<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>E-Campanhado</title>
  </head>
  <body>
  
  <?php
    include_once "conexao.php";
	
	$id=$_GET["id"];
	
	$comandoSql= "select nome_usuario, tipo_usuario from tb_usuario where id_usuario=$id";
	
	$resultado = $pdo->query($comandoSql);
	if ($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
	$nome=$linha["nome_usuario"];
	$tipo=$linha["tipo_usuario"];
	
	session_start();
	$_SESSION["nome"] = $nome;
	$_SESSION["tipo"]= $tipo;
	}
	if ($_SESSION["tipo"]==1)
	$descricaoTipo="admin";
	else
	$descricaoTipo="comum";

	echo"<div class='alert alert-primary' role='alert'>";
	echo "Bem vindo, ". $_SESSION['nome'] ." você está logado como " .$descricaoTipo;
	echo"</div>";
	echo "<h5> DADOS </h5>";
	$con=mysqli_connect("localhost","root","","bd_projeto");
	$comandoSql="select * from tb_usuario";
	$resultado=mysqli_query($con,$comandoSql);
	
	while($dados=mysqli_fetch_assoc($resultado)){
		$id=$dados["id_usuario"];
		$nome=$dados["nome_usuario"];
		$email=$dados["email_usuario"];
	if ($_SESSION["tipo"]==0)
	echo "id: $id <br>";
	echo "nome: $nome <br>";
	echo "email: $email <br>";
	echo"<a href='sair.php'>Sair</a>";
	}
?>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>