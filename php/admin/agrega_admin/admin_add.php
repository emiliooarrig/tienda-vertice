<?php

include '../../config/conection.php';

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
            echo "ya existe ese usuario";
            
        }else{
            $hashedPasswd = password_hash($passwd, PASSWORD_BCRYPT);
            $sql = "INSERT INTO Administradores (user_admin, passwd_admin) VALUES('$user', '$hashedPasswd')";
    
            //Insertamos los datos en la tabla 
            if (mysqli_query($conn, $sql)) {
                echo "insertado exitosamente";
            } else {
                echo "no se pudo insertar";
            }
        }
    } else {
        echo "las contraseñas no son iguales. ";
    }
}
