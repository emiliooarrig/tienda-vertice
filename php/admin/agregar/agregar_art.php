<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title> Agregar articulo </title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Registrar Producto</h1>
        <form action="../guardar.php" method="post" enctype="multipart/form-data">
            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre" required>
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Ingresa una descripción del producto" required></textarea>
            </div>

            <!-- Foto -->
            <div class="mb-3">
                <label for="foto" class="form-label">Foto del Producto</label>
                <input type="file" class="form-control" id="foto" name="foto" required>
            </div>

            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" placeholder="Ingresa el precio en MXN" step="0.01" required>
            </div>

            <!-- Cantidad en Almacén -->
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad en Almacén</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad_en_almacen" placeholder="Ingresa la cantidad disponible" required>
            </div>

            <!-- Fabricante -->
            <div class="mb-3">
                <label for="fabricante" class="form-label">Fabricante</label>
                <input type="text" class="form-control" id="fabricante" name="fabricante" placeholder="Ingresa el nombre del fabricante" required>
            </div>

            <!-- Origen -->
            <div class="mb-3">
                <label for="origen" class="form-label">Origen</label>
                <select class="form-select" id="origen" name="origen" required>
                    <option value="" disabled selected>Selecciona el origen</option>
                    <option value="Nacional">Nacional</option>
                    <option value="Importado">Importado</option>
                </select>
            </div>

            <!-- Botón de Envío -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Registrar Producto</button>
            </div>

        </form>
    </div>
</body>
</html>