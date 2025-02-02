<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tabla de Conversiones de Monedas</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
<h1 class="text-center">Tabla de Conversiones de Monedas</h1>
<form method="POST" class="mt-4">
<div class="mb-3">
<label for="amount" class="form-label">Monto en moneda base (USD):</label>
<input type="number" name="amount" id="amount" class="form-control" required>
</div>
<div class="mb-3">
<label for="currency" class="form-label">Selecciona la divisa:</label>
<select name="currency" id="currency" class="form-select" required>
<option value="EUR">Euro (EUR)</option>
<option value="GBP">Libra Esterlina (GBP)</option>
<option value="JPY">Yen Japonés (JPY)</option>
</select>
</div>
<button type="submit" class="btn btn-primary w-100">Generar Tabla</button>
</form>
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
<div class="mt-4">
<?php
$amount = (float)$_POST['amount'];
$currency = $_POST['currency'];
// Tasas de conversión fijas (ejemplo, actualizar según tasas reales)
$conversion_rates = [
'EUR' => 0.85, // 1 USD = 0.85 EUR
'GBP' => 0.75, // 1 USD = 0.75 GBP
'JPY' => 110.00 // 1 USD = 110.00 JPY
];
$rate = $conversion_rates[$currency];
$limit = 10; // Número de filas en la tabla
$counter = 1;
echo "<table class='table table-striped'>";
echo "<thead><tr><th>#</th><th>Monto (USD)</th><th>Convertido
($currency)</th></tr></thead><tbody>";
while ($counter <= $limit) {
$converted = $amount * $rate;
echo "<tr><td>$counter</td><td>" . number_format($amount, 2) . "</td><td>" .
number_format($converted, 2) . "</td></tr>";
$amount += 10; // Incremento en el monto base
$counter++;
}
echo "</tbody></table>";
?>
</div>
<?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>