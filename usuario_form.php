	<?php 
		
		if(isset($_GET['id'])){
		include ("conectar.php");
		$id= $_GET['id'];
		session_start();
		if($_SESSION['idUsuario'] != $id && $_SESSION['tipoUsuario'] != "admin"){
			header("location:index.php?erro=permissao");
		}

		
	$sqlQuery = "select * from usuario where id=$id";
	$mysqlQuery = mysql_query($sqlQuery);


	while($result=mysql_fetch_assoc($mysqlQuery)){

	$resultadoRegistro[0] = $id;
	$resultadoRegistro[1] = $result["nome"];
	$resultadoRegistro[2] = $result["login"];
	$resultadoRegistro[3] = $result["senha"];
	$resultadoRegistro[4] = $result["tipo"];
	$resultadoRegistro[5] = $result["foto"];

	}

	}else{
	$resultadoRegistro[0] = "";
	$resultadoRegistro[1] = "";
	$resultadoRegistro[2] = "";
	$resultadoRegistro[3] = "";
	$resultadoRegistro[4] = "";
	$resultadoRegistro[5] = "";

	}

	if($resultadoRegistro[5] == ""){
				$resultadoRegistro[5] = "usuario.jpg";
			}

	echo "<form action=usuario_post.php method=post  enctype='multipart/form-data'>";
	
	if(isset($id)){
		echo "Id<input readonly name=id value=$id><br><br>";
		}
		echo "Nome<input name=nome value='$resultadoRegistro[1]' placeholder=nome><br><br>";
				if(isset($_GET['erro'])){
			if($_GET['erro']=="login"){
				echo "LOGIN JÁ EM USO<br>";
			}
			}
			echo "login<input name=login value='$resultadoRegistro[2]'><br><br>senha<input type=password name=senha value='$resultadoRegistro[3]' ><br><br>";
			if($resultadoRegistro[0] != ""){
		echo "<br><img width=50 height=50 src='imagens/usuario/$resultadoRegistro[5]'><br>";
		}
		echo "<input type=file name=imagem><br>";
		
			if(isset($_SESSION['tipoUsuario']) && $_SESSION['tipoUsuario']=="admin"){
			echo "tipo<select name='tipo'>";
			//ESTRUTURA DE REPETICAO DO BANCO
			echo "<option value='admin' ".($resultadoRegistro[4] == "admin" ? "selected" : "").">Admin</option>";
			echo "<option value='usuario' ".($resultadoRegistro[4] == "usuario" ? "selected" : "").">Usuario</option>";
			//ATE AQUI
			echo "</select><br><br>";
			}
			echo "<input type=submit value=submit></form>";
			echo "<a href=home.php><button>VOLTAR</button></a>";
			?>