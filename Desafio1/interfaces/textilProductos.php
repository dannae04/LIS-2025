<?php
include 'funcionBase.php';
$productos = obtenerProductos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Textil Export</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<div class="container">
    <h1 class="text-center">Inventario de telas</h1>
    <button class="btn btn-primary"><a  style="text-decoration:none; color:black" href="ingresarProductos.php">Ingresar nuevo producto</a></button><br><br>
    <?php if(!empty($productos)){ ?>
        <div class="table-container">
   <table class="table table-bordered">
    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Imagen</th>
        <th>Categoría</th>
        <th>Precio</th>
        <th>Existencia</th>
        <th>Acciones</th>
       </tr>
       <!--Recorrer los productos-->
         <?php foreach($productos as $producto) {?>
            <tr>
                <td><?php echo $producto['codigo']; ?></td>
                <td><?php echo $producto['nombre']; ?></td>
                <td><?php echo $producto['descripcion']; ?></td>
                <td>
                <?php if($producto['imagen']){ ?>
                    <center><img src="<?php echo $producto['imagen']; ?>" alt="Imagen de textil" width="100"></center>
                    <?php } else{
                        echo 'No hay ninguna imagen';
                    }?>
                    </td>

                <td><?php echo $producto['categoria']; ?></td>
                <td><?php echo $producto['precio']; ?></td>
                <td><?php echo $producto['existencia']; ?></td>
                <td>
                    <!--LINKs para editar y eliminar-->
                    
                   <button class="btn" style="background-color: #33e45b" type="button"> <a style="text-decoration: none; color: black" href="editarProductos.php?codigo=<?php echo $producto['codigo']; ?>">Editar</a></button>
                    <button class="btn btn-danger" type="button" ><a style="text-decoration: none; color: black" href="eliminarProductos.php?codigo=<?php echo $producto['codigo']; ?>">Eliminar</a></button>
                    
                </td>
                </tr>
                <?php }  ?>
                </table>
                </div>
                <?php } else { ?>
                    <p>No hay productos registrados</p>
                    <?php } ?>
                    </div>
                    </body>
                    </html>
                    
