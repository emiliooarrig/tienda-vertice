<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <title> Contacto </title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../index.html">Tiendita honesta</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../../index.php">Inicio </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../compras/compras.php">Comprar</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link active"> Contacto </a>
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

    <div class="container-fluid text-center p-3" style="background-color: #FF4D80;">
        <h1 class="text-light"> ¿Como contactarnos? </h1>
    </div>

    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-2">

            <div class="col">
                <img src="../../imagenes/support.png" alt="" class="w-75">
            </div>

            <div class="col d-flex flex-column align-items-center justify-content-center">
                <h1> ¿Tienes una duda o necesitas ayuda? estamos aquí para ti</h1>
                <p>
                    Escríbenos a <span class="text-primary"> verticemexico@anahuac.mx </span> con cualquier duda,
                    comentario o sugerencia, y con gusto te responderemos en menos de 24 horas.
                    Nuestro equipo está disponible para ayudarte con cualquier detalle relacionado con
                    tus pedidos, el proceso de compra o cualquier otra consulta que tengas.

                <h6> ¡Tu opinión es importante para nosotros! </h6>
            </div>
        </div>

    </div>

    <div class="container-fluid text-center footer text-white py-3 mt-5" style="background-color: #FF4D80;">
        <h1 class="fs-5 mb-3">Vertice Mexico. Todos los derechos reservados.</h1>
        <div class="row row-cols-1 row-cols-md-3">
            <div class="col mb-2">
                <p class="mb-1"> verticemexico@anahuac.mx </p>
            </div>
            <div class="col mb-2">
                <p class="mb-1">¿Problemas con tu pedido? Haz click aquí</p>
                <a href="#" class="btn button-amarillo"> Problemas</a>
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