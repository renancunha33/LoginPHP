
<html >
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <!-- Bootstrap core CSS -->
  <link href="./bootstrap/bootstrap.min.css" rel="stylesheet">
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="./bootstrap/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="./bootstrap/signin.css" rel="stylesheet">
  <script src="./bootstrap/ie-emulation-modes-warning.js"></script>
</head>
<body>

  <div class="container" >

    <form class="form-signin" method= "POST" action="connectBanco.php">
      <h2 class="form-signin-heading">Login</h2>

      
      <input type="text" id="nome" name="nome"class="form-control" placeholder="Nome" required="" autofocus="">
      
      <input type="password" id="senha" name="senha"class="form-control" placeholder="Senha" required="">
      <button class="btn btn-lg btn-primary btn-block" id="CLogin"type="submit">Entrar</button>

    </form>
    <form class="form-signin" action="cadastrar.html">
     <button class="btn btn-lg btn-primary btn-block" id="CCadastro"type="submit">Cadastrar</button>
   </form>
   <form class="form-signin" action="banco.php">
    <button class="btn btn-lg btn-primary btn-block" id="CBanco" type="submit">Criar BANCO</button>
  </form>
</div> 
</div> 
<?php
$oi =  "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
echo $oi == "http://localhost/login/login.php?valor=1" ? "<script>javascript:document.getElementById('CBanco').disabled = true;</script>" : "<script>javascript:document.getElementById('CLogin').disabled = true;</script><script>javascript:document.getElementById('CCadastro').disabled = true;</script>";
?>

<script src="./bootstrap/ie10-viewport-bug-workaround.js">
</script>


</body>
</html>
