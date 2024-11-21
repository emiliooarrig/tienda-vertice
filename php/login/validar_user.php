<?php

require '../config/conection.php';

session_start(); // Inicia la sesión


$error = ""; // Variable para almacenar mensajes de error

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Recuperamos los datos del input
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, $_POST['passwd']);

    // Consulta a la base de datos para consultar si es un usuario o un administrador
    $sql = "SELECT * FROM Usuarios WHERE nombre_usuario = '$username'";
    $sqlAdmin = "SELECT * FROM Administradores WHERE user_admin = '$username'";

    $resultAdmin = mysqli_query($conn, $sqlAdmin);
    $resultUser = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultUser) === 1) {
        $row = mysqli_fetch_assoc($resultUser);
        if (password_verify($password, $row['contrasena'])) {
            echo "Entra";
            $_SESSION['user_id'] = $row['id_usuario'];
            $_SESSION['username'] = $row['nombre_usuario'];
            $_SESSION['role'] = 'user';
            header('Location: ../compras/compras.php');
            exit();
        }
    } elseif (mysqli_num_rows($resultAdmin) === 1) {
        $row = mysqli_fetch_assoc($resultAdmin);
        if (password_verify($password, $row['passwd_admin'])) {
            $_SESSION['admin_id'] = $row['id_admin'];
            $_SESSION['username'] = $row['user_admin'];
            $_SESSION['role'] = 'admin';
            header('Location: ../admin/admin.php');
            exit();
        }
    } else {
        header('Location: login.php?status=error');
        exit();
    }
}
