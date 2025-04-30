<!-- filepath: c:\xampp\htdocs\PN211471-LIS-2025\Desafio2\Views\Productos\categoria.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Categoría</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    <div class="container mt-5">
        <h1 class="text-center mb-4">Gestión de Categorías</h1>
        <div class="row">
            <!-- Columna del formulario -->
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h4 class="text-center mb-3">Agregar Categoría</h4>
                        <form action="<?= isset($categoria) ? PATH . '/Categorias/update_categoria' : PATH . '/Categorias/insert' ?>" method="POST">
                            <div class="mb-3">
                                <label for="categoria_id" class="form-label">ID de Categoría</label>
                                <input value="<?=empty($categorias['categoria_id'])?'':$categorias['categoria_id'] ?>" type="text" class="form-control" id="categoria_id" name="categoria_id" placeholder="Ingrese el ID de la categoría" required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre_categoria" class="form-label">Nombre de Categoría</label>
                                <input value="<?=empty($categorias['nombre_categoria'])?'':$categorias['nombre_categoria'] ?>" type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Ingrese el nombre de la categoría" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Agregar Categoría</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Columna de la tabla -->
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="text-center mb-3">Lista de Categorías</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Categoria_ID</th>
                                    <th>Nombre_Categoria</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($categorias as $categoria): ?>
                                <tr>
                                    <td><?= $categoria['categoria_id'] ?></td>
                                    <td><?= $categoria['nombre_categoria'] ?></td>
                                    <td>
                                        <a href="<?= PATH.'/Categorias/update/'.$categoria['categoria_id']?>" class="btn btn-warning btn-sm">Editar</a>
                                        <a href="<?= PATH.'/Categorias/delete/'.$categoria['categoria_id']?>" class="btn btn-danger btn-sm">Eliminar</a>
                                    </td>
                                    <?php endforeach; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($message)): ?>
<script>
    Swal.fire({
        icon: '<?= $message['type'] ?>',
        title: '<?= $message['type'] === 'success' ? '¡Éxito!' : 'Error' ?>',
        text: '<?= $message['text'] ?>',
        confirmButtonText: 'Aceptar'
    }).then((result) => {
        if (result.isConfirmed && '<?= $message['type'] ?>' === 'success') {
            window.location.href = '<?= PATH ?>/Categorias/index';
        }
    });
</script>
<?php endif; ?>
    <!-- Bootstrap JS (Opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>