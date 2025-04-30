<!-- filepath: c:\xampp\htdocs\PN211471-LIS-2025\Desafio2\Views\Principal\detalles.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <!-- Imagen del producto -->
            <div class="col-md-5 text-center">
                <img src="<?= PATH ?>/<?= $producto['imagen']; ?>" class="img-fluid rounded" alt="<?= $producto['nombre']; ?>" style="max-height: 400px; object-fit: cover;">
            </div>
            <!-- Detalles del producto -->
            <div class="col-md-5 text-center">
                <h1 class="mb-3"><?= $producto['nombre']; ?></h1>
                <h5 class="text-secondary"><?= $producto['descripcion']; ?></h5>
                <h4 class="text-primary">$<?= number_format($producto['precio'], 2); ?></h4>
                <div class="mt-4">
                    <!-- Botón para regresar -->
                    <a href="<?= PATH ?>/Principal/index" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Regresar
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>