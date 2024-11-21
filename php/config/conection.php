<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "TiendaVertice";

$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
    die("Conexcion fallida: " . $conn->connect_error);
}

?>