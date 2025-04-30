<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
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

    <div class="container mt-5">
        <h1 class="text-center mb-4">Gestión de Productos</h1>
        <!-- Formulario arriba de la tabla -->
        <div class="row">
            <div class="col-md-12"> <!-- Cambiado a col-md-12 para que el formulario sea más ancho -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h4>Agregar Producto</h4>
                    </div>
                    <div class="card-body">
                    <?php
                    if(isset($errores)){
                        echo "<div class='alert alert-danger'>";
                        echo "<ul>";
                        foreach($errores as $error){
                            echo "<li>$error</li>";
                        }
                        echo "</ul>";
                        echo "</div>";
                        }
                       ?>
                        <form action="<?= PATH ?>/Productos/insert" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="codigo" class="form-label">Código del Producto</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" 
                                value="<?=empty($productos['codigo_productos'])?'':$productos['codigo_productos'] ?>" placeholder="Ingresa el código del producto" 
                                required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del Producto</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" 
                                value="<?=empty($productos['nombre'])?'':$productos['nombre'] ?>" placeholder="Ingresa el nombre del producto" 
                                required>
                            </div>
                            <div class="mb-3">
                                <label for="categoria" class="form-label">Categoría</label>
                                <select class="form-select" name="categoria_id" id="categoria_id" required>
                                    <option value="" disabled <?= empty($productos['categoria_id']) ? 'selected' : '' ?>>Selecciona una categoría</option>
                                    <?php foreach ($categorias as $categoria): ?>
                                        <option value="<?= $categoria['categoria_id'] ?>" 
                                            <?= isset($productos['categoria_id']) && $productos['categoria_id'] == $categoria['categoria_id'] ? 'selected' : '' ?>>
                                            <?= $categoria['nombre_categoria'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select> 
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input class="form-control" id="descripcion" name="descripcion" rows="3" 
                                value="<?=empty($productos['descripcion'])?'':$productos['descripcion'] ?>" placeholder="Ingresa la descripcion del producto" 
                                required>
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio</label>
                                <input type="number" class="form-control" id="precio" name="precio" step="0.01" 
                                value="<?=empty($productos['precio'])?'':$productos['precio'] ?>" placeholder="Ingresa el precio del producto" 
                                required>
                            </div>
                            <div class="mb-3">
                                <label for="existencias" class="form-label">Existencias</label>
                                <input type="number" class="form-control" id="existencias" name="existencias" 
                                value="<?=empty($productos['existencias'])?'':$productos['existencias'] ?>" placeholder="Ingresa las existencias del producto" 
                                required>
                            </div>
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Imagen del Producto</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*"
                                value="<?= isset($productos['imagen']) ? htmlspecialchars($productos['imagen']) : '' ?>" placeholder="Selecciona una imagen"
                                required>
                                
                            </div>
                            <button type="submit" class="btn btn-success" name="add">Guardar Producto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de productos -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h4>Lista de Productos</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Imagen</th>
                                        <th>Categoria</th>
                                        <th>Precio</th>
                                        <th>Existencias</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($tabla_productos as $producto): ?>
                                    <tr>
                                        <td><?=$producto['codigo_productos']?></td>
                                        <td><?=$producto['nombre']?></td>
                                        <td><?=$producto['descripcion']?></td>
                                        <td><img src="../<?=$producto['imagen']?>" alt="Imagen" width="50"></td>
                                        <td><?=$producto['categoria_id']?></td>
                                        <td><?=$producto['precio']?></td>
                                        <td><?=$producto['existencias']?></td>
                                        <td>
                                            <a href="<?= PATH ?>/Productos/update/<?=$producto['codigo_productos']?>" class="btn btn-warning btn-sm">Editar</a>
                                            <a href="<?= PATH ?>/Productos/delete/<?=$producto['codigo_productos']?>" class="btn btn-danger btn-sm">Eliminar</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>