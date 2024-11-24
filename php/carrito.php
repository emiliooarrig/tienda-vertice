<?php
include 'config/conection.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title> Carrito </title>
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
                                <li><a class="dropdown-item" href="miperfil/miperfil.php"> Mi perfil </a></li>
                                <li><a class="dropdown-item" href="../carrito.php"> Mi carrito <i class="bi bi-cart"></i></a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../config/logout.php"> Cerrar sesión </a></li>
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

    <div class="container">
        <form action="compras/confirmar_compra.php" method="POST">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Id producto</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Verificar si el usuario está logueado
                    if (isset($_SESSION['user_id'])) {
                        $id_user = $_SESSION['user_id'];

                        // Consulta para obtener los productos en el carrito
                        $sql = "SELECT 
                                c.producto_id,
                                p.nombre AS nombre_producto,
                                c.cantidad,
                                (c.cantidad * p.precio) AS total
                            FROM CarritoCompras c
                            INNER JOIN Productos p ON c.producto_id = p.id_producto
                            WHERE c.usuario_id = $id_user";

                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                // Iterar por cada producto en el carrito
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $producto_id = $row['producto_id'];
                                    $nombre_producto = $row['nombre_producto'];
                                    $cantidad = $row['cantidad'];
                                    $total = $row['total'];
                    ?>
                                    <tr>
                                        <td><?php echo $producto_id; ?></td>
                                        <td><?php echo $nombre_producto; ?></td>
                                        <td>
                                            <input type="number"
                                                name="cantidades[<?php echo $producto_id; ?>]"
                                                value="<?php echo $cantidad; ?>"
                                                min="1"
                                                class="form-control cantidad-input"
                                                style="width: 80px;">
                                        </td>
                                        <td>$<?php echo number_format($total, 2); ?></td>
                                        <td>
                                            <a href="compras/eliminar_producto.php?producto_id=<?php echo $producto_id; ?>"
                                                class="btn btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                    <?php
                                }
                            } else {
                                echo '<tr><td colspan="5">No hay productos en tu carrito.</td></tr>';
                            }
                        } else {
                            echo '<tr><td colspan="5">Error al cargar el carrito.</td></tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5">Por favor, inicia sesión para ver tu carrito.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-success">Confirmar compra</button>
        </form>

        <?php if (isset($_GET['status']) && $_GET['status'] === 'inserted') {
            echo "<script> Swal.fire({
                title: '¡Exitoso!',
                text: 'Pedido confirmado',
                icon: 'success',
                confirmButtonText: 'Ok'
            })</script>";
        }
        ?>

    </div>

    <script>
        // Obtener todos los campos de cantidad
        const cantidadInputs = document.querySelectorAll('.cantidad-input');

        // Agregar un evento 'input' a cada campo
        cantidadInputs.forEach(input => {
            input.addEventListener('input', () => {
                if (input.value <= 0 || isNaN(input.value)) {
                    // Mostrar SweetAlert si la cantidad no es válida
                    Swal.fire({
                        icon: 'error',
                        title: 'Cantidad inválida',
                        text: 'La cantidad debe ser mayor a 0.',
                        confirmButtonText: 'Aceptar'
                    });
                    // Restablecer el valor al mínimo permitido
                    input.value = 1;
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>