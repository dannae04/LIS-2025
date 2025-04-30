<!DOCTYPE html> 
<html lang="es"> 
<head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Conversión de Cadenas</title> 
    <link rel="stylesheet" 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> 
</head> 
<body> 
<div class="container mt-5"> 
    <header class="text-center mb-4"> 
        <h1 class="display-5 fw-bold">Trabajando con los Tipos de Datos en PHP</h1> 
 
    </header> 
 
    <section> 
    
    <?php 
    error_reporting(E_ALL & ~E_WARNING); 
    ini_set('display_errors', '1'); // Habilita la visualización de errores configurados 
 
        echo "<div class='container-fluid py-5 text-bg-dark'>"; 
        echo "<p class='col-md-12 fs-4' id='datos'>" ;        
        echo "<strong>Variables:</strong><br>" ;           
                define("SALTO", "\n"); 
                $cad = "10 metros"; 
                $str = "3D"; 
                $val = 20.5; 
                $num = 7; 
 
                echo "\$cad = \"$cad\"<br>\n"; 
                echo "\$str = \"$str\"<br>\n"; 
                echo "\$val = $val<br>\n"; 
                echo "\$num = $num<br>\n"; 
        echo "</p>"; 
        echo "</div>"; 
        echo "<div class='row'>"; 
            // Primera operación 
            echo '<div class="col-md-6 mb-4">'; 
            echo '<div class="card">'; 
            echo '<div class="card-body">'; 
            $concat = $cad + $val; 
            echo "<p>El valor de <strong>\$concat</strong> = \$cad + \$val es:</p>"; 
            echo "<p><strong>\$cad= \"$cad\" + $val</strong></p>"; 
            echo "<p><strong>Resultado:</strong> $concat</p>"; 
            echo "<p><strong>Tipo de dato:</strong> " . gettype($concat) . "</p>"; 
            echo '</div></div></div>'; 
 
            // Segunda operación 
            echo '<div class="col-md-6 mb-4">'; 
            echo '<div class="card">'; 
            echo '<div class="card-body">'; 
            $concat = $str + $num; 
            echo "<p>El valor de <strong>\$concat</strong> = \$str + \$num es:</p>"; 
            echo "<p><strong>\$cad= \"$str\" + $num</strong></p>"; 
            echo "<p><strong>Resultado:</strong> $concat</p>"; 
            echo "<p><strong>Tipo de dato:</strong> " . gettype($concat) . "</p>"; 
            echo '</div></div></div>'; 
 
            // Tercera operación 
            echo '<div class="col-md-6 mb-4">'; 
            echo '<div class="card">'; 
            echo '<div class="card-body">'; 
            $concat = $cad + $num; 
            echo "<p>El valor de <strong>\$concat</strong> = \$cad + \$num es:</p>"; 
            echo "<p><strong>\$cad= \"$cad\" + $num</strong></p>"; 
            echo "<p><strong>Resultado:</strong> $concat</p>"; 
            echo "<p><strong>Tipo de dato:</strong> " . gettype($concat) . "</p>"; 
            echo '</div></div></div>'; 
 
            // Cuarta operación 
            echo '<div class="col-md-6 mb-4">'; 
            echo '<div class="card">'; 
            echo '<div class="card-body">'; 
            $concat = $str + $val; 
            echo "<p>El valor de <strong>\$concat</strong> = \$str + \$val es:</p>"; 
            echo "<p><strong>\$cad= \"$str\" + $val</strong></p>"; 
            echo "<p><strong>Resultado:</strong> $concat</p>"; 
            echo "<p><strong>Tipo de dato:</strong> " . gettype($concat) . "</p>"; 
            echo '</div></div></div>'; 
 
            // Quinta operación 
            echo '<div class="col-md-6 mb-4">'; 
            echo '<div class="card">'; 
            echo '<div class="card-body">'; 
            $concat = $cad + $str; 
            echo "<p>El valor de <strong>\$concat</strong> = \$cad + \$str es:</p>"; 
            echo "<p><strong>\$cad= \"$cad\" + \"$str\"</strong></p>"; 
            echo "<p><strong>Resultado:</strong> $concat</p>"; 
            echo "<p><strong>Tipo de dato:</strong> " . gettype($concat) . "</p>"; 
            echo '</div></div></div>'; 
 
            // Sexta operación 
            echo '<div class="col-md-6 mb-4">'; 
            echo '<div class="card">'; 
            echo '<div class="card-body">'; 
            $concat = $val + $cad; 
            echo "<p>El valor de <strong>\$concat</strong> = \$val + \$cad es:</p>"; 
            echo "<p><strong>\$cad= $val + \"$cad\"</strong></p>"; 
            echo "<p><strong>Resultado:</strong> $concat</p>"; 
            echo "<p><strong>Tipo de dato:</strong> " . gettype($concat) . "</p>"; 
            echo '</div></div></div>'; 
 
            // Séptima operación 
            echo '<div class="col-md-6 mb-4">'; 
            echo '<div class="card">'; 
            echo '<div class="card-body">'; 
            $concat = $num + $str; 
            echo "<p>El valor de <strong>\$concat</strong> = \$num + \$str es:</p>"; 
            echo "<p><strong>\$cad= $num + \"$str\"</strong></p>"; 
            echo "<p><strong>Resultado:</strong> $concat</p>"; 
            echo "<p><strong>Tipo de dato:</strong> " . gettype($concat) . "</p>"; 
            echo '</div></div></div>'; 
 
            // Octava operación 
            echo '<div class="col-md-6 mb-4">'; 
            echo '<div class="card">'; 
            echo '<div class="card-body">'; 
            $concat = $num + $cad; 
            echo "<p>El valor de <strong>\$concat</strong> = \$num + \$cad es:</p>"; 
            echo "<p><strong>\$cad= $num + \"$cad\"</strong></p>"; 
            echo "<p><strong>Resultado:</strong> $concat</p>"; 
            echo "<p><strong>Tipo de dato:</strong> " . gettype($concat) . "</p>"; 
            echo '</div></div></div>'; 
 
            // Novena operación 
            echo '<div class="col-md-6 mb-4">'; 
            echo '<div class="card">'; 
            echo '<div class="card-body">'; 
            $concat = $val + $str; 
            echo "<p>El valor de <strong>\$concat</strong> = \$val + \$str es:</p>"; 
            echo "<p><strong>\$cad= $val + \"$str\"</strong></p>"; 
            echo "<p><strong>Resultado:</strong> $concat</p>"; 
            echo "<p><strong>Tipo de dato:</strong> " . gettype($concat) . "</p>"; 
            echo '</div></div></div>'; 
 
            // Décima operación 
            echo '<div class="col-md-6 mb-4">'; 
            echo '<div class="card">'; 
echo '<div class="card-body">'; 
$concat = $str + $cad; 
echo "<p>El valor de <strong>\$concat</strong> = \$str + \$cad es:</p>"; 
echo "<p><strong>\$cad= \"$str\" + \"$cad\"</strong></p>"; 
echo "<p><strong>Resultado:</strong> $concat</p>"; 
echo "<p><strong>Tipo de dato:</strong> " . gettype($concat) . "</p>"; 
echo "</div>";                           
?> 
</section> 
</div> 
<script 
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
</body> 
</html> 