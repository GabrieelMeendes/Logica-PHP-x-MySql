	<html>
		
		<head>
		
			<title>PRODUTO - LISTAR</title>
		
		</head>
	
	
	<body>




<style type="text/css">

table {
margin: 10px;
}

th {
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
background: #111;
color: #FFF;
padding: 5x 8px;
border-collapse: separate;
border: 4px solid #020;
text-align: center;
}

td {
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
border: 1px solid #DDD;
text-align: center;
}
</style>




	<?php
	
	
	include ("conectar.php");
	//variáveis

		session_start();
		if(!(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] == "admin")){
			header("location:index.php?erro=permissao");
		}

	$sqlQuery = "select * from produto";

	$mysqlQuery = mysql_query($sqlQuery); //EXECUTA A QUERY
	echo $_SESSION['idUsuario']." - ";
	echo $_SESSION['nomeUsuario']." - ";
	echo $_SESSION['tipoUsuario'];
	echo "<table border=2>";
	echo "<tr>";
	echo "<th>";
	echo "<center><a href=produto_form.php><button>NOVO</button></a></center>";
	echo "</th>";
	echo "</tr>";
	echo "</table>";
	echo "<center> <a href=home.php><button>VOLTAR</button></a>";
	echo "<table border=2>";
	echo "<tr>";
	echo "<th>";
	echo "ID";
	echo "</th>";
	echo "<th>";
	echo "NOME";
	echo "</th>";
	echo "<th>";
	echo "PREÇO";
	echo "</th>";
	echo "<th>";
	echo "DESCRIÇÃO";
	echo "</th>";
	echo "<th>";
	echo "MARCA";
	echo "</th>";
	echo "<th>";
	echo "MODELO";
	echo "</th>";
	echo "<th>";
	echo "FOTO";
	echo "</th>";
	echo "<th colspan=2>";
	echo "AÇÕES";
	echo "</th>";
	echo "</tr>";
	
	
	while($result=mysql_fetch_assoc($mysqlQuery)){ //PERCORRE OS DADOS RETORNADOS DA QUERY
	//ATRIBUI VALORES

	$resultadoRegistro[0]=$result["id"];
	$resultadoRegistro[1]=$result["nome"];
	$resultadoRegistro[2]=$result["preco"];
	$resultadoRegistro[3]=$result["descricao"];
	$resultadoRegistro[4]=$result["marca"];
	$resultadoRegistro[5]=$result["modelo"];
	$resultadoRegistro[6]=$result["foto"];


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
	echo "<td bordercolor=black>";
	echo $resultadoRegistro[5];
	echo "</td>";
	echo "<td bordercolor=black>";
	echo "<img width=50 height=50 src='produto/$resultadoRegistro[6]'>";
	echo "</td>";
	echo "<td bordercolor=black>";
	echo "<a href='produto_form.php?id=".$resultadoRegistro[0]."'>Alterar";
	echo "</td>";
	echo "<td bordercolor=black>";
	echo "<a href='produto_delete.php?id=".$resultadoRegistro[0]."'>Excluir";
	echo "</td>";
	echo "</tr>";

	//USA AS VARIÁVEIS
	}
	echo "</table></center>";

	?>

	</body>
	</html>