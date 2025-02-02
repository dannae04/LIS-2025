<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Convertidor de Bases Numéricas</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
<h1 class="text-center">Convertidor de Bases Numéricas</h1>
<form method="POST" class="mt-4">
<div class="mb-3">
<label for="number" class="form-label">Número:</label>
<input type="text" name="number" id="number" class="form-control" required>
</div>
<div class="mb-3">
<label for="base_from" class="form-label">Base de origen:</label>
<select name="base_from" id="base_from" class="form-select" required>
<?php for ($i = 2; $i <= 36; $i++): ?>
<option value="<?php echo $i; ?>">Base <?php echo $i; ?></option>
<?php endfor; ?>
</select>
</div>
<div class="mb-3">
<label for="base_to" class="form-label">Base de destino:</label>
<select name="base_to" id="base_to" class="form-select" required>
<?php for ($i = 2; $i <= 36; $i++): ?>
<option value="<?php echo $i; ?>">Base <?php echo $i; ?></option>
<?php endfor; ?>
</select>
</div>
<button type="submit" class="btn btn-primary w-100">Convertir</button>
</form>
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
<div class="mt-4">
<?php
$number = $_POST['number'];
$base_from = (int)$_POST['base_from'];
$base_to = (int)$_POST['base_to'];
// Validación y proceso de conversión
try {
echo "<div class='alert alert-info'><strong>Proceso de conversión:</strong><br>";
// Convertir a decimal paso a paso
$decimal = 0;
$length = strlen($number);
for ($i = 0; $i < $length; $i++) {
$digit = base_convert($number[$i], $base_from, 10);
$power = $length - $i - 1;
$decimal += $digit * pow($base_from, $power);
echo "Paso $i: Dígito: $digit, Potencia: $base_from^$power, Resultado Parcial: $decimal<br>";
}
echo "Número en decimal: $decimal<br>";
// Convertir de decimal a base destino paso a paso
$converted = "";
$steps = [];
while ($decimal > 0) {
$remainder = $decimal % $base_to;
$steps[] = $remainder;
$decimal = intdiv($decimal, $base_to);
}
$steps = array_reverse($steps);
foreach ($steps as $step) {
$converted .= base_convert($step, 10, $base_to);
}
echo "Número convertido en base destino: $converted";
echo "</div>";
echo "<div class='alert alert-success'>El número <strong>$number</strong> en base
<strong>$base_from</strong> convertido a base <strong>$base_to</strong> es:
<strong>$converted</strong>.</div>";
} catch (Exception $e) {
echo "<div class='alert alert-danger'>Hubo un error en la conversión. Verifica los datos
ingresados.</div>";
}
?>
</div>
<?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>