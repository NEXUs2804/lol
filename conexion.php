<?php
$servername = "localhost";
$username = "root"; // Cambia si has establecido una contraseña
$password = ""; // Cambia si has establecido una contraseña
$dbname = "terror_media";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
