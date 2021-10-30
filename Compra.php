<?php
include_once "Estilo.php";
$mysqli = include_once "ConexionDB.php";

if (isset($_GET['borrarcarro'])) {
  unset($_SESSION['resId']);
  unset($_SESSION['resNombre']);
  unset($_SESSION['resCaratula']);
  unset($_SESSION['resCantidad']);
  unset($_SESSION['resImporte']);
} else {
  if (!isset($_SESSION['resId'])) {
    $resId = array();
    $resNombre = array();
    $resCaratula = array();
    $resCantidad = array();
    $resImporte = array();
    $_SESSION['resId'] = $resId;
    $_SESSION['resNombre'] = $resNombre;
    $_SESSION['resCaratula'] = $resCaratula;
    $_SESSION['resCantidad'] = $resCantidad;
    $_SESSION['resImporte'] = $resImporte;
  }
  if (isset($_GET['Id'])) {
    $sentencia = $mysqli->prepare("SELECT Id, Nombre, Caratula, Precio
    FROM videojuego
    WHERE Id = ?");
    $sentencia->bind_param("i", $_GET['Id']);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $reserva = $resultado->fetch_assoc();
    array_push($_SESSION['resId'],$reserva['Id']);
    array_push($_SESSION['resNombre'],$reserva['Nombre']);
    array_push($_SESSION['resCaratula'],$reserva['Caratula']);
    array_push($_SESSION['resCantidad'],$_GET['cantidad']);
    array_push($_SESSION['resImporte'],$reserva['Precio']);
  }
?>



<table style="color:#FBFCFC" class="table table-striped";>
  <thead>
    <th class="table-cell">Carátula</th>
    <th class="table-cell">Id</th>
    <th class="table-cell">Videojuego</th>
    <th class="table-cell">Cantidad</th>
    <th class="table-cell">Importe</th>
  </thead>
  <tbody>

  <?php
    for ($i=0; $i < count($_SESSION['resId']); $i++) {
      echo '<tr>';
      echo '<td class="table-cell"><img class="rounded-circle" style="width:100px; height:100px; object-fit:cover;" src="img/'.$_SESSION['resCaratula'][$i].'"></td>';
      echo '<td class="table-cell">'.$_SESSION['resId'][$i].'</td>';
      echo '<td class="table-cell">'.$_SESSION['resNombre'][$i].'</td>';
      echo '<td class="table-cell">'.$_SESSION['resCantidad'][$i].'</td>';
      echo '<td class="table-cell">'.$_SESSION['resImporte'][$i].'</td>';
      echo '</tr>';
    }
  }
  ?>

  </tbody>
</table>

<div class="d-grid gap-2 d-md-block mb-3">
  <a href="Compra.php?borrarcarro=True" class="btn btn-success">Borrar Carro</a>
  <a href="EnviarVideojuego.php" class="btn btn-success">Reservar</a>
</div>



<?php include_once "pie.php";?>
