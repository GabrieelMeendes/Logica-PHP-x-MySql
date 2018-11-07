		<?php

		$host = "localhost";
		$user = "root";
		$passwd = "1234";
		$base = "phpbanco01";
		$conexao = @mysql_connect($host ,$user, $password);

		//verifica se o SGBD é conectável
		if (!$conexao) {
			$mensagem = "Nao foi possivel estabelecer a conexao";
			echo $mensagem . "<hr>";
			die(mysql_error());
		}

		$db = mysql_select_db($base,$conexao); //conecta no banco
		mysql_set_charset('utf8', $conexao); //setta a maneira de retorno do banco, pra evitar problemas de acentuação

		//verifica se a conexão com o banco teve sucesso
		if (!$db) {
			$mensagem = "Nao foi possivel encontrar o banco de dados";
			echo $mensagem . "<hr>";
			die(mysql_error());
		}
		?> 