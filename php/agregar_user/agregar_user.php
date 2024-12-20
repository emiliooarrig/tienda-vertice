<?php $mensaje=""; session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../css/fondo.css">
    <link rel="stylesheet" href="../../style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title> Crear cuenta </title>
</head>

<body>
   
    <div class="container bg-light mt-5 p-5">
        <h1 style="color: #FF4D80;"> Registro de usuario </h1>

        <form action="../admin/agregar/agregar_user.php" method="post" class="p-4 bg-white shadow rounded">

            <div class="mb-3">
                <label for="user" class="form-label">Usuario</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                    <input type="text" name="user" id="user" class="form-control" placeholder="Usuario" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="passwd" class="form-label">Contraseña</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-key"></i></span>
                    <input type="password" name="passwd" id="passwd" class="form-control" placeholder="Contraseña"
                        required>
                </div>
            </div>
            <div class="mb-3">
                <label for="confirmar_passwd" class="form-label">Confirmar Contraseña</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-key"></i></span>
                    <input type="password" name="confirmar_passwd" id="confirmar_passwd" class="form-control"
                        placeholder="Confirmar contraseña" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="email_user" class="form-label">Correo Electrónico</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-at"></i></span>
                    <input type="email" name="email_user" id="email_user" class="form-control"
                        placeholder="Correo electrónico" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="nacimiento_user" class="form-label">Fecha de Nacimiento</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar-plus"></i></span>
                    <input type="date" name="nacimiento_user" id="nacimiento-user" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="tarjeta" class="form-label"> Numero de tarjeta </label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-credit-card"></i></span>
                    <input type="number" name="tarjeta" id="nacimiento-user" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="codigo_postal" class="form-label"> Codigo postal </label>
                <div class="input-group">
                    <span class="input-group-text"> <i class="bi bi-123"></i> </span>
                    <input type="number" name="codigo_postal" id="nacimiento-user" class="form-control" required>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="button-rosa"> Agregar Usuario </button>
            </div>
        </form>
    </div>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'success') {
        $mensaje = $_SESSION['mensaje'];
        echo "<script> Swal.fire({
                title: '¡Exitoso!',
                text: '$mensaje',
                icon: 'success',
                confirmButtonText: 'Ok'
            })</script>";
    }
    ?>
    
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
    <script src=".././../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>