<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre_usuario = $_POST['nombre_usuario'];
    $nombre_caso = $_POST['nombre_caso'];
    $opinion = $_POST['opinion'];
    $sugerencias = $_POST['sugerencias'];
    $valoracion = $_POST['valoracion'];
    $fecha_opinion = date("Y-m-d H:i:s");

    $mensaje = "Opinión enviada con éxito!";
    // Conexión a la base de datos
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=terror_media', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparar la consulta SQL para insertar los datos
        $stmt = $pdo->prepare("INSERT INTO Opiniones (nombre_usuario, nombre_caso, opinion, sugerencias, valoracion, fecha_opinion) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nombre_usuario, $nombre_caso, $opinion, $sugerencias, $valoracion, $fecha_opinion]);

        // Redirigir al usuario a la página principal (index.html)
        header("Location: index.html");
        exit(); // Asegura que el script termine aquí
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>




<!-- guardar_opinion.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Opiniones</title>
    <link rel="stylesheet" href="css/inicios.css">
</head>
<body>
<div class="content-box">
    <h1>Deja tu opinión sobre el criminal</h1>

    <!-- Formulario para enviar la opinión -->
    <form action="guardar_opinion.php" method="POST">
        <label for="nombre_usuario">Tu Nombre:</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" required><br><br>

        <label for="nombre_caso">Nombre del Caso:</label>
        <input type="text" id="nombre_caso" name="nombre_caso" required><br><br>

        <label for="opinion">Tu Opinión:</label><br>
        <textarea id="opinion" name="opinion" rows="4" cols="50" required></textarea><br><br>

        <label for="sugerencias">Sugerencias:</label><br>
        <textarea id="sugerencias" name="sugerencias" rows="4" cols="50"></textarea><br><br>

        <label for="valoracion">Valoración (1 a 5):</label><br>
        <select id="valoracion" name="valoracion" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br><br>

        <input type="submit" value="ENVIAR OPINION">
    </form>
</div>
</body>
</html>
