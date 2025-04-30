<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telas de Lona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #d7cfff;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Textil Export</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.html">Pagina principal</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <br><br><br><br><br>

       <!--Hago la conexion con mi funcion base, es la que tiene mi objetos almacenados en el XML-->
       <?php include 'funcionBase.php';
       $productos = obtenerProductos();
       ?>

        <h1 class="text-center">TELAS DE LONA</h1>
      <div class="cartas" style="margin: 5%;">
      <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php foreach($productos as $producto) { 
       if (strpos(strtolower($producto['nombre']), 'lona') !== false || strpos(strtolower($producto['descripcion']), 'lona') !== false) { ?>
    <div class="col">
    <div class="card h-100">
        <img src="<?php echo $producto['imagen']; ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
        <p class="card-text"><?php echo $producto['descripcion']; ?></p>
        <p class="card-text">Precio: $<?php echo $producto['precio']; ?></p>
       <?php if($producto['existencia'] > 0) { ?>
        <p class="card-text">Existencia: <?php echo $producto['existencia']; ?></p>
        <?php } else { ?>
        <p class="card-text">Producto no disponible</p>
        <?php } ?> 
      </div>
    </div>
  </div>
  <?php } ?>
  <?php } ?>
</div>
</div>
</body>
</html>