<!DOCTYPE html> 
<html lang="es"> 
<head> 
<meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Ejemplo de Variables en PHP</title> 
    <!-- Incluir Bootstrap desde su CDN --> 
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
rel="stylesheet"> 
</head> 
<body> 
    <div class="container mt-5"> 
        <div class="row"> 
            <div class="col-12"> 
                <h1 class="text-center">Ejemplo de Variables en PHP</h1> 
                <p class="lead text-center">A continuación se muestran los valores de las variables 
definidas en PHP:</p> 
                <div class="card"> 
                    <div class="card-body"> 
                        <h5 class="card-title">Valor de la variable $a (entero):</h5> 
                        <p class="card-text"> 
                            <?php 
                            $a = 10; // Variable con valor entero 
                            echo $a; // Imprimir el valor de $a 
                            ?> 
                        </p> 
                        <h5 class="card-title">Valor de la variable $b (texto):</h5> 
                        <p class="card-text"> 
                            <?php 
                            $b = "Hola Mundo"; // Variable con valor de texto 
                            echo $b; // Imprimir el valor de $b 
                            ?> 
                        </p> 
                        <h5 class="card-title">Valor de la variable $c (decimal):</h5> 
                        <p class="card-text"> 
                            <?php 
                            $c = 3.14; // Variable con valor decimal 
                            echo $c; // Imprimir el valor de $c 
                            ?> 
                        </p> 
                    </div> 
                </div> 
 
            </div> 
        </div> 
    </div> 
    <!-- Incluir jQuery y Bootstrap JS desde sus CDN --> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> 
    <script 
src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script 
src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body> 
</html>  
