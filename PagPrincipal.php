<?php
include_once "Estilo.php";
$mysqli = include_once "ConexionDB.php";
$resultado = $mysqli->query("SELECT v.Id, v.Nombre,v.Caratula, d.Nombre desarrollador, g.Nombre genero, e.Nombre editor, v.Anio, v.metacritic FROM videojuego v
INNER JOIN desarrollador d ON d.id=v.IdDesarrollador
INNER JOIN genero g ON g.id=v.IdGenero
INNER JOIN editor e ON e.Id=v.IdEditor");
$videojuegos = $resultado->fetch_all(MYSQLI_ASSOC);
?>


<head>
  <h1>
    <title>Bootstrap carrusel</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    /* Imagen responsive*/
    .carousel-inner img {
    width: 100%;
    height: 40%;
  }
  </style>
</head>
<body>

  <div class="container mt-3">

    <h2></h2>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

  <!-- Indicadores -->
    <ul class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ul>

  <!-- Paso de diapositivas -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img\Consolas.jpg" alt="Bienvenido a Trasla Game Store" width="500" height="300" >
        <div class="carousel-caption">
        <h3> Bienvenido a Trasla Game Store </h3>
      </div>
      </div>
      <div class="carousel-item">
        <img src="img\Jugador.jpg" alt="Compra tus juegos favoritos en la comodidad de tu casa" width="500" height="300">
        <div class="carousel-caption">
        <h3> Compra tus juegos favoritos en la comodidad de tu casa </h3>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img\Ciudad.jpg" alt="Envios a todo traslasierra" width="500" height="300">
        <div class="carousel-caption">
        <h3> Envios a todo traslasierra </h3>
        </div>
      </div>
    </div>

  <!-- Botones de control izquierda y derecha -->
    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>

  </div>
</h1>
</body>


<?php include_once "pie.php" ?>
