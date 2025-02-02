<!DOCTYPE html>
<html lang="es">
<head>
<title>Calcular Salario</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximumscale=1.0,minimum-scale=1.0" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha3/dist/css/bootstrap.min.css" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<header id="inset">
<h1 class="mb-4 text-center">Detalle del salario</h1>
</header>
<section class="container mt-5">
<article class="card shadow p-4">
<?php
if (isset($_POST['enviar'])) {
$empleado = isset($_POST['empleado']) ? $_POST['empleado'] : "";
$sueldobase = isset($_POST['sueldobase']) ? $_POST['sueldobase'] : "";
if (isset($_POST['hextra'])) {
$horasextras = isset($_POST['numhorasex']) ? $_POST['numhorasex'] : "0";
$pagohextra = isset($_POST['pagohextra']) ? $_POST['pagohextra'] : "0";
$sueldohextras = $horasextras * $pagohextra;
} else {
$horasextras = 0;
$sueldohextras = 0;
}
$sueldoneto = $sueldobase + $sueldohextras;
echo "<div class=\"alert alert-primary\">\n<h3 class=\"text-center\">Boleta de pago</h3>\n";
echo "<table class=\"table table-striped\">\n";
echo "\t<tr>\n\t\t<th colspan=\"2\" class=\"text-center\">\n\t\t\tDetalle del
pago\n\t\t</th>\n\t</tr>\n";
echo "\t<tr>\n\t\t<td>\n\t\t\tEl empleado es: \n\t\t</td>\n\t\t<td>\n\t\t\t", $empleado,
"\n\t\t</td>\n\t</tr>\n";
echo "\t<tr>\n\t\t<td>\n\t\t\tEl sueldo base es: \n\t\t</td>\n\t\t<td>\n\t\t\t\$ ", $sueldobase,
"\n\t\t</td>\n\t</tr>\n";
echo "\t<tr>\n\t\t<td>\n\t\t\tLas horas extras son: \n\t\t</td>\n\t\t<td>\n\t\t\t", $horasextras,
"\n\t\t</td>\n\t</tr>\n";
echo "\t<tr>\n\t\t<td>\n\t\t\tEl pago por hora extra es: \n\t\t</td>\n\t\t<td>\n\t\t\t\$ ",
$sueldohextras, "\n\t\t</td>\n\t</tr>\n";
echo "\t<tr>\n\t\t<th>\n\t\t\tEl sueldo neto devengado es: \n\t\t</th>\n\t\t<th>\n\t\t\t\$ ",
$sueldoneto, "\n\t\t</th>\n\t</tr>\n";
echo "</table>\n</div>\n";
}
?>
<a href="salario.html" class="btn btn-primary btn-block">
<i class="bi bi-person-plus"></i> Ingresar otro empleado
</a>
</article>
</section>
</body>
</html>
