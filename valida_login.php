	<?php
		include ("conectar.php");
		$login= $_POST['login'];
		$senha= $_POST['senha'];
		
		$sqlQuery = "select * from usuario where login='$login' and senha='$senha'";
		
		$mysqlQuery = mysql_query($sqlQuery);
		if(mysql_num_rows($mysqlQuery) > 0){
			while($result=mysql_fetch_assoc($mysqlQuery)){
				session_start();
				$_SESSION['idUsuario'] = $result["id"];
				$_SESSION['nomeUsuario'] = $result["nome"];
				$_SESSION['loginUsuario'] = $result["login"];
				$_SESSION['tipoUsuario'] = $result["tipo"];
				$_SESSION['fotoUsuario'] = $result["foto"];
			}	
			header("location:home.php");
		}else{
			header("location:index.php?erro=true");
		}
