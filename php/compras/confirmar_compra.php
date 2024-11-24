<?php
require '../config/conection.php';
session_start();
$id_user = $_SESSION['user_id'];
$mensaje = '';
// Verificar si se recibieron las cantidades desde el formulario
if (isset($_POST['cantidades']) && is_array($_POST['cantidades'])) {
    echo "entra";
    $cantidades = $_POST['cantidades'];

    // Iterar sobre el arreglo de cantidades para actualizar la base de datos
    foreach ($cantidades as $producto_id => $nueva_cantidad) {
        $producto_id = intval($producto_id); // Sanitizar valores
        $nueva_cantidad = intval($nueva_cantidad);

        // Actualizar las cantidades en la tabla CarritoCompras
        $sql_update = "UPDATE CarritoCompras 
                       SET cantidad = $nueva_cantidad 
                       WHERE usuario_id = $id_user AND producto_id = $producto_id";
        
        if (!mysqli_query($conn, $sql_update)) {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudo actualizar el producto con ID $producto_id.'
                    });
                  </script>";
                  header('Location: ../carrito.php?status=error');
            exit; // Detener el script si hay un error en la actualización
        }else{
            $sql_insert = "INSERT INTO HistorialCompras (usuario_id, producto_id, cantidad) VALUES ($id_user, $producto_id, $nueva_cantidad)"; 
            if(!mysqli_query($conn, $sql_insert)){
                // Codigo si no se inserto los datos al historial de compras
                header('Location: ../carrito.php?status=error');
            }else{
                //Codigo si se inserto correctamente al historial de compras, borramos el historial del carrito 
                // de compras 
                $sql_delete = "DELETE FROM CarritoCompras WHERE usuario_id=$id_user";
                // Si se borra el carrito exitosamente, entonces mandamos mensaje de confirmacion
                if(!mysqli_query($conn, $sql_delete)){
                    header('Location: ../carrito.php?status=error');
                } else{
                    header('Location: ../carrito.php?status=inserted');
                }
            }
        }
    }
    
} else {
    // No se recibieron cantidades válidas
    echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se recibieron datos válidos del formulario.'
            }).then(() => {
                window.location.href = '../carrito.php';
            });
          </script>";
}