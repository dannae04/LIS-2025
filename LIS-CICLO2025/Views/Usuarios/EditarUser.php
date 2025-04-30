<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Editar Usuario</h4>
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
                        <form action="<?= PATH ?>/Usuarios/update_usuario" method="POST">
                            <!-- Campo Nombre -->
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input value="<?= isset($usuarios['nombre']) ? $usuarios['nombre'] : '' ?>"
                                 type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre del usuario" required>
                            </div>
                            <!-- Campo Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input value="<?= isset($usuarios['email']) ? $usuarios['email'] : '' ?>"
                                type="email" class="form-control" id="email" name="email" placeholder="Ingresa el correo electrónico" required>
                            </div>
                            <!-- Campo Contraseña -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa una nueva contraseña (obligatorio)" required>
                            </div>
                            <!-- Campo Rol -->
                            <div class="mb-3">
                                <label for="rol" class="form-label">Rol</label>
                                <input type="text" class="form-control" id="rol" name="rol" placeholder="Ingresa el codigo" required>
                            </div>
                            <!-- Campo Estado -->
                            <div class="mb-3">
                                <label for="estado" class="form-label">Estado</label>
                                <input value="<?= isset($usuarios['estado']) ? $usuarios['estado'] : '' ?>"
                                type="text" class="form-control" id="estado" name="estado" placeholder="Ingresa el estado del usuario(1=activo, 0=inactivo)" required>
                            </div>
                            <!-- Botones -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Guardar Cambios</button>
                                <a href="<?= PATH ?>/Usuarios/index" class="btn btn-secondary mt-2">Cancelar</a>
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