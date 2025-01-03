<?php
session_start();
include 'conexion.php'; // Incluir el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validar que las contraseñas coincidan
    if ($password !== $confirm_password) {
        echo "Las contraseñas no coinciden.";
    } else {
        // Hashear la contraseña
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insertar el nuevo usuario en la base de datos
        $sql = "INSERT INTO usuarios (username, password) VALUES ('$username', '$hashed_password')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Cuenta creada exitosamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="css/inicios.css">
</head>
<body>
<div class="content-box">
    <h2>Registrar Nueva Cuenta</h2>
    <form method="post" action="">
        <label for="username">Usuario:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <br>
        <label for="confirm_password">Confirmar Contraseña:</label>
        <input type="password" name="confirm_password" required>
        <br>
        <input type="submit" value="Crear Cuenta">
    </form>
    <p>¿Ya tienes una cuenta? <a href="login.php">Inicia Sesion aqui</a></p>
</div>
</body>
</html>
