<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar</title>
</head>
<body>
<?php
session_start();
$emailCorreto = "CPS";
$senhaCorreta = md5("fbaMuniz"); 

$email_verificar = isset($_POST['email_verificar']) ? $_POST['email_verificar'] : '';
$senha_verificar = isset($_POST['senha_verificar']) ? $_POST['senha_verificar'] : '';

if ($email_verificar === $emailCorreto && md5($senha_verificar) === $senhaCorreta) {
    $_SESSION['loggedin'] = true; 
    $_SESSION['emailCorreto'] = $emailCorreto; 
    header("Location: principal.php"); 
    exit();
} else {
    echo "Login inválido. <a href='index.php'>Tente novamente</a>."; 
}
?>
</body>
</html>