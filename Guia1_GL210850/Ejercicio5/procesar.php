<!DOCTYPE html> 
<html lang="es"> 
<head> 
    <meta charset="utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    <title>Información recibida</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
rel="stylesheet"> 
    <script 
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
</head> 
<body> 
<section class="container my-5"> 
<article> 
<h1 class="text-center fw-bold">Información de formulario</h1> 
<div id="info" class="table-responsive"> 
<table class="table table-striped table-bordered"> 
 
<thead class="table-primary"> 
    <tr> 
        <th scope="col">Campo</th> 
        <th scope="col">Valor</th> 
    </tr> 
</thead> 
<tbody> 
<?php 
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])): 
    echo "\t<tr>\n"; 
    echo "\t\t<td>Cliente</td>\n"; 
    // Accediendo a los datos del formulario usando la función extract() 
    extract($_POST); 
    $cliente = !empty($client) ? $client : "<a href='ingresodatos.html' class='text-danger'>No ingresó 
el cliente.</a>"; 
    echo "\t\t<td>" . $cliente . "</td>\n"; 
    echo "\t</tr>\n"; 
    echo "\t<tr>\n"; 
    echo "\t\t<td>Producto</td>\n"; 
    $producto = !empty($product) ? $product : "<a href='ingresodatos.html' class='text-danger'>No 
ingresó el producto.</a>"; 
    echo "\t\t<td>" . $producto . "</td>\n"; 
    echo "\t</tr>\n"; 
    echo "\t<tr>\n"; 
    echo "\t\t<td>Precio</td>\n"; 
    $precio = !empty($price) ? $price : "<a href='ingresodatos.html' class='text-danger'>No ingresó 
el precio</a>"; 
    echo "\t\t<td>" . $precio . "</td>\n";
    echo "\t</tr>\n"; 
    echo "\t<tr>\n"; 
    echo "\t\t<td>Cantidad</td>\n"; 
    $cantidad = !empty($quantity) ? $quantity : "<a href='ingresodatos.html' class='text-danger'>No 
ingresó la cantidad</a>"; 
    echo "\t\t<td>" . $cantidad . "</td>\n"; 
    echo "\t</tr>\n"; 
    echo "\t<tr>\n"; 
    echo "\t\t<td>Total a pagar</td>\n"; 
    if(isset($cliente) && isset($producto) && floatval($precio)>0 && floatval($cantidad)>0): 
        echo "\t<td>$ " . number_format($precio * $cantidad, 2, '.', ',') . "</td>\n"; 
    else: 
        echo "\t<td>Nada que cobrar</td>\n"; 
    endif; 
    echo "\t</tr>\n"; 
else: 
    echo "\t<tr>\n"; 
    echo "\t\t<td colspan='2' class='text-danger'>No se han ingresado datos desde el 
formulario.</td>\n"; 
    echo "\t</tr>\n"; 
endif; 
?> 
</tbody> 
</table> 
<div id="link" class="text-center mt-4"> 
    <a href="ingresodatos.html" class="btn btn-primary">Ingresar nuevos datos</a> 
</div> 
</div> 
</article> 
</section> 
</body> 
</html> 