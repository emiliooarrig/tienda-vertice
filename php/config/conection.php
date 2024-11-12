<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "tienda-vertice";

$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
    die("Conexcion fallida: " . $conn->connect_error);
}

echo "conexion exitosa";

?>