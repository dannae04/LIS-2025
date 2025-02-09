<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $tarea = $_POST['tarea'];
    $investigacion = $_POST['investigacion'];
    $examen = $_POST['examen'];

    // Cargar el archivo XML si existe, de lo contrario crear uno nuevo
    if (file_exists('notas.xml')) {
        $xml = simplexml_load_file('notas.xml');
    } else {
        $xml = new SimpleXMLElement('<notas></notas>');
    }

    // Agregar las nuevas notas al XML
    $alumno = $xml->addChild('alumno');
    $alumno->addChild('nombre', $nombre);
    $alumno->addChild('tarea', $tarea);
    $alumno->addChild('investigacion', $investigacion);
    $alumno->addChild('examen', $examen);

    // Guardar el archivo XML
    $xml->asXML('notas.xml');
}

// Cargar las notas desde el archivo XML
$notas = [];
if (file_exists('notas.xml')) {
    $xml = simplexml_load_file('notas.xml');
    foreach ($xml->alumno as $alumno) {
        $notas[(string)$alumno->nombre] = [
            'tarea' => (float)$alumno->tarea,
            'investigacion' => (float)$alumno->investigacion,
            'examen' => (float)$alumno->examen
        ];
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Notas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        .custom-table {
            margin-top: 20px;
            border: 3px solid #a5ffe5;
        }
        .custom-table th, .custom-table td {
            border:3px solid black;
        }
    </style>
</head>
<body>
    <div class="container" >
        <h2>Ingreso de Notas</h2>
        <form action="promedio_notas.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="tarea">Nota Tarea (50%):</label>
                <input type="number" class="form-control" id="tarea" name="tarea" min="0" max="10" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="investigacion">Nota Investigación (30%):</label>
                <input type="number" class="form-control" id="investigacion" name="investigacion" min="0" max="10" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="examen">Nota Examen Parcial (20%):</label>
                <input type="number" class="form-control" id="examen" name="examen" min="0" max="10" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-success">Calcular Promedio</button>
        </form>

        <h2 class="mt-5">Notas Ingresadas</h2>
        <table class="table table-bordered custom-table" >
            <thead class="table-primary">

                <tr>
                    <th>Nombre</th>
                    <th>Tarea (50%)</th>
                    <th>Investigación (30%)</th>
                    <th>Examen (20%)</th>
                    <th>Promedio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($notas as $nombre => $nota) {
                    $promedio = ($nota['tarea'] * 0.5) + ($nota['investigacion'] * 0.3) + ($nota['examen'] * 0.2);
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($nombre) . '</td>';
                    echo '<td>' . htmlspecialchars($nota['tarea']) . '</td>';
                    echo '<td>' . htmlspecialchars($nota['investigacion']) . '</td>';
                    echo '<td>' . htmlspecialchars($nota['examen']) . '</td>';
                    echo '<td>' . htmlspecialchars($promedio) . '</td>';
                    echo '</tr>';

                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>