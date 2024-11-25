<?php 
include '../config/conection.php';
session_start();


if(isset($_GET['producto_id'])){
    $producto_id = $_GET['producto_id'];
    $user_id = $_SESSION['user_id'];

    $sql = "DELETE FROM CarritoCompras WHERE producto_id=$producto_id AND usuario_id=$user_id";
    if(mysqli_query($conn, $sql)){
        $_SESSION['mensaje'] = 'Producto eliminado exitosamente';
        header("Location: ../carrito.php?status=success");
    }else{
        $_SESSION['mensaje'] = 'No se pudo eliminar el producto';
        header("Location: ../carrito.php?status=error");
    }
}else{
    $_SESSION['mensaje'] = "Algo salió mal"; 
    header("Location: ../carrito.php?status=error");

}

mysqli_close($conn);

?>