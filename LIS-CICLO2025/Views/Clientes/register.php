<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }
        .card {
            max-width: 900px;
            width: 100%;
        }
        .img-container {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #e9ecef;
        }
        .img-container img {
            max-height: 100%;
            max-width: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="card shadow">
        <div class="row g-0">
            <!-- Columna para la imagen -->
            <div class="col-md-7 img-container">
                <img src="<?= PATH ?>/img/twins.jpg" class="img-fluid rounded-start" alt="Imagen de registro">
            </div>
            <!-- Columna para el formulario -->
            <div class="col-md-5">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Registro de Cliente</h4>
                    <form action="<?= PATH ?>/Clientes/insert" method="POST">
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
                        <!-- Campo Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
                        </div>
                        <!-- Campo Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
                        </div>
                        <!-- Campo Contraseña -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                        </div>
                        <!-- Campo Teléfono -->
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingresa tu número de teléfono" required>
                        </div>
                        <!-- Botón de Registro -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-info">Registrarse</button>
                        </div>
                        <div class="text-center mt-3">
                        <p>¿Ya tienes cuenta? <a href="<?= PATH ?>/Clientes/login" class="text-primary">Ingresa aqui</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>