<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Autores</title>
    <?php include 'Views/cabecera.php'; ?>
</head>
<body>
    <?php include 'Views/menu.php'; ?>
    <div class="container mt-4">
        <div class="row">
            <h3>Lista de Autores</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary" href="<?= PATH ?>/Autores/create">Nuevo Autor</a>
                <br><br>
                <table class="table table-striped table-bordered" id="tabla">
                    <thead class="table-dark">
                        <tr>
                            <th>Código del Autor</th>
                            <th>Nombre del Autor</th>
                            <th>Nacionalidad</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($autores as $autor): ?>
                        <tr>
                            <td><?=$autor['codigo_autor']?></td>
                            <td><?=$autor['nombre_autor']?></td>
                            <td><?=$autor['nacionalidad']?></td>
                            <td style="text-align: center;">
                                <a href="<?= PATH . '/Autores/delete/' . $autor['codigo_autor'] ?>" class="btn btn-danger">Eliminar</a>
                                <a href="<?= PATH . '/Autores/edit/' . $autor['codigo_autor'] ?>" class="btn btn-info">Editar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>    
                </table>
            </div>
        </div>
    </div>
</body>
</html>