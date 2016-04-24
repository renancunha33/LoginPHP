<html >
<head>
	<!-- Bootstrap core CSS -->
	<link href="./bootstrap/bootstrap.min.css" rel="stylesheet">
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<link href="./bootstrap/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="./bootstrap/signin.css" rel="stylesheet">
	<script src="./bootstrap/ie-emulation-modes-warning.js"></script>
	<title>Tela Inicial</title>
</head>
<?php
error_reporting(0);
ini_set('display_errors', 0);
include "conecta_mysql.inc";
$user=$_POST["nome"];
$pass=$_POST["senha"];
$res = mysql_query("select * from LOGIN WHERE cd_login ='$user'");
$linha= mysql_num_rows($res);
if($linha != 0){
	if($pass != mysql_result($res,0, "ds_senha")){
		echo"Acesso Negado!<br/>
		<form  class='form-signin'method='post' action='login.php?valor=1'>
		<button class='btn btn-lg btn-primary btn-block'type='submit' value='LOGIN'>
		Login
		</button>
		</form>";
	}else{
		
		$sql= "select LOGIN.*, DAODS.* from LOGIN inner join DAODS on '$user' = DAODS.cd_login";
		$query = mysql_query($sql);
		$DAODS = mysql_fetch_assoc($query);

		echo 'Login: ' . $DAODS['cd_login']. '<br />';
		echo 'Nome: ' . $DAODS['ds_nome']. '<br />';
		echo 'Telefone:  '. $DAODS['ds_telefone'] .'<br />';
		
		
		echo "Bem vindo!<br/>
		<form  class='form-signin'method='post' action='login.php?valor=1'>
		<button class='btn btn-lg btn-primary btn-block'type='submit' value='LOGIN'>
		Login
		</button>
		</form>";
	}
	
}else{
	echo"USER INVALIDO
	<form  class='form-signin'method='post' action='login.php?valor=1'>
	<button class='btn btn-lg btn-primary btn-block'type='submit' value='LOGIN'>
	Login
	</button>
	</form>";
}
?>
<body>

</body>
</html>
