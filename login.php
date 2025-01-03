<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Preparar y ejecutar consulta segura
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verificar la contraseña
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: index.html"); // Redirigir al archivo index.html
            exit();
        } else {
            echo "<p style='color:red;'>Contraseña incorrecta.</p>";
        }
    } else {
        echo "<p style='color:red;'>Usuario no encontrado.</p>";
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/inicios.css">
</head>
<body>
<div class="content-box">
    <h2>Iniciar Sesión</h2>
    <form method="post" action="">
        <label for="username">Usuario:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" value="Iniciar Sesión">
    </form>
    <p>¿No tienes una cuenta? <a href="registrar.php">Regístrate aquí</a></p>
</div>
</body>
</html>
