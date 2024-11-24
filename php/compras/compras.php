<?php
include '../config/conection.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title> Productos </title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tiendita honesta</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../../index.php"> Inicio </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Comprar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contacto/contacto.php">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../faq/faq.php"> FAQ </a>
                    </li>
                    <?php if (isset($_SESSION['username'])) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Mi cuenta <i class="bi bi-person-fill-check"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../miperfil/miperfil.php"> Mi perfil <i class="bi bi-person-circle"></i> </a></li>
                                <li><a class="dropdown-item" href="../carrito.php"> Mi carrito <i class="bi bi-cart"></i></a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../config/logout.php"> Cerrar sesión <i class="bi bi-x-lg"></i> </a></li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../login/login.php"><i class="bi bi-person-circle"></i></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid text-center p-3 mb-5" style="background-color: #FF4D80;">
        <h1 class="text-light"> Los productos: </h1>
    </div>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4"> <!-- Estilo responsivo con Bootstrap -->
            <?php
            // Consulta para obtener los artículos
            $result = mysqli_query($conn, "SELECT * FROM Productos");

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Variables para los datos del artículo
                    $nombre = $row['nombre'];
                    $id = $row['id_producto'];
                    $precio = $row['precio'];
                    $cantidad = $row['cantidad_en_almacen'];
            ?>
                    <!-- Card de Bootstrap -->
                    <div class="col">
                        <div class="card h-100">
                            <img src="../../img/productos/<?php echo $row['fotos']; ?>" class="card-img-top img-fluid w-50"
                                alt=" <?php echo $row['nombre']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $nombre; ?></h5> <!-- Título -->
                                <p class="card-text"> <span class="fw-bold"> Precio: </span> $<?php echo $precio; ?></p>
                                <p class="card-text"> <span class="fw-bold"> Stock: </span> <?php echo $cantidad; ?></p>
                            </div>
                            <div class="card-footer justify-content-between">
                                <a href="../agregar_carrito/agregar_carrito.php?producto_id=<?php echo $id; ?>&cantidad=1" class="btn btn-primary"> Añadir al carrito <i class="bi bi-cart-plus-fill"></i> </a>
                                <a href="" class="btn btn-warning"> Mas detalles </a>
                            </div>
                        </div>
                    </div>
            <?php
                } // Fin del while
            } else {
                echo "<p> No se encontraron artículos :( </p>";
            }
            ?>
        </div>

        <?php if (isset($_GET['status']) && $_GET['status'] === 'success') {
            echo "<script> Swal.fire({
                title: '¡Exitoso!',
                text: 'El producto se agregó correctamente',
                icon: 'success',
                confirmButtonText: 'Ok'
            })</script>";
        }
        ?>

        <?php if (isset($_GET['status']) && $_GET['status'] === 'error') {
            echo "<script> Swal.fire({
            title: '¡Error!',
            text: 'El producto no se agregó al carrito',
            icon: 'error',
            confirmButtonText: 'Ok'
        })</script>";
        }
        ?>

        <?php if (isset($_GET['status']) && $_GET['status'] === 'update') {
            echo "<script> Swal.fire({
            title: '¡Correcto!',
            text: 'Se actualizo la cantidad en el carrito ',
            icon: 'info',
            confirmButtonText: 'Ok'
        })</script>";
        }
        ?>

        <?php if (isset($_GET['status']) && $_GET['status'] === 'inserted') {
            echo "<script> Swal.fire({
            title: '¡Correcto!',
            text: 'Pedido confirmado',
            icon: 'success',
            confirmButtonText: 'Ok'
        })</script>";
        }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>