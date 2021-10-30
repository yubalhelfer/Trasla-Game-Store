<?php
include_once "Estilo.php";

$mysqli = include_once "ConexionDB.php";
$resultado = $mysqli->query("SELECT v.Id, v.Nombre,v.Caratula, d.Nombre desarrollador, g.Nombre genero, e.Nombre editor, v.Anio, v.metacritic FROM videojuego v
INNER JOIN desarrollador d ON d.id=v.IdDesarrollador
INNER JOIN genero g ON g.id=v.IdGenero
INNER JOIN editor e ON e.Id=v.IdEditor");
$videojuegos = $resultado->fetch_all(MYSQLI_ASSOC);
?>
<div class="row">
  <div class="col-12">
    <h1>Listado de Juegos</h1>
  </div>
  <div class="col-12">
    <a class="btn btn-success my-2" href="InsertarVideojuego.php">Agregar nuevo</a>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th class="d-none d-lg-table-cell">Año</th>
          <th class="d-none d-lg-table-cell">Desarrollador</th>
          <th class="d-none d-lg-table-cell">Genero</th>
          <th class="d-none d-lg-table-cell">Editor</th>
          <th class="d-none d-lg-table-cell">Metacritic</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
        <tbody>
          <?php
          foreach ($videojuegos as $juego) { ?>
            <tr>
              <td><?php echo $juego["Id"] ?></td>
              <td><?php echo $juego["Nombre"] ?></td>
              <td class="d-none d-lg-table-cell"><?php echo $juego["Anio"] ?></td>
              <td class="d-none d-lg-table-cell"><?php echo $juego["desarrollador"] ?></td>
              <td class="d-none d-lg-table-cell"><?php echo $juego["genero"] ?></td>
              <td class="d-none d-lg-table-cell"><?php echo $juego["editor"] ?></td>
              <td class="d-none d-lg-table-cell"><?php echo $juego["metacritic"] ?></td>
              <td>
                  <a href="editar.php?id=<?php echo $juego["Id"] ?>">Editar</a>
              </td>
              <td>
                  <a href="eliminar.php?id=<?php echo $juego["Id"] ?>">Eliminar</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
  </div>
</div>

<?php include_once "pie.php" ?>
