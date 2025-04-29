<!-- filepath: c:\xampp\htdocs\PN211471-LIS-2025\Desafio2\Views\carrito\carrito.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        </style>
</head>
<body>   
     <!-- Barra de navegación -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= PATH ?>/Principal/index">Mi Tienda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if (empty($_SESSION['nombre'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= PATH ?>/Clientes/login">
                            <i class="fas fa-user"></i> Iniciar Sesión
                        </a>
                    </li>
                    <?php else: ?>
                        <li class="nav-item">
                        <a class="nav-link text-info" href="#"><?= $_SESSION['nombre'] ?></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-danger" href="<?= PATH ?>/Clientes/logout">Cerrar Sesión</a>                        
                        </li>
                        <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= PATH ?>/Carrito/ver">
                            <i class="fas fa-shopping-cart"></i> Carrito
                        </a>
                    </li>
                    <?php if (!empty($_SESSION['rol'])): ?>
                        <li class="nav-item">
                        <a class="nav-link" href="<?= PATH ?>/Usuarios/login">
                            <i class="fas fa-user-shield"></i> Admin
                        </a>
                       </li>
                    <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container">
    <div class="row">
        <!-- Carrito -->
        <div class="col-md-7 carrito">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            <div class="col-xs-6">
                                <h5><span class="glyphicon glyphicon-shopping-cart"></span> Carrito de Compras</h5>
                            </div>
                            <div class="col-xs-6">
                                <a href="<?= PATH ?>/Principal/index" class="btn btn-primary btn-sm btn-block">
                                    <span class="glyphicon glyphicon-share-alt"></span> Seguir Comprando
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <?php
                    $total = 0;
                    foreach ($carrito as $item) {
                        $subtotal = $item['precio'] * $item['cantidad'];
                        $total += $subtotal;
                    }
                    ?>
                    <!-- Iterar los productos del carrito -->
                    <?php foreach ($carrito as $item): ?>
                    <div class="row">
                        <div class="col-xs-4">
                            <h4 class="product-name"><strong><?= htmlspecialchars($item['nombre']); ?></strong></h4>
                        </div>
                        <div class="col-xs-6">
                            <div class="col-xs-6 text-right">
                                <h6><strong>$<?= number_format($item['precio'], 2); ?><span class="text-muted">x</span></strong></h6>
                            </div>
                            <div class="col-xs-4">
                                <input disabled type="text" class="form-control input-sm" value="<?= $item['cantidad']; ?>">
                            </div>
                            <div class="col-xs-2">
                                <a href="<?= PATH ?>/Carrito/eliminar/<?= $item['codigo_producto']; ?>" class="btn btn-danger btn-sm">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="panel-footer">
                    <div class="row text-center">
                        <div class="col-xs-9">
                            <h4 class="text-right">Total <strong>$<?= number_format($total, 2); ?></strong></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulario de Pago -->
        <div class="col-md-5 formulario-pago">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5>Formulario de Pago</h5>
                </div>
                <div class="panel-body">
                    <form action="<?= PATH ?>/Carrito/procesarPago" method="POST">
                     <input type="hidden" name="total" value="<?= $total; ?>">
                     <input type="hidden" name="nombre" value="<?= $_SESSION['nombre'] ?>">
                         
                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Titular</label>
                            <input type="text" class="form-control" id="nombrecliente" name="nombrecliente" placeholder="Nombre completo" required>
                        </div>
                        <!-- Tarjeta de crédito -->
                        <div class="mb-3">
                            <label for="tarjeta" class="form-label">Número de Tarjeta</label>
                            <input type="text" class="form-control" id="tarjeta" name="tarjeta" placeholder="1234 5678 9012 3456" maxlength="19" required>
                        </div>
                        <!-- Fecha de vencimiento -->
                        <div class="mb-3">
                            <label for="vencimiento" class="form-label">Fecha de Vencimiento</label>
                            <input type="date" class="form-control" id="vencimiento" name="vencimiento" required>
                        </div>
                        <!-- CVV -->
                        <div class="mb-3">
                            <label for="cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cvv" name="cvv" placeholder="123" maxlength="3" required>
                        </div>
                        <br>
                        <!-- Botón de pagar -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Pagar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>