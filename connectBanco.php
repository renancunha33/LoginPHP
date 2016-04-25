<html >
<head>
	<!-- Bootstrap core CSS -->
	<link href="./bootstrap/bootstrap.min.css" rel="stylesheet">
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<link href="./bootstrap/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="./bootstrap/signin.css" rel="stylesheet">
	<script src="./bootstrap/ie-emulation-modes-warning.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<title>Tela Inicial</title>
</head>

<body>
	<div class="container">
		<?php
//error_reporting(0);
//ini_set('display_errors', 0);
		include "conecta_mysql.inc";
		$user=$_POST["nome"];
		$pass=$_POST["senha"];
		$res = mysql_query("select * from LOGIN WHERE cd_login ='$user'");
		$linha= mysql_num_rows($res);
		if($linha != 0){
			if($pass != mysql_result($res,0, "ds_senha")){
				echo"<center><h3>ACESSO NEGADO</h3></center>";
				
			}else{

				$sql= "select LOGIN.*, DAODS.* from LOGIN inner join DAODS on '$user' = DAODS.cd_login";
				$query = mysql_query($sql);
				$DAODS = mysql_fetch_assoc($query);

				echo "<center><h3>BEM VINDO, " . $DAODS['ds_nome'] ." !</h3></center>";

				echo '<ul class="list-group">';
				echo '<li class="list-group-item">Login: ' . $DAODS['cd_login']. '</li>';
				echo '<li class="list-group-item">Nome: ' . $DAODS['ds_nome']. '</li>';
				echo '<li class="list-group-item">Telefone:  '. $DAODS['ds_telefone'] .'</li>';
				echo '</ul>';

				echo"<form  class='form-signin'method='post' action='login.php?valor=1'>
				<button class='btn btn-lg btn-primary btn-block'type='submit' value='LOGIN'>
				Login com outro user
				</button>
				</form>";

			}

		}else{
			echo"<center><h3>USER INVALIDO</h3></center>
			<form  class='form-signin'method='post' action='login.php?valor=1'>
			<button class='btn btn-lg btn-primary btn-block'type='submit' value='LOGIN'>
			Login
			</button>
			</form>";
		}
		?>
		<?php
		include "conecta_mysql.inc";
		$res = mysql_query("select * from DAODS");

		echo "<div class='container-fluid'>
		<table class='table table-striped table-bordered'>
		<thead>
		<tr >

		<th>Nomes</th>
		<th>Telefones</th>

		</tr>
		</thead>"; 

		while($row = mysql_fetch_array($res)){  

			$nome = "'".$row['ds_nome']."'"; 

			echo '<tr onclick="teste('.$nome.')"><td>' . $row['ds_nome'] . '</td><td>' . $row['ds_telefone'] . '</td></tr>'; 
		}

		echo "</table></div>";


		?>
	</div>
	
</body>
<script type="text/javascript">
function teste(nome) {
	var nm = nome.toString();
	alert("Você clicou no usuário :"+ nm);
};
</script>
</html>
