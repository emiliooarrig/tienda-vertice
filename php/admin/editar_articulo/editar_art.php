<?php
require '../../config/conection.php';

$mensaje = '';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $precio = mysqli_real_escape_string($conn, $_POST['precio']);
    $cantidad = mysqli_real_escape_string($conn, $_POST['cantidad_en_almacen']);
    $fabricante = mysqli_real_escape_string($conn, $_POST['fabricante']);
    $origen = mysqli_real_escape_string($conn, $_POST['origen']);
    $id = $_GET['producto_id'];

    // Verificar si se ha subido un archivo de imagen
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
        $foto = $_FILES['foto'];
        $nombreFoto = basename($foto['name']); // Solo el nombre del archivo
        $rutaDestino = '../../../img/productos/' . $nombreFoto;

        // Mover el archivo al directorio de imagenes
        if (move_uploaded_file($foto['tmp_name'], $rutaDestino)) {
            // Actualizar datos en la tabla productos
            $query =
            "UPDATE Productos 
                SET nombre = '$nombre', descripcion = '$descripcion', fotos = '$nombreFoto', 
                precio = '$precio', cantidad_en_almacen = '$cantidad', fabricante = '$fabricante', origen = '$origen' 
                WHERE id_producto = '$id'";

            if (mysqli_query($conn, $query)) {
                $_SESSION['mensaje'] = "Producto actualizado exitosamente.";
                header("Location: ../admin.php?status=success");
            } else {
                $_SESSION['mensaje'] = "Error al registrar el producto: ";
                header("Location: ../admin.php?status=error");
            }
        } else {
            $_SESSION['mensaje']= "Error al subir la foto.";
            header("Location: ../admin.php?status=error");
        }
    } else {
        $_SESSION['mensaje'] = "No se seleccionó una foto válida.";
        header("Location: ../admin.php?status=error");
    }

    
}else{
    $_SESSION['mensaje'] = "Peticion no valida";
    header("Location: ../admin.php?status=error");
}
?>