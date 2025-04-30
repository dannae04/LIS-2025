<!-- Modal Editar -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <title>Document</title>
<!-- Incluye Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <form class="col-4 p-3 m-auto" method="POST" action="editar.php">
        <h5 class="text-center alert alert-secondary">Editar materia </h5>
        <?php
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $materia = simplexml_load_file('materias.xml');
    foreach ($materia->materia as $materia) {
        if ($materia->codigo == $codigo) {
            $nombre = $materia->nombre;
            $uvs = $materia->uvs;
            $nota = $materia->nota;
            break;
        }

    }
   
} else {
    header('Location: index.php');
    exit;
}
?>
        <div class="mb-1">
            <label for="exampleInputEmail"class="form-label">Codigo</label>
            <input type="text" class="form-control" name="codigo" value="<?php echo $materia->codigo; ?>" required>
        </div>
        <div class="mb-1">
            <label for="exampleInputEmail"class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" required>
        </div>
        <div class="mb-1">
            <label for="exampleInputEmail"class="form-label">UVS</label>
            <input type="text" class="form-control" name="uvs" value="<?php echo $materia->uvs; ?>" required>
        </div>
        <div class="mb-1">
            <label for="exampleInputEmail"class="form-label">Nota</label>
            <input type="text" class="form-control" name="nota" value="<?php echo $materia->nota; ?>" required>
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"onclick="window.location.href='index.php'"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" name="editar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Actualizar Datos</a>
			
            </div>
          <!-- <button type submit class="btn btn-primary" name="btneditar" value="ok">Editar</button>-->
            </form>


    
</body>
</html>