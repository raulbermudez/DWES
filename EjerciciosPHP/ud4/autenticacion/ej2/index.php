<?php
/**
 * Sistema de Autenticación con Perfiles de Usuario
 * @autor Raul
 */

// Iniciar la sesión
session_start();

// Configuración de usuarios registrados y sus perfiles
$usuarios = [
    'usuario1' => ['contraseña' => 'contraseña1', 'perfil' => 'lector'],
    'usuario2' => ['contraseña' => 'contraseña2', 'perfil' => 'editor'],
    'admin' => ['contraseña' => 'admin123', 'perfil' => 'administrador']
];

// Función para verificar si el usuario está autenticado
function estaAutenticado() {
    return isset($_SESSION['usuario']);
}

// Función para obtener el perfil del usuario autenticado
function obtenerPerfil() {
    return $_SESSION['perfil'] ?? 'invitado';
}

// Manejo del formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar credenciales
    if (isset($usuarios[$username]) && $usuarios[$username]['contraseña'] === $password) {
        $_SESSION['usuario'] = $username;
        $_SESSION['perfil'] = $usuarios[$username]['perfil']; // Guardar el perfil del usuario
        $_SESSION['hora_inicio'] = date('H:i:s'); // Guardar la hora de inicio
        header('Location: index.php'); // Redirigir para evitar reenvío de formulario
        exit;
    } else {
        $error = "Nombre de usuario o contraseña incorrectos.";
    }
}

// Manejo del cierre de sesión
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Autenticación con Perfiles</title>
</head>
<body>
    <h1>Sistema de Autenticación con Perfiles de Usuario</h1>

    <?php if (estaAutenticado()): ?>
        <p>Bienvenido, <strong>
            <?php echo htmlspecialchars(is_string($_SESSION['usuario'] ?? null) ? $_SESSION['usuario'] : 'Invitado'); ?>
        </strong></p>
        <p>Perfil: <strong><?php echo htmlspecialchars(obtenerPerfil()); ?></strong></p>
        <p>Hora de inicio de sesión: <strong>
            <?php echo htmlspecialchars(is_string($_SESSION['hora_inicio'] ?? null) ? $_SESSION['hora_inicio'] : 'Desconocida'); ?>
        </strong></p>
        <a href="?logout">Cerrar sesión</a>
        <hr>
        <h2>Zona privada</h2>
        <p>Contenido exclusivo para usuarios autenticados.</p>
        <?php if (obtenerPerfil() === 'administrador'): ?>
            <p>Acceso especial: <strong>Contenido de administrador.</strong></p>
        <?php elseif (obtenerPerfil() === 'editor'): ?>
            <p>Acceso especial: <strong>Contenido de editor.</strong></p>
        <?php elseif (obtenerPerfil() === 'lector'): ?>
            <p>Acceso especial: <strong>Contenido de lector.</strong></p>
        <?php endif; ?>
    <?php else: ?>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <label for="username">Nombre de usuario:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit" name="login">Iniciar sesión</button>
        </form>
    <?php endif; ?>

    <hr>
    <h2>Zona pública</h2>
    <p>Información accesible para todos los usuarios.</p>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <?php if (estaAutenticado()): ?>
                <li><a href="privado.php">Zona Privada</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</body>
</html>
