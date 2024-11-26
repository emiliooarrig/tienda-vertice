<?php
require '../config/conection.php';
session_start();
$id_user = $_SESSION['user_id'];
$_SESSION['mensaje'] = '';
// Verificar si se recibieron las cantidades desde el formulario
if (isset($_POST['cantidades']) && is_array($_POST['cantidades'])) {
    $cantidades = $_POST['cantidades'];

    // $cantidades es un arreglo asociativo, iteramos sobre el arreglo de cantidades para actualizar la base de datos
    foreach ($cantidades as $producto_id => $nueva_cantidad) {
        $producto_id = intval($producto_id); 
        $nueva_cantidad = intval($nueva_cantidad);

        // Actualizar las cantidades en la tabla CarritoCompras
        $sql_update = "UPDATE CarritoCompras 
                       SET cantidad = $nueva_cantidad 
                       WHERE usuario_id = $id_user AND producto_id = $producto_id";
        
        if (!mysqli_query($conn, $sql_update)) {
                  header('Location: ../carrito.php?status=error');
                  $_SESSION['mensaje']='No se pudo actualizar la cantidad';

            exit; // Detener el script si hay un error en la actualización
        }else{
            $sql_insert = "INSERT INTO HistorialCompras (usuario_id, producto_id, cantidad) VALUES ($id_user, $producto_id, $nueva_cantidad)"; 
            if(!mysqli_query($conn, $sql_insert)){
                // Codigo si no se inserto los datos al historial de compras
                header('Location: ../carrito.php?status=error');
                $_SESSION['mensaje']='¡Algo salió mal! ';
            }else{
                //Codigo si se inserto correctamente al historial de compras, borramos el historial del carrito 
                // de compras 
                $sql_delete = "DELETE FROM CarritoCompras WHERE usuario_id=$id_user";
                // Si se borra el carrito exitosamente, entonces mandamos mensaje de confirmacion
                if(!mysqli_query($conn, $sql_delete)){
                    header('Location: ../carrito.php?status=error');
                    $_SESSION['mensaje']='¡Algo salio mal!';

                } else{
                    // Actualizamos el stock en la data base
                    $sql_update = "UPDATE Productos SET cantidad_en_almacen = cantidad_en_almacen - $nueva_cantidad 
                    WHERE id_producto = $producto_id";

                    if(mysqli_query($conn, $sql_update)){
                        header('Location: ../carrito.php?status=success');
                        $_SESSION['mensaje']='¡Compra confirmada!';
                    }else{
                        header('Location: ../carrito.php?status=error');
                        $_SESSION['mensaje']="no se actualizo la cantidad en la db";
                    }
                }
            }
        }
    }
    
} else {
    // No se recibieron cantidades válidas
          header('Location: ../carrito.php?status=error');
          $_SESSION['mensaje']='Agrega productos a tu carrito antes de continuar';

}