<?php
session_start(); 

$connect = mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($connect, "carrinho");
mysqli_set_charset($connect, "UTF8");

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php"); 
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'buy') === 0) { 
            $productId = substr($key, 3);
            
            $query = mysqli_query($connect, "SELECT * FROM produtos WHERE id = $productId");
            $result = mysqli_fetch_array($query);
            
            if ($result) {

                $_SESSION['cart'][$productId] = [
                    'name' => $result['nome_produto'],
                    'price' => $result['preco_produto'],
                    'image' => $result['imagem']
                ];
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/carrinho.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Página principal</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <div class="container-fluid">

    <a class="navbar-brand" href="#">
      <img src="imgs\fenux.png" class="img-fluid" id="navbar-brand">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#" id="nav-link"> <img src="imgs\casa.png" class="img-fluid" id="nav-link"> Home <span class="sr-only"></span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="carrinho.php" id="nav-link"> <img src="imgs\carrinho.png" class="img-fluid" id="nav-link"> Carrinho <span class="sr-only"></span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="logout.php" id="nav-link"> <img src="imgs\sair.png" class="img-fluid" id="nav-link"> Sair <span class="sr-only"></span></a>
        </li>
      </ul>
    </div>
  </div>
</nav>



<div class="container mt-4">
    <h1 class="title text-center mb-5" id="title">LISTA DE PRODUTOS</h1>
    <div class="row">
        <?php

$query = mysqli_query($connect, "SELECT * FROM produtos");
while ($result = mysqli_fetch_array($query)) {
    echo "
    <div class='col-md-4 d-flex justify-content-center'>
        <div class='card mb-4 box-shadow'>
            <img class=card-img-top' src='imgs/". $result['imagem'] ."'/>

            <div class='card-body text-center'>
                <h5 class='card-title'>" . $result['nome_produto'] . "</h5>
                <p class='card-text '>R$" . $result['preco_produto'] . "</p>

                <form method='POST'>
                    <button name='buy" . $result['id'] . "' type='submit' class='ml-5 btn btn-outline-secondary'>Colocar no Carrinho</button>
                </form>
            </div>
        </div>
    </div>";
}
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>