<!DOCTYPE html>
<html lang="pt-br">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
 
<body> 
    
<div class="wrapper fadeInDown">
  <div id="formContent">
    <br>
  <img src="imgs\fenux.png" class="img-fluid" id="logo">
    <form action="verificacao.php" method="post">
      <input type="text" id="login" class="fadeIn second" name="email_verificar" placeholder="email" required>
      <input type="text" id="password" class="fadeIn third" name="senha_verificar" placeholder="senha" required>
      <br> <br>
      <input type="submit" class="fadeIn fourth" value="Logar">
    </form>
    <div id="formFooter">
      <a class="underlineHover" href="senha.php">Esqueceu sua senha?</a>
    </div>

  </div>
</div>
 
</body>
 
</html>