<?php
require '../config/conection.php';

$mensaje = '';
$exito = false;

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
        $nombreFoto = basename($foto['name']); // Solo el nombre del archivo
        $rutaDestino = '../../img/productos/' . $nombreFoto;

        // Mover el archivo al directorio especificado
        if (move_uploaded_file($foto['tmp_name'], $rutaDestino)) {
            // Insertar datos en la tabla productos
            $query = "INSERT INTO Productos (nombre, descripcion, fotos, precio, cantidad_en_almacen, fabricante, origen) 
                      VALUES ('$nombre', '$descripcion', '$nombreFoto', '$precio', '$cantidad', '$fabricante', '$origen')";

            if (mysqli_query($conn, $query)) {
                $mensaje = "Producto registrado exitosamente.";
                $exito = true;
            } else {
                $mensaje = "Error al registrar el producto: " . mysqli_error($conn);
            }
        } else {
            $mensaje = "Error al subir la foto.";
        }
    } else {
        $mensaje = "No se seleccionó una foto válida.";
    }

    // Redirigir al panel de administración con mensaje
    $url = 'admin.php'; // Cambia esta URL por la de tu panel de administrador
    header("Location: $url?exito=$exito&mensaje=" . urlencode($mensaje));
    exit();
}


