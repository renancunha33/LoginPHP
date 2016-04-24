<?php
include "conecta_mysql.inc";
$user     =$_POST["nome"    ];
$pass     =$_POST["senha"   ];
$realname =$_POST["nomereal"];
$phone    =$_POST["telefone"];
$res      = mysql_query("select * from LOGIN WHERE cd_login='$user'");
$linha= mysql_num_rows($res);
if($user!="" && $pass)
{
	if($linha == 0)
	{
		mysql_query("INSERT INTO LOGIN(cd_login,ds_senha) VALUES('$user','$pass')");
		mysql_query("INSERT INTO DAODS(cd_login,ds_nome,ds_telefone) VALUES('$user','$realname','$phone')");

		echo"<html>
		<head>
		<link href='./bootstrap/bootstrap.min.css' rel='stylesheet'>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href='./bootstrap/ie10-viewport-bug-workaround.css' rel='stylesheet'>
		<!-- Custom styles for this template -->
		<link href='./bootstrap/signin.css' rel='stylesheet'>
		<script src='./bootstrap/ie-emulation-modes-warning.js'></script>
		<title>Cadastro</title>
		</head>

		<body>
		<center>
		CADASTRADO COM SUCESSO<br>
		<div class='container'>
		<form  class='form-signin'method='post' action='login.php?valor=1'>
		<button class='btn btn-lg btn-primary btn-block'type='submit' value='LOGIN'>
		Login
		</button>
		</form></div></center>
		</body></html>";
	}else
	{
		echo"<html>
		<head>
		<link href='./bootstrap/bootstrap.min.css' rel='stylesheet'>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href='./bootstrap/ie10-viewport-bug-workaround.css' rel='stylesheet'>
		<!-- Custom styles for this template -->
		<link href='./bootstrap/signin.css' rel='stylesheet'>
		<script src='./bootstrap/ie-emulation-modes-warning.js'></script>
		<title>Cadastro</title>
		</head>
		<body>
		<center>
		<div class='container'>
		Cadastro negado(dados incorretos ou usuario ja existe!)<br>
		<form class='form-signin' method='post' action='cadastrar.html'>
		<button class='btn btn-lg btn-primary btn-block'type='submit' value='LOGIN'>
		Cadastrar
		</button>
		</form>
		<form class='form-signin' method='post' action='login.php?valor=1'>
		<button class='btn btn-lg btn-primary btn-block'type='submit' value='LOGIN'>
		Login
		</button>
		</form></div></center>
		</body></html>";	
	}
}else
{
	echo"<html>
	<head>
	<link href='./bootstrap/bootstrap.min.css' rel='stylesheet'>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<link href='./bootstrap/ie10-viewport-bug-workaround.css' rel='stylesheet'>
	<!-- Custom styles for this template -->
	<link href='./bootstrap/signin.css' rel='stylesheet'>
	<script src='./bootstrap/ie-emulation-modes-warning.js'></script>
	<title>Cadastro</title>
	</head>
	<body>
	<div class='container'>
	<center>
	volte e preencha todos os campos corretamente<br>
	<form class='form-signin' method='post' action='cadastrar.html'>
	<button class='btn btn-lg btn-primary btn-block'type='submit' value='LOGIN'>
	Cadastrar
	</button>
	</form>
	<form class='form-signin' method='post' action='login.php?valor=1'>
	<button class='btn btn-lg btn-primary btn-block'type='submit' value='LOGIN'>
	Login
	</button>
	</form>
	</div></center>
	</body></html>";
}
?>
