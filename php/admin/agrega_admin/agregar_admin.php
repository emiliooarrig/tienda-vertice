<?php 
session_start();
if (isset($_SESSION['role']) != 'admin') {
    header('Location: ../../login/login.php');
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
    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="../../../css/fondo.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title> Agregar administrador </title>
</head>

<body>
    <div class="container bg-light mt-5 p-5">
        <h1 class="mb-4 texto-rosa text-center" style="color: #FF4D80;">Agregar un administrador</h1>
        <form action="admin_add.php" class="p-4 w-100 shadow-lg rounded bg-white mx-auto" method="POST">
            <!-- Campo de Usuario -->
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario admin:</label>
                <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Ingresa el usuario" required>
            </div>

            <!-- Campo de Contraseña -->
            <div class="mb-3">
                <label for="passwd" class="form-label">Contraseña del admin:</label>
                <input type="password" id="passwd" name="passwd" class="form-control" placeholder="Ingresa la contraseña" required>
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mb-3">
                <label for="passwdConfirm" class="form-label">Confirmar contraseña:</label>
                <input type="password" id="passwdConfirm" name="passwdConfirm" class="form-control" placeholder="Confirma la contraseña" required>
            </div>
            <!-- Botón -->
             <div class="text-center">
                 <button type="submit" class="btn button-rosa">Agregar</button>
             </div>
        </form>
    </div>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'error') {
        $mensaje = $_SESSION['mensaje'];
        echo "<script> Swal.fire({
                title: '¡Error!',
                text: '$mensaje',
                icon: 'error',
                confirmButtonText: 'Ok'
            })</script>";
    }
    ?>
</body>

</html>