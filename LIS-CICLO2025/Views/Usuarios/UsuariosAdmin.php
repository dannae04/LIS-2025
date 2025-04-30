<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
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

<!-- Contenido principal -->
<div class="container mt-5">
    <h2 class="mb-4">Gestión de Usuarios</h2>
    <div class="mb-4">
        <a href="<?= PATH ?>/Usuarios/register" class="btn btn-success">Registrar Usuario</a>
    </div>
    <table class="table table-hover align-middle bg-white">
        <thead class="table-light">
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Mostrar solamente los empleados -->
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= $usuario['nombre'] ?></td>
                <td><?= $usuario['email'] ?></td>
                <?php if($usuario['estado'] == 0): ?>
                    <td><span class="badge bg-danger rounded-pill">Inactivo</span></td>
                <?php else: ?>
                    <td><span class="badge bg-success rounded-pill">Activo</span></td>
                <?php endif; ?>
                <td>
                <a href="<?= PATH ?>/Usuarios/update/<?=$usuario['nombre']?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="<?= PATH ?>/Usuarios/delete/<?=$usuario['nombre']?>" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>