<?php
require '../config/conection.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $precio = mysqli_real_escape_string($conn, $_POST['precio']);
    $cantidad = mysqli_real_escape_string($conn, $_POST['cantidad_en_almacen']);
    $fabricante = mysqli_real_escape_string($conn, $_POST['fabricante']);
    $origen = mysqli_real_escape_string($conn, $_POST['origen']);

    // Verificar si se ha subido un archivo de imagen
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
        $foto = $_FILES['foto'];
        $nombreFoto = basename($foto['name']);
        $rutaDestino = "../../img/" . $nombreFoto;

        // Mover el archivo al directorio especificado
        if (move_uploaded_file($foto['tmp_name'], $rutaDestino)) {
            // Insertar datos en la tabla productos
            $query = "INSERT INTO Productos (nombre, descripcion, fotos, precio, cantidad_en_almacen, fabricante, origen) 
                      VALUES ('$nombre', '$descripcion', '$nombreFoto', '$precio', '$cantidad', '$fabricante', '$origen')";

            if (mysqli_query($conn, $query)) {
                $_SESSION['mensaje'] = "Producto registrado exitosamente.";
                header("Location: admin.php?status=success");

            } else {
                $_SESSION['mensaje'] = "Error al registrar el producto: ";
                header("Location: admin.php?status=error");
            }
        } else {
            $_SESSION['mensaje'] = "Error al subir la foto.";
            header("Location: admin.php?status=error");
        }
    } else {
        $_SESSION['mensaje'] = "No se seleccionó una foto válida.";
        header("Location: admin.php?status=error");
    }
}
?>
