<?php
session_start();

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "usuario", "usuarios");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Generar captcha
if (!isset($_SESSION['captcha'])) {
    $_SESSION['captcha'] = rand(1000, 9999);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $captcha = $_POST['captcha'];

    if ($captcha == $_SESSION['captcha']) {
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?");
        $stmt->bind_param("ss", $usuario, $contrasena);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            echo "<p style='color:green;'>¡Login exitoso!</p>";
        } else {
            echo "<p style='color:red;'>Usuario o contraseña incorrectos.</p>";
        }
        $stmt->close();
    } else {
        echo "<p style='color:red;'>Captcha incorrecto.</p>";
    }
    $_SESSION['captcha'] = rand(1000, 9999); // Regenerar captcha
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login con Captcha</title>
</head>
<body>
    <form method="post">
        <label>Usuario:</label>
        <input type="text" name="usuario" required><br>
        <label>Contraseña:</label>
        <input type="password" name="contrasena" required><br>
        <label>Captcha: <?php echo $_SESSION['captcha']; ?></label>
        <input type="text" name="captcha" required><br>
        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>
