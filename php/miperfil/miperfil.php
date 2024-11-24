<?php

include '../config/conection.php';
session_start();

$user_id = $_SESSION["user_id"];

if (!isset($_SESSION['username'])) {
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
    <title> Mi perfil </title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Columna izquierda: Panel del administrador -->
            <div class="col-md-3 p-4 rounded text-center mh-100" style="background-color: #FF4D80;">
                <h1 class="fs-4 text-light">Bienvenid@, <span class="text-primary"><?php echo $_SESSION['username']; ?></span></h1>
                <img src="../../img/user.png" alt="" class="img img-fluid w-50">
                <div class="row row-cols-1 row-cols-md-1 justify-content-center">
                    <?php

                    $id = $_SESSION["user_id"];
                    $sql = "SELECT * FROM Usuarios WHERE id_usuario = $id";
                    $resultado = mysqli_query($conn, $sql);

                    // Check if a user exists with the given ID
                    if ($resultado && $row = mysqli_fetch_assoc($resultado)) {
                        $email = $row['correo_electronico'];
                    ?>
                        <div class="col">
                            <p class="text-light">Email: <span class="text-light"><?php echo $email; ?></span></p>
                        </div>

                        <div class="col">
                            <p class="text-light"> Fecha de nacimiento: <span class="text-light"> <?php echo $row['fecha_nacimiento'] ?> </span> </p>
                        </div>


                    <?php
                    } else {
                        echo "<p class='text-light'> No se encontró la información del usuario.</p>";
                    }
                    ?>
                </div>

                <div class="col">
                    <a href="../config/logout.php" class="btn btn-danger btn-block my-2">Cerrar sesión actual</a>
                </div>
            </div>

            <!-- Despliegue del historial de compras -->
            <div class="col">
                <table class="table">
                    <thead>
                        <th> Id compra </th>
                        <th> Nombre del producto </th>
                        <th> Cantidad </th>
                    </thead>

                    <tbody>
                        <?php
                    
                        if (isset($_SESSION['user_id'])) {
                            // Consulta para obtener el historial de compras
                            $sql = "SELECT 
                                        h.id_compra, 
                                        p.nombre AS nombre_producto, 
                                        h.cantidad
                                    FROM HistorialCompras h
                                    JOIN Productos p ON h.producto_id = p.id_producto
                                    WHERE h.usuario_id = $user_id";

                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                if (mysqli_num_rows($result) > 0) {
                                    // Iterar sobre cada registro del historial
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>
                                                <td>' . $row['id_compra'] . '</td>
                                                <td>' . $row['nombre_producto'] . '</td>
                                                <td>' . $row['cantidad'] . '</td>
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
                        ?>
                    </tbody>
                </table>
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