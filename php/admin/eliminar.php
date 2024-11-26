<?php 
include '../config/conection.php';
session_start();


if(isset($_GET['producto_id'])){
    $producto_id = $_GET['producto_id'];
    echo $producto_id;
    $sql = "DELETE FROM Productos WHERE id_producto=$producto_id";

    if(mysqli_query($conn, $sql)){
        $_SESSION['mensaje'] = 'Producto eliminado exitosamente';
        header("Location: admin.php?status=success");
    }else{
        $_SESSION['mensaje'] = 'No se pudo eliminar el producto';
        header("Location: admin.php?status=error");
    }
}else{
    $_SESSION['mensaje'] = "Algo salió mal"; 
    header("Location: admin.php?status=error");

}

mysqli_close($conn);
