<?php
// Iniciar la sesión
session_start();

// Función para verificar si el usuario está autenticado
function estaAutenticado() {
    return isset($_SESSION['usuario']);
}

if (!estaAutenticado()) {
    header('Location: index.php'); // Redirigir a inicio si no está autenticado
    exit;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona Privada</title>
</head>
<body>
    <h1>Zona Privada</h1>
    <p>Has accedido porque estas autenticado</p>
    <a href="index.php">Volver al inicio</a>
</body>
</html>
