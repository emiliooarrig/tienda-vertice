<?php

include '../../config/conection.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="../../../css/fondo.css">
    <title> Historial de compras </title>
</head>

<body>

    <div class="container bg-light mt-5 p-5">
    <h1 class="text-center" style="color: #FF4D80;"> Ultimas compras </h1>
        <table class="table bg-white table-hover table-striped">
            <thead>
                <th> Id de compra </th>
                <th> Articulo </th>
                <th> Cantidad</th>
                <th> Comprado por</th>
            </thead>


            <tbody>
                <?php
                if (isset($_SESSION['role'])) {
                    // Consulta para obtener el historial de compras
                    $sql = "SELECT 
                         h.id_compra, 
                        p.nombre AS nombre_producto, 
                        u.nombre_usuario,
                        h.cantidad
                        FROM HistorialCompras h
                        JOIN Productos p ON h.producto_id = p.id_producto
                        JOIN Usuarios u ON u.id_usuario = h.usuario_id";

                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            // Iterar sobre cada registro del historial
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>
                                    <td>' . $row['id_compra'] . '</td>
                                    <td>' . $row['nombre_producto'] . '</td>
                                    <td>' . $row['cantidad'] . '</td>
                                    <td>' . $row['nombre_usuario'] . '</td>
                                </tr>';
                            }
                        } else {
                            echo '<tr>
                            <td colspan="4" class="text-center">No tienes compras en tu historial.</td>
                            </tr>';
                        }
                    } else {
                        echo '<tr>
                            <td colspan="4" class="text-center">Error al cargar el historial de compras.</td>
                            </tr>';
                    }
                } else {
                    echo '<tr>
                            <td colspan="4" class="text-center">Por favor, inicia sesión para ver tu historial de compras.</td>
                            </tr>';
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
        <a href="../admin.php" class="btn button-rosa"> Regresar </a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>