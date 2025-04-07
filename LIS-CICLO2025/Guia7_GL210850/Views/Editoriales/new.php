<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Editorial</title>
    <?php include  'Views/cabecera.php'; ?>
</head>
<body>
<?php include 'Views/menu.php'; ?>
    <div class="container mt-4">
        <div class="row">
            <h3>Nuevo Editorial</h3>
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
                <form role="form" action="<?= isset($editorial) ? PATH . '/Editoriales/update' : PATH . '/Editoriales/insert' ?>" method="POST">
                    <div class="mb-3">
                        <label for="codigo" class="form-label">Código del Editorial:</label>
                        <input type="text" class="form-control" name="codigo_editorial" id="codigo_editorial" value="<?= isset($editorial['codigo_editorial']) 
                        ? $editorial['codigo_editorial'] : '' ?>" placeholder="Ingresa el código del editorial" <?= isset($editorial)  ?>>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Editorial:</label>
                        <input type="text" class="form-control" name="nombre_editorial" id="nombre_editorial" value="<?= isset($editorial['nombre_editorial'])
                         ? $editorial['nombre_editorial'] : '' ?>" placeholder="Ingresa el nombre del editorial">
                    </div>
                    <div class="mb-3">
                        <label for="contacto" class="form-label">Contacto:</label>
                        <input type="text" class="form-control" id="contacto" name="contacto" value="<?= isset($editorial['contacto']) 
                        ? $editorial['contacto'] : '' ?>" placeholder="Ingresa el nombre del contacto">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono:</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" value="<?= isset($editorial['telefono']) 
                        ? $editorial['telefono'] : '' ?>" placeholder="Ingresa el teléfono del contacto">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-danger" href="<?= PATH ?>/Editoriales">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

</body>
</html>