
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .banner {
            background: linear-gradient(to right,rgb(145, 198, 255),rgb(193, 154, 255));
            color: white;
            padding: 50px 0;
            text-align: center;
        }
        .banner h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .card-img-top {
            border-radius: 10px;
        }
        .btn-primary {
            background-color:rgb(218, 154, 255);
            border: none;
        }
        .btn-primary:hover {
            background-color:rgb(188, 98, 202);
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= PATH ?>/Principal/index">Mi Tienda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if (empty($_SESSION['nombre'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= PATH ?>/Clientes/login">
                            <i class="fas fa-user"></i> Iniciar Sesión
                        </a>
                    </li>
                    <?php else: ?>
                        <li class="nav-item">
                        <a class="nav-link text-info" href="#"><?= $_SESSION['nombre'] ?></a>
                        <input type="hidden" name="codigo_producto" value="<?= $_SESSION['nombre']; ?>">
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-danger" href="<?= PATH ?>/Clientes/logout">Cerrar Sesión</a>
                        </li>
                        <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= PATH ?>/Carrito/ver">
                            <i class="fas fa-shopping-cart"></i> Carrito
                        </a>
                    </li>
                    <?php if (!empty($_SESSION['rol'])): ?>
                        <li class="nav-item">
                        <a class="nav-link" href="<?= PATH ?>/Usuarios/panel">
                            <i class="fas fa-user-shield"></i> Admin
                        </a>
                       </li>
                    <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner -->
    <div class="banner">
        <h1>Bienvenido Textil Export</h1>
        <p>Encuentra los mejores productos al mejor precio</p>
    </div>

    <!-- Carrusel -->
<div id="carouselExampleIndicators" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= PATH ?>/img/banner1.jpg" class="d-block w-100" alt="Banner 1" style="height: 400px; object-fit: cover;">
        </div>
        <div class="carousel-item">
            <img src="<?= PATH ?>/img/banner2.jpg" class="d-block w-100" alt="Banner 2" style="height: 400px; object-fit: cover;">
        </div>
        <div class="carousel-item">
            <img src="<?= PATH ?>/img/banner3.jpg" class="d-block w-100" alt="Banner 3" style="height: 400px; object-fit: cover;">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

    <!-- Contenido principal -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Productos Disponibles</h2>
        <div class="row">
            <?php foreach ($productos as $producto) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="../<?php echo $producto['imagen']; ?>" class="card-img-top" alt="<?php echo $producto['nombre']; ?>" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                            <p class="fw-bold">$<?php echo number_format($producto['precio'], 2); ?></p>
                            <!-- Formulario para agregar al carrito -->
                            <form action="<?= PATH ?>/Carrito/agregar" method="POST">
                               <input type="hidden" name="codigo_producto" value="<?= $producto['codigo_productos']; ?>">
                               <input type="hidden" name="nombre" value="<?= $producto['nombre']; ?>">
                               <input type="hidden" name="precio" value="<?= $producto['precio']; ?>">
                                <button type="submit" class="btn btn-primary">
                                 <i class="fas fa-cart-plus"></i> Agregar al Carrito
                                </button>
                            </form>
                            <br>
                            <!-- Botón para ver detalles -->
                            <a href="<?= PATH ?>/Principal/detalles/<?= $producto['codigo_productos']; ?>" class="btn btn-info">
                              <i class="fas fa-eye"></i> Ver Detalles
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>