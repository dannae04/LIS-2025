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
    <div class="container mt-5">
        <h1 class="text-center mb-4">Gestión de Productos</h1>

        <div class="row justify-content-center">
            <div class="col-md-8"> 
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Editar Producto</h4>
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
                        <form action="<?= PATH ?>/Productos/update_productos" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="codigo" class="form-label">Código del Producto</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" 
                                value="<?=empty($productos['codigo_productos'])?'':$productos['codigo_productos'] ?>" placeholder="Ingresa el código del producto" 
                                readonly>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del Producto</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" 
                                value="<?=empty($productos['nombre'])?'':$productos['nombre'] ?>" placeholder="Ingresa el nombre del producto" 
                                required>
                            </div>
                            <div class="mb-3">
                                <label for="categoria" class="form-label">Categoría</label>
                                <select class="form-select" aria-label="Default select example" name="categoria_id" id="categoria_id" required>
                                    <option selected>Selecciona una categoría</option>
                                    <?php foreach($categorias as $categoria): ?>                                                              
                                    <option value="<?=$categoria['categoria_id']?>" name="categoria_id" <?= isset($productos['categoria_id']) && $productos['categoria_id'] == $categoria['categoria_id'] ? 'selected' : '' ?>>
                                        <?=$categoria['nombre_categoria']?>
                                    </option>                                
                                    <?php endforeach; ?>
                                </select> 
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Ingresa la descripción del producto" required><?=empty($productos['descripcion'])?'':$productos['descripcion'] ?></textarea>
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
                                <?php if(!empty($productos['imagen'])): ?>
                                    <div class="mb-2">
                                        <p>Imagen actual:</p>
                                        <img src="<?= PATH ?>/<?= $productos['imagen'] ?>" alt="Imagen actual" style="max-width: 200px; max-height: 200px;" class="img-thumbnail">
                                        <input type="hidden" name="imagen_actual" value="<?= $productos['imagen'] ?>">
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="mantener_imagen" name="mantener_imagen" value="1" checked>
                                        <label class="form-check-label" for="mantener_imagen">
                                            Mantener esta imagen
                                        </label>
                                    </div>
                                <?php endif; ?>
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*"
                                placeholder="Selecciona una imagen">
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success btn-lg">Guardar Cambios</button>
                                <button type="button" class="btn btn-secondary btn-lg" onclick="window.location.href='<?= PATH ?>/Productos/index'">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
 