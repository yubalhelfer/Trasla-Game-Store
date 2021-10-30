<?php
$mysqli = include_once "ConexionDB.php";
$nombre = $_GET['Nombre'];
$IdDesarrollador = $_GET["IdDesarrollador"];
$IdGenero = $_GET["IdGenero"];
$IdEditor = $_GET["IdEditor"];
$Anio = $_GET["Anio"];
$metacritic = $_GET["metacritic"];
$caratula = $_GET["Caratula"];
$Descripcion = $_GET["Descripcion"];
$Precio = $_GET["Precio"];
$sentencia = $mysqli->prepare("INSERT INTO videojuego
  (Nombre, IdDesarrollador, IdGenero, IdEditor, Anio, metacritic, Caratula, Descripcion, Precio)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sentencia->bind_param("siiiidssi", $nombre, $Anio, $IdDesarrollador, $IdGenero, $IdEditor, $metacritic, $caratula, $Descripcion, $Precio);
$sentencia->execute();
