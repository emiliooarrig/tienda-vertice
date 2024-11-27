<?php
session_start(); // Inicia la sesión

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redireccionar al usuario a la página de login o inicio
header("Location: ../login/login.php?status=closed");
exit();
