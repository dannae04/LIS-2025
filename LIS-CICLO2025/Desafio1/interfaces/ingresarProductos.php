<?php
include'funcionBase.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  

    //Validacion para ingresar una imagen
    if(isset($_FILES['imagen']) && $_FILES['imagen']['error']==0){ 
        $formatoImagen=['jpg','png'];
        $nombre_imagen=$_FILES['imagen']['name'];
        $conversion_imagen=strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION)); //strtolower convierte a minusculas, pathinfo devuelve la informacion de la extension en este caso jpg o png
        if(in_array($conversion_imagen,$formatoImagen)){ 
            $ruta='../img/'. uniqid(). '.' . $conversion_imagen; //uniqid genera un id unico
            move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);//mueve la imagen a la carpeta img
        }else{
        echo "Imagen no valida solo se aceptan formatos de tipo jpg y png";
        exit();
    }
}else {
    $ruta = ''; 
}
//Creaccion de los nuevos productos que se van a ingresar
// la funcion $POST me permite obtener los datos que se ingresan en el formulario
$nuevosProductos = [
    'codigo' => codigoUnico(), //llamo la funcion codigoUnico que genere en el XML
    'nombre' => $_POST['nombre'],
    'descripcion' => $_POST['descripcion'],
    'imagen' => $ruta, //llamo variable ruta que me permite guardar la imagen
    'categoria' => $_POST['categoria'],
    'precio' => $_POST['precio'],
    'existencia' => $_POST['existencia'],
    'fecha'=>date('Y-m-d H:i:s') 
];
 //OK, de mis productos existentes, agrego el nuevo producto
 $productos=obtenerProductos();
    $productos[]=$nuevosProductos;
    guardarProductos($productos); //guardo los productos en el XML
    echo "Producto ingresado correctamente";
    echo"<br><a href='ingresarProductos.php'>Regresar a los productos</a>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingresar Productos</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Ingresar Productos</h1>
    <div class="contenedor">
    <form action="ingresarProductos.php" method="post" enctype="multipart/form-data">
        <div class="form-group" style="margin-right: 300px;">
        <label for="nombre">Nombre :</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
        <br>
        <div class="form-group" style="margin-right: 300px;">
        <label for="descripcion">Descripción:</label>
        <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
        <br>
        </div>
        <div class="form-group" style="margin-right: 300px;">
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" class="form-control" required>
        <br>
        </div>
        <div class="form-group" style="margin-right: 300px;">
        <label for="categoria">Categoría:</label>
        <select name="categoria" id="categoria" class="form-control">
            <option value="textil">Textil</option>
            <option value="promocional">Promocional</option>
        </select>
        <br>
        </div>
        <div class="form-group" style="margin-right: 300px;">
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" step="0.01" class="form-control" required>
        <br>
        </div>
        <div class="form-group" style="margin-right: 300px;">
        <label for="existencia">Existencia:</label>
        <input type="number" name="existencia" id="existencia" class="form-control" min="0" required>
        <br>
        </div>
        <button class="boton" type="submit" >Ingresar Productos </button><br><br>
    </form>
    </div>
    <br>


<!--Fin del formulario--> 

</body>
</html>


