<?php include_once "Estilo.php"; ?>
<div class="row">
    <div class="col-12">
        <h1>Insertar Video Juego</h1>
        <form action="InsertarVD.php" method="GET" >

            <div class="form-group">
                <label for="Nombre">Nombre</label>
                <input placeholder="Nombre" class="form-control" type="text" name="Nombre" id="Nombre" required>
            </div>
            <div class="form-group">
                <label for="desarrollador">Desarrollador</label>
                <input placeholder="Desarrollador" class="form-control" type="text" name="IdDesarrollador" id="IdDesarrollador" required>
            </div>
            <div class="form-group">
                <label for="genero">Genero</label>
                <input placeholder="Genero" class="form-control" type="text" name="IdGenero" id="IdGenero" required>
            </div>
            <div class="form-group">
                <label for="editor">Editor</label>
                <input placeholder="Editor" class="form-control" type="text" name="IdEditor" id="IdEditor" required>
            </div>
            <div class="form-group">
                <label for="Anio">Anio</label>
                <input placeholder="Año de estreno" class="form-control" type="text" name="Anio" id="Anio" required>
            </div>
            <div class="form-group">
                <label for="metacritic">metacritic</label>
                <input placeholder="metacritic" class="form-control" type="text" name="metacritic" id="metacritic" required>
            </div>
            <div class="form-group">
                <label for="caratula">Carátula</label>
                <input placeholder="Archivo imagen" class="form-control" type="text" name="Caratula" id="Caratula" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input placeholder="Descripcion" class="form-control" type="text" name="Descripcion" id="Descripcion" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input placeholder="Precio" class="form-control" type="text" name="Precio" id="Precio" required>
            </div>
            <div class="form-group my-4">
              <input type="submit" class="btn btn-success" value="Guardar">
            </div>
        </form>
    </div>
</div>
<?php include_once "pie.php"; ?>
