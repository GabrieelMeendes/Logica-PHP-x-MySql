	<?php

	
	if(isset($_GET['erro'])){
		if($_GET['erro']=="permissao"){
			echo "VC N PODE NÉ RAPAZ";
		}else{
			echo "ERROU!!!";
		}
	}
	
	?>

	
	<form action=valida_login.php method=post>

	Login<input name=login placeholder="login"><br><br>

	senha<input name=senha type=password placeholder="senha"><br><br>
	<input type=submit value=submit>

	<a href=usuario_form.php>REGISTRAR</a>

	</form>


