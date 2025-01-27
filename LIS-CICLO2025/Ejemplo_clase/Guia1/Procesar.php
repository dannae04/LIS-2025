<!Doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="bootstrap.min.css" rel="stylesheet">
    </head>
<body>
    <?php
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $correo=$_POST['correo'];
    $motivo=$_POST['motivo'];
    $mensaje=$_POST['message'];
    echo $nombre.''.$apellido.''.$correo;
    ?>
    <div class="container">
        <div class="row">
            <table class="table table-bordered">               
                        <tr>
                            <td>Nombre</td>
                            <td><?= $nombre ?></td>
                        </tr>
                        <tr>
                            <td>Apellido</td>
                            <td><?= $apellido ?></td>
                        </tr>
                        <tr>
                            <td>Correo</td>
                            <td><?= $correo ?></td>
                        </tr>
                        <tr>
                            <td>Motivo</td>
                            <td><?= $motivo ?></td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td><?= $mensaje ?></td>
                        </tr>
        </table>
    </body>
</hmtl>