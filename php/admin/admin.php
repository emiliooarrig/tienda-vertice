<?php
require '../config/conection.php';
session_start();

$result = mysqli_query($conn, "SELECT * FROM Productos;");
$mensaje = '';

if (isset($_SESSION['role']) != 'admin') {
    header('Location: ../login/login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../../css/fondo.css">
    <title> Panel de administracion </title>
</head>

<body>

    <div class="container-fluid">
        <div class="row vh-100">
            <!-- Columna izquierda: Panel del administrador -->
            <div class="col-md-3 p-4 text-center h-100" style="background-color: #FF4D80;">
                <h1 class="fs-4 text-light">Bienvenid@, <span style="color: #FFD966;"><?php echo $_SESSION['username']; ?></span></h1>
                <img src="../../img/user.png" alt="" class="img img-fluid w-50">
                <div class="row row-cols-1 row-cols-md-2 justify-content-center">
                    <div class="col">
                        <a href="agregar/agregar_art.php" class="btn btn-success btn-block my-2">Agregar artículos</a>
                    </div>

                    <div class="col">
                        <a href="agrega_admin/agregar_admin.php" class="btn btn-warning btn-block my-2">Agregar administrador</a>
                    </div>

                    <div class="col">
                        <a href="../config/logout.php" class="btn btn-danger btn-block my-2">Cerrar sesión actual </a>
                    </div>

                    <div class="col">
                        <a href="historial_compras/historial_compras.php" class="btn btn-primary btn-block my-2"> Historial de compras </a>
                    </div>
                </div>
            </div>

            <!-- Columna derecha: Despliegue de artículos -->
            <div class="col-md-9 mt-2">
                <h2 class="text-center mb-4">Artículos en Almacén</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                        <div class="col">
                            <div class="card h-100">
                                <img
                                    src="../../img/<?php echo $row['fotos']; ?>"
                                    class="card-img-top img-fluid w-50"
                                    alt=" <?php echo $row['nombre']; ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                                    <p class="card-text">Precio: $<?php echo $row['precio']; ?></p>
                                    <p class="card-text">Cantidad en almacén: <?php echo $row['cantidad_en_almacen']; ?></p>
                                    <div class="d-flex justify-content-between mt-3">
                                        <!-- Botón para editar -->
                                        <a href="editar_articulo/editar_art_form.php?producto_id=<?php echo $row['id_producto']; ?>"
                                            class="btn btn-warning btn-sm">Editar</a>

                                        <!-- Botón para eliminar, mandamos una confirmacion con sweet alert-->
                                        <a href="#"
                                            onclick="confirmDelete(<?php echo $row['id_producto']; ?>)" class="btn btn-danger btn-sm"> Eliminar </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media (max-width: 750px) {
            .row {
                height: auto !important;
            }
        }
    </style>

    <script src="../../js/script.js"></script>
    <!-- Mandamos mensajes al usuario con Sweet Alert  -->
    <?php if (isset($_GET['status']) && $_GET['status'] === 'success') {
        $mensaje = $_SESSION['mensaje'];
        echo "<script> Swal.fire({
                title: '¡Exitoso!',
                text: '$mensaje',
                icon: 'success',
                confirmButtonText: 'Ok'
            })</script>";
    }
    ?>

    <!-- Mensaje de error  -->
    <?php if (isset($_GET['status']) && $_GET['status'] === 'error') {
        $mensaje = $_SESSION['mensaje'];
        echo "<script> Swal.fire({
                title: '¡Error!',
                text: '$mensaje',
                icon: 'error',
                confirmButtonText: 'Ok'
            })</script>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>