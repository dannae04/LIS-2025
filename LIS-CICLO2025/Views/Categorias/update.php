<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container mt-5 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-6"> 
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h4 class="text-center mb-3">Editar Categoría</h4>
                    <form action="<?= PATH ?>/Categorias/update_categoria" method="POST">
                        <div class="mb-3">
                            <label for="categoria_id" class="form-label">ID de Categoría</label>
                            <input value="<?=empty($categorias['categoria_id'])?'':$categorias['categoria_id'] ?>" 
                                   type="text" 
                                   class="form-control" 
                                   id="categoria_id" 
                                   name="categoria_id" 
                                   placeholder="Ingrese el ID de la categoría" 
                                   readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nombre_categoria" class="form-label">Nombre de Categoría</label>
                            <input value="<?=empty($categorias['nombre_categoria'])?'':$categorias['nombre_categoria'] ?>" 
                                   type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Ingrese el nombre de la categoría" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Editar Categoría</button>
                            <button type="button" class="btn btn-secondary mt-2" onclick="window.location.href='<?= PATH ?>/Categorias/index'">Cancelar</button>
                        </div>
                    </form>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>