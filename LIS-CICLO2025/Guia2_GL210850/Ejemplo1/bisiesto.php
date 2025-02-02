<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Año Bisiesto</title>
 <link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
rel="stylesheet">
</head>
<body class="bg-light">
 <div class="container py-5">
 <div class="row justify-content-center">
 <div class="col-md-6">
 <div class="card shadow">
 <div class="card-header text-center bg-primary text-white">
 <h4>Comprobador de Años Bisiestos</h4>
 </div>
 <div class="card-body">
 <?php
$currentYear = date('Y');
if (!isset($_POST['enviar'])): ?>
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST"
name="frmdatos" onsubmit="return validarAnio();">
 <div class="mb-3">
 <label for="year" class="form-label">Probar
año:</label>
 <input type="number" class="form-control" id="year"
name="year" placeholder="Ingrese el año" required>
 <div id="numbersOnly" class="form-text">Ingrese un
número entero mayor a 1900 y menor o igual a <?= $currentYear; ?></div>
 </div>
<button type="submit" name="enviar" class="btn btnprimary w-100">Probar</button>
 </form>
<?php else:
 $year = intval($_POST['year']);
if ($year <= 0 || $year > $currentYear) {
 echo "<div class='alert alert-danger text-center
mt-3'>Por favor, ingrese un año válido mayor a 1900 y menor o igual a
$currentYear.</div>";
 echo "<div class='text-center mt-3'><a href='" .
$_SERVER['PHP_SELF'] . "' class='btn btn-secondary'>Intentar de nuevo</a></div>";
 } elseif (($year % 4 === 0 && $year % 100 !== 0) ||
($year % 400 === 0)) {
 echo "<div class='alert alert-success text-center
mt-3'>El año $year es bisiesto.</div>";
 } else {
 echo "<div class='alert alert-danger text-center
mt-3'>El año $year no es bisiesto.</div>";
 }
echo "<div class='text-center mt-3'><a href='" .
$_SERVER['PHP_SELF'] . "' class='btn btn-secondary'>Probar otro año</a></div>";
 endif;
?>
 </div>
 </div>
 </div>
 </div>
 </div>
 <script>
 function validarAnio() {
 const yearInput = document.getElementById('year').value;
 const currentYear = new Date().getFullYear();
 if (yearInput <= 1900 || yearInput > currentYear
|| !Number.isInteger(Number(yearInput))) {
    alert(`Por favor, ingrese un año válido mayor a 1900 y menor o igual
a ${currentYear}.`);
 return false;
 }
 return true;
 }
 </script>
 <script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
></script>
</body>
</html>
