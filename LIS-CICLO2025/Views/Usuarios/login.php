<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <title>Login</title>
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
.button {
  align-items: center;
}
</style>

<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="<?= PATH ?>/img/loginadmin.jpg" class="img-fluid" alt="login image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form action="<?= PATH ?>/Usuarios/login_usuario" method="POST">
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
          <!-- Imagen pequeña centrada -->
          <div class="text-center mb-3">
            <img src="<?= PATH ?>/img/uslog.png" alt="Logo" class="img-fluid" style="max-width: 100px;">
          </div>

          <!-- Texto LOGIN -->
          <div class="text-center mb-4">
            <h3 class="fw-bold">LOGIN</h3>
          </div>

          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <input value="<?= isset($email) ? htmlspecialchars($email) : '' ?>"
             type="email" id="email" class="form-control form-control-lg" name="email" placeholder="Ingrese el correo electrónico" />
            <label class="form-label" for="form1Example13">Email address</label>
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <input value="<?= isset($password) ? htmlspecialchars($password) : '' ?>"
            type="password" id="password" class="form-control form-control-lg" name="password" placeholder="Ingrese la contraseña" />
            <label class="form-label" for="form1Example23">Password</label>
          </div>

          <!-- Submit button -->
          <div class="d-flex justify-content-center">
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-lg">Sign in</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
</body>
</html>