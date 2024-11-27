<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/animation.css">
    <title> Tiendita Honesta </title>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tiendita honesta</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="php/compras/compras.php">Comprar</a>
                    </li>
                    <li class="nav-item">
                        <a href="php/contacto/contacto.php" class="nav-link"> Contacto </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="php/faq/faq.php"> FAQ </a>
                    </li>

                    </li>
                    <?php if (isset($_SESSION['username'])) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Mi cuenta <i class="bi bi-person-fill-check"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="php/miperfil/miperfil.php"> Mi perfil <i class="bi bi-person-circle"></i> </a></li>
                                <li><a class="dropdown-item" href="php/carrito.php"> Mi carrito <i class="bi bi-cart"></i></a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="php/config/logout.php"> Cerrar sesión <i class="bi bi-x-lg"></i> </a></li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="php/login/login.php"><i class="bi bi-person-circle"></i></a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid d-flex flex-column align-items-center justify-content-center" style="background-color: #FF4D80;
    height: 600px;">
        <h1 style="color: #FFD966;" class="display-1"> Tiendita honesta</h1>
        <h2 style="color: #FFD966;"> (Version online)</h2>
    </div>

    <!-- Seccion de informacion sobre la tienda -->
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col d-flex flex-column align-items-center text-center text-md-start">
                <img src="imagenes/vertice-logo.png" alt="Vertice Logo" class="img-fluid w-50 mb-3">
            </div>

            <div class="col d-flex align-items-center justify-content-center flex-column">
                <h1 class="h1">Sobre la tienda</h1>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum repellat, consequatur amet,
                    quaerat in impedit aliquid ratione fugit, non neque accusamus assumenda aperiam dignissimos ut.
                    Recusandae eius aliquam molestias ea.
                </p>

                <a href="php/compras/compras.php" class="btn button-rosa"> ¡Compra ahora! </a>
            </div>
        </div>
    </div>

    <!-- Seccion sobre articulos destacados. -->
    <!-- Carousel -->
    <div id="demo" class="carousel slide text-center p-4 " style="background-color: #FFD966;" data-bs-ride="carousel">

        <h1 class="display-5"> ¡Promociones de esta semana! </h1>
        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="imagenes/ofertas-carrusel/image.png" alt="Los Angeles" class="d-block w-75 mx-auto">
            </div>
            <div class="carousel-item">
                <img src="imagenes/ofertas-carrusel/image.png" alt="Chicago" class="d-block w-75 mx-auto">
            </div>
            <div class="carousel-item">
                <img src="imagenes/ofertas-carrusel/image.png" alt="New York" class="d-block w-75 mx-auto">
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- Tipos de productos  -->

    <div class="container mt-5">
        <h1 class="fs-2 text-center">Categorias de Productos</h1>
        <div class="row row-cols-1 row-cols-md-3 justify-content-center">
            <div class="col text-center">
                <h1 class="fs-3 mb-4">Dulces</h1>
                <img src="imagenes/tipos-productos/1.png" alt="" class="w-75 img-responsive hover-zoom">
            </div>

            <div class="col text-center">
                <h1 class="fs-3 mb-4">Merch del programa</h1>
                <img src="imagenes/tipos-productos/2.png" alt="" class="w-75 img-responsive hover-zoom">
            </div>

            <div class="col text-center">
                <h1 class="fs-3 mb-4">Eventos especiales</h1>
                <img src="imagenes/tipos-productos/3.png" alt="" class="w-75 img-responsive hover-zoom">
            </div>
        </div>
    </div>

    <!-- Footer de la pagina  -->
    <div class="container-fluid text-center text-white py-4 mt-5" style="background-color: #FF4D80;">
        <h1 class="fs-5 mb-3">Vertice Mexico. Todos los derechos reservados.</h1>
        <div class="row row-cols-1 row-cols-md-3">
            <div class="col mb-2">
                <p class="mb-1"> verticemexico@anahuac.mx </p>
            </div>
            <div class="col mb-2">
                <p class="mb-1">¿Problemas con tu pedido? Haz click aquí</p>
                <a href="btn" class="btn button-amarillo"> Problemas</a>
            </div>
            <div class="col mb-2">
                <p class="mb-1">¡Nuestras redes sociales!</p>
                <a href="#" class="icon me-2"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="icon me-2"><i class="bi bi-instagram"></i></a>
                <a href="#" class="icon me-2"><i class="bi bi-twitter"></i></a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

</body>

</html>