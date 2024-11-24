<?php
session_start();
include '../config/conection.php';

if (isset($_GET['producto_id']) && isset($_GET['cantidad']) && isset($_SESSION['user_id'])) {

    // Obtener datos y sanitizarlos
    $id_user = intval($_SESSION["user_id"]);
    $producto_id = intval($_GET['producto_id']);
    $cantidad = intval($_GET['cantidad']);

    // Verificar si el producto ya está en el carrito
    $sql_check = "SELECT cantidad FROM CarritoCompras WHERE producto_id = $producto_id AND usuario_id = $id_user";
    $result_check = mysqli_query($conn, $sql_check);

    if ($result_check && mysqli_num_rows($result_check) > 0) {
        // Producto ya en el carrito, actualizar cantidad
        $row = mysqli_fetch_assoc($result_check);
        $nueva_cantidad = $row['cantidad'] + $cantidad;

        $sql_update = "UPDATE CarritoCompras SET cantidad = $nueva_cantidad WHERE producto_id = $producto_id AND usuario_id = $id_user";
        if (mysqli_query($conn, $sql_update)) {
            header("Location: ../compras/compras.php?status=update");
        } else {
            header("Location: ../compras/compras.php?status=error");

        }
    } else {
        // Producto no está en el carrito: agregarlo
        $sql_insert = "INSERT INTO CarritoCompras (usuario_id, producto_id, cantidad) VALUES ($id_user, $producto_id, $cantidad)";
        if (mysqli_query($conn, $sql_insert)) {
            header("Location: ../compras/compras.php?status=success");

        } else {
            header("Location: ../compras/compras.php?status=error");
        }
    }
} else {
    echo "Faltan datos de sesion";
}
