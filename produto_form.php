	<?php

	session_start();
	if(!(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] == "admin")){
		header("location:index.php?erro=permissao");
	}

	if(isset($_GET['id'])){
		include ("conectar.php");
		$id= $_GET['id'];
		
		$sqlQuery = "select * from produto where id=$id";
		
		$mysqlQuery = mysql_query($sqlQuery);
		while($result=mysql_fetch_assoc($mysqlQuery)){
			
			$resultadoRegistro[0] = $id;
			$resultadoRegistro[1] = $result["nome"];
			$resultadoRegistro[2] = $result["preco"];
			$resultadoRegistro[3] = $result["descricao"];
			$resultadoRegistro[4] = $result["marca"];
			$resultadoRegistro[5] = $result["modelo"];
			$resultadoRegistro[6] = $result["foto"];
		}
		
	}else{
		$resultadoRegistro[0] = "";
		$resultadoRegistro[1] = "";
		$resultadoRegistro[2] = "";
		$resultadoRegistro[3] = "";
		$resultadoRegistro[4] = "";
		$resultadoRegistro[5] = "";
		$resultadoRegistro[6] = "";
	}

	echo "
	<html>
		<head>
				<title>PRODUTO</title>
		</head>
	
	<body>";

	echo $_SESSION['idUsuario']." - ";
	echo $_SESSION['nomeUsuario']." - ";
	echo $_SESSION['tipoUsuario'];
	echo "<form action=produto_post.php method=post enctype='multipart/form-data'>";

	if(isset($id)){
		echo "Id<input name=id value=$id><br><br>";
	}


	echo "
	Nome<input name=nome value='$resultadoRegistro[1]'><br><br>
	Preço<input name=preco value='$resultadoRegistro[2]'><br><br>
	Descrição<input name=descricao value='$resultadoRegistro[3]'><br><br>
	Marca<input name=marca value='$resultadoRegistro[4]'><br><br>
	Modelo<input name=modelo value='$resultadoRegistro[5]'><br><br>
	Foto<input type=file name=foto value='$resultadoRegistro[6]'><br><br><br>
	<input type=submit value=submit>
	
</form>
</body>
</html>";
echo "<a href=home.php><button>VOLTAR</button></a>";
?>
