<?php
include '../../config/conection.php';
session_start();

if(isset($_GET['producto_id'])){
    $id_prod=$_GET['producto_id'];
    $sql = "SELECT * FROM Productos WHERE id_producto= $id_prod";
    $result = (mysqli_query($conn, $sql));

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
    }else{
        $_SESSION['mensaje'] = "Error el encontrar el articulo";
        header("Location: ../admin.php?status=error");
    }
}else{
    $_SESSION['mensaje'] = "No se obtuvo el id del articulo ";
    header("Location: ../admin.php?status=error");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../css/fondo.css">
    <link rel="stylesheet" href="../../../style.css">
    <title> Editar una articulo </title>
</head>

<body>

    <div class="container bg-light p-md-5 mt-5">
        <h1 class="text-center" style="color: #FF4D80;"> Editar artículo </h1>
        <form action="editar_art.php?producto_id=<?php echo $id_prod; ?>" method="POST" enctype="multipart/form-data" class="bg-white p-4 shadow-lg">

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre" value="<?php echo $row['nombre']?>" required>
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Ingresa una descripción del producto" required> <?php echo $row['descripcion']?>"</textarea>
            </div>

            <!-- Foto -->
            <div class="mb-3">
                <label for="foto" class="form-label">Foto del Producto</label>
                <input type="file" class="form-control" id="foto" name="foto" required>
                <small class="form-text text-muted">Foto actual: <?php echo $row['fotos']; ?></small>
            </div>

            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" placeholder="Ingresa el precio en MXN" step="0.01" value="<?php echo $row['precio']?>" required>
            </div>

            <!-- Cantidad en Almacén -->
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad en Almacén</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad_en_almacen" placeholder="Ingresa la cantidad disponible" value="<?php echo $row['cantidad_en_almacen']?>" required>
            </div>

            <!-- Fabricante -->
            <div class="mb-3">
                <label for="fabricante" class="form-label">Fabricante</label>
                <input type="text" class="form-control" id="fabricante" name="fabricante" placeholder="Ingresa el nombre del fabricante" value="<?php echo $row['fabricante']?>" required>
            </div>

            <!-- Origen -->
            <div class="mb-3">
                <label for="origen" class="form-label">Origen</label>
                <select class="form-select" id="origen" name="origen" required value="<?php echo $row['origen']?>">
                    <option value="" disabled selected>Selecciona el origen</option>
                    <option value="Nacional" <?php if ($row['origen'] == 'Nacional') echo 'selected'; ?> >Nacional</option>
                    <option value="Importado" <?php if ($row['origen'] == 'Importada') echo 'selected'; ?> >Importado</option>
                </select>
            </div>

            <!-- Botón de Envío -->
            <div class="text-center">
                <button type="submit" class="btn button-rosa">Registrar Producto</button>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>