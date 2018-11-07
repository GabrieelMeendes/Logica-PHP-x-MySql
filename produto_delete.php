	<?php
		session_start();
			if($_SESSION['idUsuario'] != $id){
				header("location:index.php?erro=permissao");
			}

	include ("conectar.php");

	$id = $_GET['id'];

	$sqlQuery = "delete from produto where id=$id";

	$mysqlQuery = mysql_query($sqlQuery); //EXECUTA A QUERY
	header("location:produto_list.php");

?>