<?php
  session_start();
  if (isset($_SESSION['Usuario'])) {
    $usuarioActual = $_SESSION['Usuario'];
  } else {
    $usuarioActual = 'Usuario';
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trasla Game Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
</head>
<body>

  <div style="background-image:url('img/Fondos_de_pagina.jpg')">
  <div class="container">
    <header class="text-primary p-5" style="background-color:teal;background-image:url('img/fondo.jpg');background-size:cover;background-repeat:no-repeat;">
      <h2><a href="PagPrincipal.php" class="text-white" style="text-decoration:none;">Trasla Game Store</a></h2>
    </header>
    <nav style="background:#2e8b57;" class="navbar navbar-expand-sm sticky-top navbar-dark mb-3">
      <div class="container-fluid">
        <a class="navbar-brand" href="CategoriasJuegos.php">Tienda</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Genero</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Nuevo y Ofertas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Compra.php">Carro</a>
            </li>
          </ul>
          <ul class="nav navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo 'Sesion.php';?>"><?php echo $usuarioActual; ?></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
