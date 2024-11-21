<?php

require '../config/conection.php';

session_start(); // Inicia la sesión


$error = ""; // Variable para almacenar mensajes de error

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, $_POST['passwd']);

    // Consulta a la base de datos
    $sql = "SELECT * FROM Administradores WHERE user_admin = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Verificar la contraseña
        if (password_verify($password, $row['passwd_admin'])) {
            // Guardar datos en la sesión
            $_SESSION['admin_id'] = $row['id_admin'];
            $_SESSION['username'] = $row['user_admin'];

            // Redirigir al panel de administrador
            header('Location: ../admin/admin.php?status=succed');
            exit();
        } else {
            header('Location: login.php?status=error');
        }
    } else {
        header('Location: login.php?status=error');
    }
}
