<?php
include 'funcionBase.php';

if (isset($_GET['codigo'])) { //si se envio el codigo del producto
    $codigo = $_GET['codigo'];
    $productos = obtenerProductos(); 
    $pEliminar = false; //variable para saber si se elimino el producto

    // Buscar y eliminar el producto por código
    foreach ($productos as $indice => $producto) {
        if ($producto['codigo'] == $codigo) {
            // Eliminar imagen si existe
            if ($producto['imagen'] && file_exists($producto['imagen'])) {
                unlink($producto['imagen']); //unlink me permite borrar un archivo
            }
            // Eliminar producto del array
            unset($productos[$indice]); //unset me permite eliminar un elemento de un array
            $pEliminar = true; 
            break;
        }
    }

    if ($pEliminar) {
        // Reindexar el array y guardar cambios
        $productos = array_values($productos); 
        guardarProductos($productos);
        echo "Producto eliminado correctamente.";
    } else {
        echo "Producto no encontrado.";
        exit();
    }
}
?>
