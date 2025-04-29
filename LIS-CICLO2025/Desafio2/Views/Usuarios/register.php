<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <title>Registro de Usuario</title>
</head>
<body>
<style>
.divider:after,
.divider:before {
  content: "";
  flex: 1;
  height: 1px;
  background: #eee;
}
</style>
 
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="<?= PATH ?>/img/register.jpg" class="img-fluid" alt="Imagen de registro">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
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
        <h3 class="mb-4 text-center">Registro de Usuario</h3>
        <form action="<?= PATH ?>/Usuarios/insert" method="POST">
          <!-- Nombre -->
          <div class="form-outline mb-3">
            <label class="form-label " for="nombre">Nombre</label>
            <input value ="<?= isset($usuarios['nombre']) ? $usuarios['nombre'] : '' ?>"
             type="text" id="nombre" name="nombre" class="form-control form-control-md" placeholder="Ingrese su nombre" required />
          </div>
 
          <!-- Email -->
          <div class="form-outline mb-3">
            <label class="form-label " for="email">Correo Electrónico</label>
            <input value="<?= isset($usuarios['email']) ? $usuarios['email'] : '' ?>"
            type="email" id="email" name="email" class="form-control form-control-md" placeholder="Ingrese su correo electrónico" required />
          </div>
 
          <!-- Contraseña -->
          <div class="form-outline mb-3">
            <label class="form-label " for="password">Contraseña</label>
            <input value="<?= isset($usuarios['password']) ? $usuarios['password'] : '' ?>"
            type="password" id="password" name="password" class="form-control form-control-md" placeholder="Ingrese su contraseña" required />
          </div>

         <!-- codigo para poder registrarse como administrador o empleado -->
          <div class="form-outline mb-3">
            <label class="form-label " for="nombre">Codigo</label>
            <p>Por favor ingrese el codigo proporcionado para poder registrarse como Administrador o como empleado</p>
            <input type="text" id="rol" name="rol" class="form-control form-control-md" placeholder="Codigo requerido" required />
          </div>
 
          <!-- Botón de registro -->
          <button type="submit" class="btn btn-primary btn-md btn-block">Registrar</button>
        </form>
        <div class="mt-3 text-center">
         <a href="<?= PATH ?>/Usuarios/index" class="btn btn-secondary">Regresar al Administrador de Usuarios</a>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>