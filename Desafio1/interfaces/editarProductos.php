<?php
include 'funcionBase.php';

if(isset($_GET['codigo'])){  //si se envio el codigo del producto
    //Buscar el producto por codigo
    $codigo=$_GET['codigo']; 
    $productos=obtenerProductos();
    $pEncontrar= null;
 //Buscar el producto por codigo
 foreach($productos as $producto){
    if ($producto['codigo']==$codigo){ //si el codigo del producto es igual al codigo que se esta buscando
        $pEncontrar = $producto; //guardo el producto encontrado
        break; //terminar el ciclo, la busqueda
    }

}
if ($pEncontrar=== null){ 
    echo "El producto no fue encontrado";
    exit();
}
} else {
    echo"No ha especificado el codigo del producto para actualizar los cambios";
    exit();
}
//Ok ahora veo como actualizar los datos del producto
//Empiezo actualizando las imagenes
//Habia asigando un if para ingresar una imagen
if($_SERVER['REQUEST_METHOD']=='POST'){ // si se envio el formulario
    //Validación de campos requeridos
    if(empty($_POST['nombre']) || empty($_POST['descripcion'])){
        echo "El nombre y la descripción son campos requeridos.";
        exit();
    }
    //Validacion para ingresar una imagen
if(isset($_FILES['imagen']) && $_FILES['imagen']['error']==0){
    $formatoImagen=['jpg','png'];
    $nombre_imagen=$_FILES['imagen']['name'];
    $conversion_imagen=strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION)); //strtolower convierte a minusculas, pathinfo devuelve la informacion de la extension en este caso jpg o png
    if(in_array($conversion_imagen,$formatoImagen)){
        $ruta='../img/'. uniqid() . '.' . $conversion_imagen; //uniqid genera un id unico
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);//mueve la imagen a la carpeta img
        //Borrar la imagen anterior
        if($pEncontrar['imagen'] && file_exists ($pEncontrar['imagen'])){
            unlink($pEncontrar['imagen']); //unlink me permite borrar un archivo
        }
    } else {
        echo"Imagen no valida solo se aceptan en formato de jpg y png";
        exit();
    }
} else {
    $ruta = $pEncontrar['imagen']; //si no se envia una imagen se mantiene la imagen anterior

}
//Actualizar los datos del producto
//foreach para recorrer los productos
foreach($productos as &$producto){ 
    if($producto['codigo']==$codigo){ //si el codigo del producto es igual al codigo que se esta buscando
        $producto['nombre']=$_POST['nombre'];  //actualizame la tabla
        $producto['descripcion']=$_POST['descripcion'];
        $producto['imagen']=$ruta;
        $producto['categoria']=$_POST['categoria'];
        $producto['precio']=$_POST['precio'];
        $producto['existencia']=$_POST['existencia'];
        break;
    }

}
guardarProductos($productos); //guardo los productos en el XML
exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Productos</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head> 
<body>
    <h1>Editar Productos</h1>
    <div class="contenedor">
    <form action="editarProductos.php?codigo=<?php echo $pEncontrar['codigo'];?>" method="POST" enctype="multipart/form-data">
        <br>
        <div class="form-group" style="margin-right: 700px;">
        <label >Codigo:</label>
        <input class="form-control" type="text" name="codigo" value="<?php echo $pEncontrar['codigo']; ?>"  readonly>
        </div>
        
        <div class="form-group" style="margin-right: 400px;">
        <label >Nombre:</label>
        <input class="form-control" type="text" name="nombre" value="<?php echo $pEncontrar['nombre']; ?> " required>
        </div>
        
        <div class="form-group" style="margin-right: 350px;" >
        <label >Descripción:</label><br>
        <textarea name="descripcion" class="form-control"><?php echo $pEncontrar['descripcion']; ?></textarea>
        </div>

        <div class="form-group" style="margin-right: 350px;">
        <label>Imagen del producto:</label><br>
        <?php if ($pEncontrar['imagen']) { ?>
            <center><img src="<?php echo $pEncontrar['imagen']; ?>" alt="Imagen de textil" width="200" ></center>
        <?php } ?>
        <input type="file" name="imagen" class="form-control" accept=".jpg ,.png" >
        </div>
        

        <div  class="form-group" style="margin-right: 700px;">
        <label >Categoría:</label><br>
        <select name="categoria" class="form-control">
            <option value="Textil" <?php if($pEncontrar['categoria']=='Textil')echo 'selected'; ?>>Textil</option>
            <option value="Promocional" <?php if($pEncontrar['categoria']=='Promocional')echo 'selected';?>>Promocional</option>
        </select>
        </div>

        <div class="form-group" style="margin-right: 500px;">
        <label >Precio:</label><br>
        <input type="number" step="0.01" name="precio" value="<?php echo $pEncontrar['precio']; ?>" class="form-control" required>
        </div>

        <div  class="form-group "style="margin-right: 500px;">
        <label >Existencia:</label>
        <input type="number" name="existencia"min="0" class="form-control" value="<?php echo $pEncontrar['existencia']; ?>" required>
        </div>
         <br><br>
         <div style="margin-left: 380px;">
         <input style="border-radius: 10px; background-color:#b896e2; border: none; height: 50px; width: 170px;" type="submit" value="Modificar Producto">
         </div>
        <br><br>
     </form>
    </div>
    <!--<a href="textilProductos.php">Ver Lista de Productos</a>-->
</body> 
</html>