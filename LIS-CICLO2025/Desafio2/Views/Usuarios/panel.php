<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= PATH ?>/Usuarios/panel">Panel de Administración</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Menú desplegable -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Opciones
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <?php if ($_SESSION['rol'] == 'administrador'): ?>
                                <li><a class="dropdown-item" href="<?= PATH ?>/Categorias/index">Categorías</a></li>
                                <li><a class="dropdown-item" href="<?= PATH ?>/Usuarios/index">Usuarios</a></li>
                                <li><a class="dropdown-item" href="<?= PATH ?>/Clientes/index">Clientes</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="<?= PATH ?>/Productos/index">Productos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info" href="#"><?= $_SESSION['rol'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="<?= PATH ?>/Usuarios/logout">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Bienvenido al Panel de Administración</h1>
        <div class="row g-4">
        <?php if ($_SESSION['rol'] == 'administrador'): ?>
            <!-- Categorías -->
            <div class="col-md-6">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="<?= PATH ?>/img/categorias.jpg" class="card-img-top" alt="Categorías" style="height: 300px; width: 300px;">
                    <div class="card-body">
                        <h5 class="card-title">Categorías</h5>
                        <p class="card-text">Gestiona las categorías de productos.</p>
                        <div class="d-flex justify-content-center">
                          <a href="<?= PATH ?>/Categorias/index" class="btn btn-primary">Ir a Categorías</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <!-- Productos -->
            <div class="col-md-6">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="<?= PATH ?>/img/productos.jpg" class="card-img-top" alt="Productos" style="height: 300px; width: 300px;">
                    <div class="card-body">
                        <h5 class="card-title">Productos</h5>
                        <p class="card-text">Gestiona el inventario de productos.</p>
                        <div class="d-flex justify-content-center">
                          <a href="<?= PATH ?>/Productos/index" class="btn btn-primary">Ir a Productos</a>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <?php if ($_SESSION['rol'] == 'administrador'): ?>
            <!-- Usuarios -->
            <div class="col-md-6">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="<?= PATH ?>/img/usuarios.png" class="card-img-top" alt="Usuarios" style="height: 250px; width: 250px;">
                    <div class="card-body">
                        <h5 class="card-title">Usuarios</h5>
                        <p class="card-text">Gestiona los usuarios del sistema.</p>
                        <div class="d-flex justify-content-center">
                        <a href="<?= PATH ?>/Usuarios/index" class="btn btn-primary">Ir a Usuarios</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Clientes -->
            <div class="col-md-6">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="<?= PATH ?>/img/clientes.png" class="card-img-top" alt="Clientes" style="height: 250px; width: 250px;">
                    <div class="card-body">
                        <h5 class="card-title">Clientes</h5>
                        <p class="card-text">Gestiona los clientes registrados.</p>
                        <div class="d-flex justify-content-center">
                        <a href="<?= PATH ?>/Clientes/index" class="btn btn-primary">Ir a Clientes</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>