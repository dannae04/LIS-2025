<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Listado de Ventas</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Código de Venta</th>
                        <th>Código de Cliente</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($ventas)): ?>
                        <?php foreach ($ventas as $venta): ?>
                            <tr>
                                <td><?= htmlspecialchars($venta['codigo_ventas']); ?></td>
                                <td><?= htmlspecialchars($venta['codigo_cliente']); ?></td>
                                <td><?= htmlspecialchars($venta['fecha']); ?></td>
                                <td>$<?= number_format($venta['total'], 2); ?></td>
                                <td class="text-center align-middle">
                                    <a href="<?= PATH ?>/Ventas/generarPDF/<?= $venta['codigo_ventas'] ?>" class="btn btn-sm btn-info" target="_blank">
                                        IMPRIMIR FACTURA
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No hay ventas registradas.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
