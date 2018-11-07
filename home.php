<style type="text/css">

table {
	margin: 8px;
}

th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: .7em;
	background: #666;
	color: #FFF;
	padding: 2px 6px;
	border-collapse: separate;
	border: 1px solid #000;
}

td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: .7em;
	border: 1px solid #DDD;
}

*{margin: 0; padding: 0;}

body{
	font-family: arial, helvetica, sans-serif;
	font-size: 12px;
}

.menu{
	list-style:none; 
	border:1px solid #c0c0c0; 
	float:left; 
}

.menu li{
	position:relative; 
	float:left; 
	border-right:1px solid #c0c0c0; 
}

.menu li a{color:#333; text-decoration:none; padding:20px 90px; display:block;}

.menu li a:hover{
	background:#333; 
	color:#fff; 
	-moz-box-shadow:0 3px 10px 0 #CCC; 
	-webkit-box-shadow:0 3px 10px 0 #ccc; 
	text-shadow:0px 0px 5px #fff; 
}

.menu li  ul{
	position:absolute; 
	top:25px; 
	left:0;
	background-color:#fff; 
	display:none;
}   

.menu li:hover ul, .menu li.over ul{display:block;}


.menu li ul li{
	border:2px solid #c0c0c0; 
	display:block; 
	width:150px;
}

.conteudo {
	width:204px;
	height:125px;
	border:4px solid #999;
	background:transparent url(/imagem.jpg);
	}

.moldura-dois {
	width: 204px; 
	border:8px inset #5f6632;
	padding:15px;
	background: #b1b1c3;
	}

.moldura-um {
	width: 50px; /*404+8+8(bordas)+15+15(paddings)*/
	border:10px inset #5d738b;
	padding:25px;
	background: transparent url(/bg-um.gif);
	}

#imgpos {
	position: absolute;
	left: 65%;
	top: 0%
	} 
	#menu {
	position: absolute;
	left: 82%;
	top: 1%
	} 
</style>

<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Controle de Produtos e Usuarios</title>
<!-- Aqui chamamos o nosso arquivo css externo -->
<link rel="stylesheet" type="text/css"  href="estilo.css" />
<!--[if lte IE 8]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->   
</head>
<body>
<nav>
<ul class="menu">
<li><a href="home.php">Home</a></li>
<li><a href="produto_list.php">Listar Produtos</a></li>
<li><a href="usuario_list.php">Listar Usuarios</a></li>
<li><a href="usuario_form.php">Editar Usuario</a></li>
<li><a href="deslogar.php">Deslogar</a></li>


</ul>
</nav>


</body>

</html>




<?php
echo "<br>";	
echo "<br>";	
echo "<br>";	
echo "<br>";	
echo "<br>";
echo "<br>";
session_start();
if(isset($_SESSION['idUsuario'])){
	$_SESSION['idUsuario']." - ";
	 $_SESSION['nomeUsuario']." - ";
	 $_SESSION['loginUsuario']." - ";
	 $_SESSION['tipoUsuario'];
}else{
	//header("location:index.php?erro=permissao");
}
echo "<div class='moldura-dois' id='menu'>";
echo "<div class='conteudo'>";
echo "<br><img width=200 height=100 src='imagens/usuario/".($_SESSION['fotoUsuario'] != "" ? $_SESSION['fotoUsuario'] : "usuario.jpg")."' ><br>";
echo "</div>";
echo "</div>";

echo "<ul class='menu' id='imgpos'>";
echo "<li><a href='usuario_form.php?id=".$_SESSION['idUsuario']."'>Atualizar Perfil</a></li>";
echo "</div>";

if(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] == "admin"){
	
	
}

?>


