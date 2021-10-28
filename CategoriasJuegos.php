<?php
  include_once "Estilo.php";
  $mysqli = include_once "ConexionDB.php";

  $resultado = $mysqli->query('SELECT * FROM genero');
  $categorias = $resultado->fetch_all(MYSQLI_ASSOC);

  foreach ($categorias as $cat) {
    $resultado = $mysqli->query('SELECT * FROM videojuego WHERE IdGenero='.$cat['Id']);
    $videojuegos = $resultado->fetch_all(MYSQLI_ASSOC);

    if ($videojuegos) {
      echo '<div class="row"><div class="col-12">';
      echo '<h3 class="border-bottom border-3 pt-3" style="color:teal;">Genero: '.$cat['Nombre'].'</h3>';
      echo '</div></div>';
    }

  echo '<div class="row">';
    foreach ($videojuegos as $juego) {
      echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">';
      echo '<div class="card my-3" style="border-color:teal;background-color:#2D3F3F;">';
      echo '<img class="card-img-top" src="img/'.$juego['Caratula'].'" alt="Card image">';
      echo '<div class="card-body">';
      echo '<h4 class="card-title">'.$juego['Nombre'].'</h4>';
      echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>';
      echo '<a href="Detalle.php?Id='.$juego['Id'].'" class="btn btn-primary">Ver más</a>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
    echo '</div>';
  }
  include_once "pie.php";
?>
