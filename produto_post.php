		<?php

		include ("conectar.php");

		$nome = $_POST['nome'];
		$preco = $_POST['preco'];
		$descricao = $_POST['descricao'];
		$marca = $_POST['marca'];
		$modelo = $_POST['modelo'];
		$id = (isset($_POST['id']) ? $_POST['id'] : "");
		$foto = $_FILES['foto'];


		if(isset($id) && $id != ""){
			$sqlQuery = "update produto set nome='$nome', preco=$preco, descricao='$descricao', marca='$marca', modelo='$modelo' foto='$foto' where id=$id";	
		}else{
			$sqlQuery = "insert into produto(nome,preco,descricao,marca,modelo,foto) values('$nome',$preco,'$descricao','$marca','$modelo','$foto')";
		}

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
				$nome_imagem = $id." - produto.";
				$nome_imagem_delete = $nome_imagem."*";
				$nome_imagem = $nome_imagem .  $ext[1];
				//query pra gravar a imagem
				$sqlQuery = "update produto set foto='$nome_imagem' where id=$id";
				//grava a imagem no banco
				mysql_query($sqlQuery);
				//especificação do caminho da imagem
				$caminho_imagem = "produto/" . $nome_imagem;
				$caminho_imagem_delete = "imagens/produto/" . $nome_imagem_delete;
				//valida se já existe imagem
				if (file_exists($nome_imagem_delete)) {
					//deleta a imagem
					unlink(glob($nome_imagem_delete));
				}
				//move nova imagem para o caminho
				move_uploaded_file($foto["tmp_name"], $caminho_imagem);
			}
			//else quando n foi enviado imagem
		}

		$mysqlQuery = mysql_query($sqlQuery); //EXECUTA A QUERY
		header("location:produto_list.php");


		?>