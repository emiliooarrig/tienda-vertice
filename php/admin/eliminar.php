<?php
require '../config/conection.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "DELETE FROM Productos WHERE id_producto = $id";

    if (mysqli_query($conn, $sql)) {
        //Eliminamos el articulo
        header("Location: admin.php?status=success&message=" . urlencode("Artículo eliminado correctamente."));
        exit();
    } else {
        header("Location: admin.php?status=error&message=" . urlencode("No se pudo eliminar el artículo con id:" . $id));
        exit();
    }
} else {
    header("Location: admin.php?status=error&message=" . urlencode("Petición inválida."));
    exit();
}
?>
