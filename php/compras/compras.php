<?php
include '../config/conection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                        <a class="nav-link" aria-current="page" href="../../index.html">Inicio </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Comprar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../html/contacto/contacto.html">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../html/faq/faq.html"> FAQ </a>
                    </li>
                    <li class="nav-item-">
                        <a href="../login/login.php" class="nav-link"> <i class="bi bi-person-circle"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid text-center p-3 mb-5" style="background-color: #FF4D80;">
        <h1 class="text-light"> Los productos:  </h1>
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
                                <p class="card-text"><strong>Precio:</strong> $<?php echo $precio; ?></p> <!-- Precio -->
                                <p class="card-text"><strong>Stock:</strong> <?php echo $cantidad; ?></p> <!-- Cantidad -->
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary">Añadir al carrito</button>
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

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>