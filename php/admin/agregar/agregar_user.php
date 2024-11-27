<?php 

require '../../config/conection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitizar datos de entrada
    $user = mysqli_real_escape_string($conn, $_POST["user"]);
    $passwd = mysqli_real_escape_string($conn, $_POST["passwd"]);
    $confirm_passwd = mysqli_real_escape_string($conn, $_POST["confirmar_passwd"]);
    $email = mysqli_real_escape_string($conn, $_POST["email_user"]);
    $date = mysqli_real_escape_string($conn, $_POST["nacimiento_user"]);
    $tarjeta = mysqli_real_escape_string($conn, $_POST["tarjeta"]);
    $cp = mysqli_real_escape_string($conn, $_POST["codigo_postal"]);



    // Validar que las contraseñas coincidan
    if ($passwd != $confirm_passwd) {
        $_SESSION['mensaje'] = "Las contraseñas no coinciden. ";
        header("Location: ../../agregar_user/agregar_user.php?status=error");
        exit();
    }

    // Verificar si el usuario ya existe
    $checkUserSQL = "SELECT * FROM Usuarios WHERE nombre_usuario = '$user'";
    $checkAdminSQL = "SELECT * FROM Administradores WHERE user_admin = '$user'";
    $checkAdmin = mysqli_query($conn, $checkAdminSQL);
    $checkResult = mysqli_query($conn, $checkUserSQL);

    if (mysqli_num_rows($checkResult) > 0 || mysqli_num_rows($checkAdmin) > 0) {
        $_SESSION['mensaje'] = "¡Ya existe un usuario con ese nombre! ";
        header("Location: ../../agregar_user/agregar_user.php?status=error");
        exit();
    }

    $hashedPasswd = password_hash($passwd, PASSWORD_BCRYPT);

    $sql = "INSERT INTO Usuarios (nombre_usuario, correo_electronico, contrasena, fecha_nacimiento, numero_tarjeta_bancaria, direccion_postal) 
    VALUES ('$user', '$email', '$hashedPasswd', '$date', '$tarjeta', '$cp')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../../login/login.php?status=success");
    } else {
        $_SESSION['mensaje'] = "No se pudo agregar el usuair@";
        header("Location: ../../agregar_user/agregar_user.php?status=error");
    }
}
?>