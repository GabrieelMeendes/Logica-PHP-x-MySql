


	<?php
	include ("conectar.php");
	//variáveis

		session_start();
		if(!(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] == "admin")){
			header("location:index.php?erro=permissao");
		}
	
	$sqlQuery = "select * from usuario";

	$mysqlQuery = mysql_query($sqlQuery);
	 //EXECUTA A QUERY
	
	echo $_SESSION['idUsuario']." - ";
	echo $_SESSION['nomeUsuario']." - ";
	echo $_SESSION['tipoUsuario'];
	echo "<br><img width=50 height=50 src='imagens/usuario/".($_SESSION['fotoUsuario'] != "" ? $_SESSION['fotoUsuario'] : "usuario.jpg")."'>";
	echo "<center> <br><a href=usuario_form.php><button>NOVO</button></a><br><br>";
	echo "<table border=2>";
	echo "<tr>";
	echo "<th>";
	echo "ID";
	echo "</th>";
	echo "<th>";
	echo "NOME";
	echo "</th>";
	echo "<th>";
	echo "LOGIN";
	echo "</th>";
	echo "<th>";
	echo "SENHA";
	echo "</th>";
	echo "<th>";
	echo "TIPO";
	echo "</th>";
	echo "<th>";
	echo "FOTO";
	echo "</th>";
	echo "<th colspan=2>";
	echo "AÇÕES";
	echo "</th>";
	echo "</tr>";

	echo "<a href=home.php><button>VOLTAR</button></a><br><br>";
	echo "<center>Tabela de Usuario ";
	
	while($result=mysql_fetch_assoc($mysqlQuery)){ //PERCORRE OS DADOS RETORNADOS DA QUERY
	//ATRIBUI VALORES

	$resultadoRegistro[0]=$result["id"];
	$resultadoRegistro[1]=$result["nome"];
	$resultadoRegistro[2]=$result["login"];
	$resultadoRegistro[3]=$result["senha"];
	$resultadoRegistro[4]=$result["tipo"];
	$resultadoRegistro[5]=$result["foto"];

	if($resultadoRegistro[5] == ""){
				$resultadoRegistro[5] = "usuario.jpg";
			}

	echo "<tr>";
	echo "<td>";
	echo $resultadoRegistro[0];
	echo "</td>";


	echo "<td bordercolor=black>";
	echo $resultadoRegistro[1];
	echo "</td>";

	echo "<td bordercolor=black>";
	echo $resultadoRegistro[2];
	echo "</td>";

	echo "<td bordercolor=black>";
	echo $resultadoRegistro[3];
	echo "</td>";

	echo "<td bordercolor=black>";
	echo $resultadoRegistro[4];
	echo "</td>";
	echo "</td>";

	echo "<td bordercolor=black>";
	echo "<img width=50 height=50 src='produto\$resultadoRegistro[5]'>";
	echo "</td>";

	echo "<td bordercolor=black>";
	echo "<a href='usuario_form.php?id=".$resultadoRegistro[0]."'>Alterar";
	echo "</td>";

	echo "<td bordercolor=black>";
	echo "<a href='usuario_delete.php?id=".$resultadoRegistro[0]."'>Excluir";
	echo "</td>";
	echo "</tr>";

	//USA AS VARIÁVEIS
	}
	echo "</table></center>";

	?>

	</body>
	</html>