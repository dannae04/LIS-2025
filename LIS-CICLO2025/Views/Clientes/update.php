<!-- filepath: c:\xampp\htdocs\PN211471-LIS-2025\Desafio2\Views\Clientes\update.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Editar Cliente</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= PATH ?>/Clientes/updateCliente" method="POST">
                            <!-- Campo Código de Cliente (Solo lectura) -->
                            <div class="mb-3">
                                <label for="codigo_cliente" class="form-label">Código de Cliente</label>
                                <input type="text" class="form-control" id="codigo_cliente" name="codigo_cliente" 
                                       value="<?= isset($clientes['codigo_cliente']) ? htmlspecialchars($clientes['codigo_cliente']) : '' ?>" 
                                       readonly>
                            </div>
                            <!-- Campo Nombre -->
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" 
                                       value="<?= isset($clientes['nombre']) ? htmlspecialchars($clientes['nombre']) : '' ?>" 
                                       placeholder="Ingresa el nombre del cliente" required>
                            </div>
                            <!-- Campo Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="<?= isset($clientes['email']) ? htmlspecialchars($clientes['email']) : '' ?>" 
                                       placeholder="Ingresa el correo electrónico" required>
                            </div>
                            <!-- Campo Contraseña -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" 
                                       placeholder="Ingresa una nueva contraseña (opcional)">
                            </div>
                            <!-- Campo Teléfono -->
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" 
                                       value="<?= isset($clientes['telefono']) ? htmlspecialchars($clientes['telefono']) : '' ?>" 
                                       placeholder="Ingresa el número de teléfono" required>
                            </div>

                            <!-- Campo estado -->
                            <div class="mb-3">
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="estado" name="estado" 
                                       value="<?= isset($clientes['estado']) ? htmlspecialchars($clientes['estado']) : '' ?>" 
                                       placeholder="Ingresa el estado del cliente (1=activo, 0=inactivo)" required>
                                </select>
                            <!-- Botones -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Guardar Cambios</button>
                                <a href="<?= PATH ?>/Clientes/index" class="btn btn-secondary mt-2">Cancelar</a>
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