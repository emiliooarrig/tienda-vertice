<?php

include '../../config/conection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['usuario'];
    $passwd = $_POST['passwd'];
    $passwdConfirm = $_POST['passwdConfirm'];

    // Verificamos que las 2 passwd sean iguales
    if ($passwd == $passwdConfirm) {

        $checkUserSQL = "SELECT * FROM Usuarios WHERE nombre_usuario = '$user'";
        $checkAdmin = "SELECT * FROM Administradores WHERE user_admin = '$user'";
        $checkResult = mysqli_query($conn, $checkUserSQL);
        $checkResultAdmin = mysqli_query($conn, $checkAdmin);

        // Verificamos que no exista otro usuario con ese user 
        if(mysqli_num_rows($checkResult) > 0 || mysqli_num_rows($checkResultAdmin) > 0){
            $_SESSION['mensaje'] = "¡Ya existe ese usuario! ";
            header("location: agregar_admin.php?status=error");
            
        }else{
            $hashedPasswd = password_hash($passwd, PASSWORD_BCRYPT);
            $sql = "INSERT INTO Administradores (user_admin, passwd_admin) VALUES('$user', '$hashedPasswd')";
    
            //Insertamos los datos en la tabla 
            if (mysqli_query($conn, $sql)) {
                $_SESSION['mensaje'] = "Admin agregado con exito";
                header("location: ../admin.php?status=success");
            } else {
                $_SESSION['mensaje'] = "Algo salio mal";
                header("location: ../admin.php?status=error");
            }
        }
    } else {
        $_SESSION['mensaje'] = "Las contraseñas no coinciden. ";
        header("location: agregar_admin.php?status=error");
    }
}
