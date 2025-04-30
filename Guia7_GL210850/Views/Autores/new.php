<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Autor</title>
    <?php include  'Views/cabecera.php'; ?>
</head>
<body>
<?php include 'Views/menu.php'; ?>
    <div class="container mt-4">
        <div class="row">
            <h3>Nuevo Autor</h3>
        </div>
        <div class="row">
            <div class="col-md-7">
             <?php
             if(isset($errores)){
                echo "<div class='alert alert-danger'>";
                echo "<ul>";
                foreach($errores as $error){
                    echo "<li>$error</li>";
                }
                echo "</ul>";
                echo "</div>";
             }

             ?>
                <form role="form" action="<?= isset($autor) ? PATH . '/Autores/update' : PATH . '/Autores/insert' ?>" method="POST">
                    <div class="mb-3">
                        <label for="codigo" class="form-label">Código del Autor:</label>
                        <input type="text" class="form-control" name="codigo_autor" id="codigo_autor" value="<?= isset($autor['codigo_autor']) 
                        ? $autor['codigo_autor'] : '' ?>" placeholder="Ingresa el código del autor" <?= isset($autor)  ?>>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Autor:</label>
                        <input type="text" class="form-control" name="nombre_autor" id="nombre_autor" value="<?= isset($autor['nombre_autor'])
                         ? $autor['nombre_autor'] : '' ?>" placeholder="Ingresa el nombre del autor">
                    </div>
                    <div class="mb-3">
                        <label for="nacionalidad" class="form-label">Nacionalidad:</label>
                        <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="<?= isset($autor['nacionalidad'])
                         ? $autor['nacionalidad'] : '' ?>" placeholder="Ingresa la nacionalidad del autor"> 
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-danger" href="<?= PATH ?>/Autores">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

</body>
</html>