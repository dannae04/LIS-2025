<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
<!--Realice un script PHP que muestre mediante la utilización de variables sus datos personales: nombre 
completo, lugar de nacimiento (departamento y país, si es extranjero), edad y carnet de la universidad. 
Muestre estos datos en una tabla.-->

<style>
table, th, td{
border: 2px solid purple;
border-collapse: collapse;
background-color: #d3f3ff;
font-family: Arial;
}
th, td {
    padding: 10px;
}
th {
    text-align: left;
}
h2 {
    text-align: center;
    font-size: 50px;
    font-family: Arial;
}
</style>
<h2>Datos Personales</h2>

<?php
$nombre_completo="Daniela Esmeralda Gutierrez";
$lugar_nacimiento="El Salvador";
$edad="24 años";
$carnet="GL210850";

echo "<center><table border=1 width=500px>";
echo "<tr>";
echo "<td> Nombre Completo:</td>";
echo "<td>" .$nombre_completo."</td>";
echo "</tr>";
echo "<tr>";
echo "<td> Lugar de nacimiento:";
echo "<td>".$lugar_nacimiento."</td>";
echo "</tr>";
echo "<td> Edad:";
echo "<td>".$edad."</td>";
echo "</tr>";
echo "<td> Carnet:";
echo "<td>".$carnet."</td>";
echo "</tr>";

echo "</table></center>"
?>

    
</body>

</html>
