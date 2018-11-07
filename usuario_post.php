	<?php
		
		include ("conectar.php");
		session_start();
		if(isset($_SESSION['idUsuario'])){
			if($_SESSION['idUsuario'] != $_POST['id'] && $_SESSION['tipoUsuario'] != "admin"){
				header("location:index.php?erro=permissao");
			}
		}
		
		$nome = $_POST['nome'];
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$tipo = (isset($_POST['tipo']) ? $_POST['tipo'] : "usuario");
		$id = (isset($_POST['id']) ? $_POST['id'] : "");
		$foto = $_FILES['imagem'];
		
		
		if(isset($id) && $id != ""){
			//validar tipoUsuario, para n passar tipo sem ser admin :)
			$sqlQuery = "update usuario set nome='$nome', login='$login', senha='$senha', tipo='$tipo' where id=$id";	
			}
			else{
			$sqlQuery =	"select login from usuario where login='$login'";
			$mysqlQuery = mysql_query($sqlQuery);
			if(mysql_num_rows($mysqlQuery) != 0){
				header("location:usuario_form.php?erro=login");
				exit();
				}else{
				$sqlQuery =	"insert into usuario(nome,login,senha,tipo) values('$nome','$login','$senha','usuario')";
			}
		}
		
		//se tiver imagem 
		if (!empty($foto["name"])) {
			//valida tipo da imagem
			if( !preg_match( '/^image\/(jpeg|jpg|png|gif|bmp|svg)$/' , $foto[ 'type' ] ) ){
				echo "IMAGEM INVÁLIDA"; //header mensagem de erro
				}else{
				//tira a extensão da imagem
				preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
				//grava no banco (sem imagem)
				mysql_query($sqlQuery); //executar a query lá de cima
				//pega o ultimo id inserido (caso necessário)
				$id = ($id != "" ? $id : mysql_insert_id());
				//concatena id do usuario no nome da imagem + extensão
				$nome_imagem = $id." - usuario.";
				$nome_imagem_delete = $nome_imagem."*";
				$nome_imagem = $nome_imagem .  $ext[1];
				//query pra gravar a imagem
				$sqlQuery = "update usuario set foto='$nome_imagem' where id=$id";
				//grava a imagem no banco
				mysql_query($sqlQuery);
				//especificação do caminho da imagem
				$caminho_imagem = "imagens/usuario/" . $nome_imagem;
				$caminho_imagem_delete = "imagens/usuario/" . $nome_imagem_delete;
				//valida se já existe imagem
				if (file_exists($nome_imagem_delete)) {
					//deleta a imagem
					unlink(glob($nome_imagem_delete));
				}
				//move nova imagem para o caminho
				move_uploaded_file($foto["tmp_name"], $caminho_imagem);
			}
			if(isset($_SESSION['idUsuario']) && $_SESSION['idUsuario'] == $id || !(isset($_POST['id']))){
				$_SESSION['fotoUsuario'] = $nome_imagem;
			}
			//else quando n foi enviado imagem
			}else{
			//grava no banco o insert ou update lá de cima
			mysql_query($sqlQuery);
			$id = ($id != "" ? $id : mysql_insert_id());
		}
		if(isset($_SESSION['idUsuario']) && $_SESSION['idUsuario'] == $id || !(isset($_POST['id']))){
			$_SESSION['idUsuario'] = $id;
			$_SESSION['nomeUsuario'] = $nome;
			$_SESSION['loginUsuario'] = $login;
			$_SESSION['senhaUsuario'] = $senha;
			$_SESSION['tipoUsuario'] = $tipo;
		}
		//tchau :3
		header("location:home.php");
		
		//fim
	?>	