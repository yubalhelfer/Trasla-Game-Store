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
    height: 60%;
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
<div class="row">
    <?php
      foreach ($videojuegos as $videojuego) {
        echo '<div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 mx-auto mb-3">';
        echo '<div class="card">';
        echo '<img class="card-img-top" src="img/'.$videojuego['Caratula'].'" alt="imagen">';
        echo '<div class="card-body">';
        echo '<h4 class="card-title">'.$videojuego['Nombre'].'</h4>';
        echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>';
        echo '<a href="Detalle.php?Id='.$videojuego['Id'].'" class="btn btn-primary">Ver más</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
     ?>
</div>

<?php include_once "pie.php" ?>
