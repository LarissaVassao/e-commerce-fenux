<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/carrinho.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Carrinho de Compras</title>
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
          <a class="nav-link" href="principal.php" id="nav-link"> <img src="imgs\casa.png" class="img-fluid" id="nav-link"> Home <span class="sr-only"></span></a>
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
    <h1 class="text-center mb-5" id="title">CARRINHO DE COMPRAS</h1>
    <div class="row">
        <?php
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $productId => $product) {
                echo "
                <div class='col-md-4'>
                    <div class='card mb-4 box-shadow'>
                        <img class='card-img-top' src='imgs/".$product['image']."' />
                        <div class='card-body'>
                            <h5 class='card-title'>" . $product['name'] . "</h5>
                            <p class='card-text'>R$ " . number_format($product['price'], 2, ',', '.') . "</p>
                        </div>
                    </div>
                </div>";
            }
        } else {
            echo "<p class='text-center'>Seu carrinho está vazio</p>";
        }
        ?>
    </div>
</div>

</body>
</html>