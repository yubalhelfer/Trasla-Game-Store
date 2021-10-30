<?php
include_once "Estilo.php";
$mysqli = include_once "ConexionDB.php";

if (isset($_GET['Id'])) {
    $id = $_GET['Id'];
    $sentencia = $mysqli->prepare("SELECT v.Id, v.Nombre,v.Caratula, d.Nombre desarrollador, g.Nombre genero, e.Nombre editor, v.Anio, v.metacritic, v.Descripcion, v.Precio FROM videojuego v
    INNER JOIN desarrollador d ON d.Id=v.IdDesarrollador
    INNER JOIN genero g ON g.Id=v.IdGenero
    INNER JOIN editor e ON e.Id=v.IdEditor
    WHERE v.Id = ?");
    $sentencia->bind_param("i", $id);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $videojuego = $resultado->fetch_assoc();

    $sentencia = $mysqli->prepare("SELECT Id, Nombre, Caratula, Anio, metacritic, Descripcion, Precio FROM videojuego
    WHERE IdGenero = ?");
    $sentencia->bind_param("i", $videojuego['IdGenero']);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $similares = $resultado->fetch_all(MYSQLI_ASSOC);
?>

    <div class="row">
      <div class="col-lg-6 col-xs-12 mb-4">
        <img class="img-fluid mb-4" style="width:100%;" src="img/<?php echo $videojuego['Caratula'];?>" alt="Videojuego">
        <h3 style="color:#FBFCFC";>Juegos similares</h3>
        <div class="row">
          <?php
          foreach ($similares as $similar) {
            echo '<div class="col-6 col-xxl-4">';
            echo '<div class="card">';
            echo '<img class="card-img-top" src="img/'.$similar['Caratula'].'" alt="Card image">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">'.$similar['Nombre'].'</h5>';
            echo '<a href="Detalle.php?Id='.$similar['Id'].'" class="btn btn-primary" style="width:100%;">Consultar</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
          ?>
        </div>
      </div>
      <div class="col-lg-6 col-xs-12" style="color:#EAEDED">

        <h3><u><?php echo $videojuego['Nombre'];?></u></h3>
        <h5>Genero: <?php echo $videojuego['genero'];?></h5>
        <h5>Fecha de lanzamiento: <?php echo $videojuego['Anio']?></h5>
        <h5>Desarrollador: <?php echo $videojuego['desarrollador'];?></h5>
        <h5>Editor: <?php echo $videojuego['editor'];?></h5>
        <p><?php echo $videojuego['Descripcion'];?></p>
        <h5>Precio: $ <?php echo $videojuego['Precio'];?> </h5>

        <h5> Puntuacion: <?php echo $videojuego ['metacritic'];?></h5>
        <p></p>
        <form class="" action="Compra.php" method="get">
          <div class="row">
            <div class="col-2">
              <input type="text" class="form-control" placeholder="cantidad" name="cantidad" value="1">
              <input type="hidden" name="Id" value="<?php echo $videojuego['Id'];?>">
            </div>
            <div class="col-10">
              <button type="submit" class="btn btn-success mb-3">Agregar al carrito</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <?php include_once "pie.php"; ?>
<?php } ?>
