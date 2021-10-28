<?php
  include_once "Estilo.php";
  $mysqli = include_once "ConexionDB.php";
  $alerta = false;
  if (isset($_GET['usuario']) and isset($_GET['clave'])) {
    $usuario = $_GET['usuario'];
    $clave = $_GET['clave'];
    $encriptada = md5($clave);
    $sentencia = $mysqli->prepare("SELECT * FROM usuarios WHERE Usuario = ? and Clave = ?");
    $sentencia->bind_param("ss", $usuario, $encriptada);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $usuario = $resultado->fetch_assoc();
    if ($usuario) {
      $_SESSION['Id'] = $usuario['Id'];
      $_SESSION['Usuario'] = $usuario['Usuario'];
      header("Location: PagPrincipal.php");
    } else {
      $alerta = true;
    }
  } else {
    $usuario = '';
    $clave = '';
  }
?>

<div class="row">
    <div class="col-12">
        <h1>Verificación Usuario</h1>
        <form action="Sesion.php" method="GET">
            <div class="form-group">
              <label for="usuario">Usuario</label>
              <input value="<?php echo $usuario; ?>" placeholder="Usuario" class="form-control" type="text" name="usuario" id="usuario" required>
            </div>
            <div class="form-group">
              <label for="clave">Clave</label>
              <input value="<?php echo $clave; ?>" placeholder="Clave" class="form-control" type="password" name="clave" id="clave" required>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success">
              <a class="btn btn-warning my-3" href="RegistrarUsuario.php">Registrar</a>
            </div>
        </form>
        <?php
          if ($alerta==true) {
            echo '<div class="alert alert-danger p-2">Usuario o contraseña inválidos.</div>';
          }
        ?>
    </div>
</div>
<?php include_once "pie.php"; ?>
