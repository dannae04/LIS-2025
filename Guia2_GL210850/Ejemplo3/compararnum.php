<!DOCTYPE html>
<html lang="es">
<head>
<title>Contador de palabras</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
/>
</head>
<body>
<header class="bg-primary text-white text-center py-4">
<h1>
Resultados de la comparación de <?php echo $num1 = isset($_POST['numero1']) ? $_POST['numero1']
: 0; ?>,
<?php echo $num2 = isset($_POST['numero2']) ? $_POST['numero2'] : 0; ?> y
<?php echo $num3 = isset($_POST['numero3']) ? $_POST['numero3'] : 0; ?>
</h1>
</header>
<section class="container alert alert-light mt-4" role="alert">
<?php
$elmayor = ($num1 > $num2) ? $num1 : $num2;
$elmayor = ($elmayor > $num3) ? $elmayor : $num3;
printf("El número mayor es: %d", $elmayor);
?>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
