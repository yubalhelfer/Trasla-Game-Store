<?php
session_start();
$mysqli = include_once "ConexionDB.php";

$sentencia = $mysqli->prepare("INSERT INTO compra
  (IdUsuario,Fecha) VALUES (?, ?)");
$sentencia->bind_param("is", $_SESSION['IdUsuario'], date("Y-m-d"));
$sentencia->execute();

$query = "SELECT Id FROM compra ORDER BY Id DESC LIMIT 1";
$result = $mysqli->query($query);
$idReserva = $result->fetch_row()[0];
echo $idReserva;

for ($i=0; $i < count($_SESSION['resId']); $i++) {
  $sentencia = $mysqli->prepare("INSERT INTO compravideojuegos
    (IdCompra,IdVideojuego,cantidad) VALUES (?, ?, ?)");
  $sentencia->bind_param("iii", $idReserva, $_SESSION['resId'][$i], $_SESSION['resCantidad'][$i]);
  $sentencia->execute();
}

header("Location: CategoriasJuegos.php");
